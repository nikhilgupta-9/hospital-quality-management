<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\HospitalProfileModel;
use App\Models\HospitalLicenseModel;

class ProfileController extends BaseController
{
    protected HospitalModel $hospitalModel;
    protected HospitalProfileModel $profileModel;
    protected HospitalLicenseModel $licenseModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
        $this->profileModel  = new HospitalProfileModel();
        $this->licenseModel  = new HospitalLicenseModel();
    }

    /**
     * Resolve the active hospital ID from session or fallback
     */
    protected function getActiveHospitalId(): int
    {
        $sessionHospitalId = (int) session()->get('hospital_id');
        if ($sessionHospitalId > 0) {
            return $sessionHospitalId;
        }

        // Super admin preview query parameter or default to first hospital
        $requestedId = (int) $this->request->getGet('hospital_id');
        if ($requestedId > 0 && has_role('super_admin')) {
            return $requestedId;
        }

        $firstHospital = $this->hospitalModel->first();
        return $firstHospital ? (int) $firstHospital['id'] : 1;
    }

    /**
     * Main View: Part A (Profile) & Part B (Statutory Licences)
     */
    public function index()
    {
        $hospitalId = $this->getActiveHospitalId();
        $hospital   = $this->hospitalModel->find($hospitalId);

        if (!$hospital) {
            return redirect()->to('/hospital-admin')->with('error', 'Hospital record not found.');
        }

        $profile        = $this->profileModel->getProfileByHospital($hospitalId);
        $licenseData    = $this->licenseModel->getLicensesWithTrafficLight($hospitalId);

        return $this->renderWithLayout('hospital_admin/profile_licenses', [
            'hospital'     => $hospital,
            'profile'      => $profile,
            'licenses'     => $licenseData['licenses'],
            'counts'       => $licenseData['counts'],
            'activeTab'    => $this->request->getGet('tab') ?? 'profile',
        ], 'Hospital Profile & Statutory Licences');
    }

    /**
     * Save Part A: Hospital ID & Capacity Profile
     */
    public function updateProfile()
    {
        $hospitalId = $this->getActiveHospitalId();

        $rules = [
            'name'                  => 'required|min_length[3]|max_length[191]',
            'rohini_id'             => 'permit_empty|max_length[100]',
            'abdm_hip_id'           => 'permit_empty|max_length[100]',
            'nodal_officer_name'    => 'permit_empty|max_length[191]',
            'nodal_officer_email'   => 'permit_empty|valid_email',
            'nodal_officer_phone'   => 'permit_empty|max_length[50]',
            'total_sanctioned_beds' => 'required|is_natural_no_zero',
            'total_icu_beds'        => 'required|is_natural',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(site_url('hospital-admin/profile?tab=profile'))
                             ->withInput()
                             ->with('error', 'Please correct the validation errors below.')
                             ->with('errors', $this->validator->getErrors());
        }

        // 1. Update Core Hospital Table
        $this->hospitalModel->update($hospitalId, [
            'name'    => trim($this->request->getPost('name')),
            'address' => trim($this->request->getPost('address') ?? ''),
        ]);

        // 2. Prepare Specialties Array
        $specialties = $this->request->getPost('specialties');
        if (!is_array($specialties)) {
            $specialties = [];
        }

        // 3. Update or Insert Profile Record
        $profileData = [
            'hospital_id'           => $hospitalId,
            'rohini_id'             => trim($this->request->getPost('rohini_id') ?? ''),
            'abdm_hip_id'           => trim($this->request->getPost('abdm_hip_id') ?? ''),
            'hospital_type'         => trim($this->request->getPost('hospital_type') ?? 'Multispeciality Hospital'),
            'nodal_officer_name'    => trim($this->request->getPost('nodal_officer_name') ?? ''),
            'nodal_officer_email'   => trim($this->request->getPost('nodal_officer_email') ?? ''),
            'nodal_officer_phone'   => trim($this->request->getPost('nodal_officer_phone') ?? ''),
            'total_sanctioned_beds' => (int) $this->request->getPost('total_sanctioned_beds'),
            'total_icu_beds'        => (int) $this->request->getPost('total_icu_beds'),
            'specialties'           => json_encode(array_values(array_filter($specialties))),
            'address_details'       => trim($this->request->getPost('address') ?? ''),
        ];

        $existingProfile = $this->profileModel->where('hospital_id', $hospitalId)->first();
        if ($existingProfile) {
            $this->profileModel->update($existingProfile['id'], $profileData);
        } else {
            $this->profileModel->insert($profileData);
        }

        return redirect()->to(site_url('hospital-admin/profile?tab=profile'))
                         ->with('message', 'Hospital Profile and Infrastructure Metrics successfully updated.');
    }

    /**
     * Save / Upload Part B: Statutory License Certificate
     */
    public function updateLicense()
    {
        $hospitalId = $this->getActiveHospitalId();
        $licenseId  = (int) $this->request->getPost('license_id');

        $license = $this->licenseModel->where('id', $licenseId)
                                      ->where('hospital_id', $hospitalId)
                                      ->first();

        if (!$license) {
            return redirect()->to(site_url('hospital-admin/profile?tab=licenses'))
                             ->with('error', 'License record not found.');
        }

        $rules = [
            'license_number'    => 'permit_empty|max_length[191]',
            'issuing_authority' => 'permit_empty|max_length[191]',
            'issue_date'        => 'permit_empty|valid_date',
            'expiry_date'       => 'permit_empty|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(site_url('hospital-admin/profile?tab=licenses'))
                             ->withInput()
                             ->with('error', 'Invalid license dates or details provided.');
        }

        $dataToUpdate = [
            'license_number'    => trim($this->request->getPost('license_number') ?? ''),
            'issuing_authority' => trim($this->request->getPost('issuing_authority') ?? ''),
            'issue_date'        => $this->request->getPost('issue_date') ?: null,
            'expiry_date'       => $this->request->getPost('expiry_date') ?: null,
            'remarks'           => trim($this->request->getPost('remarks') ?? ''),
        ];

        // Compute Traffic Light Status
        if (!empty($dataToUpdate['expiry_date'])) {
            $today = strtotime(date('Y-m-d'));
            $expiryTime = strtotime($dataToUpdate['expiry_date']);
            $diffDays = (int) floor(($expiryTime - $today) / 86400);

            if ($diffDays > 60) {
                $dataToUpdate['status'] = 'active';
            } elseif ($diffDays >= 1) {
                $dataToUpdate['status'] = 'warning';
            } else {
                $dataToUpdate['status'] = 'expired';
            }
        }

        // Handle File Upload
        $file = $this->request->getFile('license_document');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $validTypes = ['pdf', 'jpg', 'jpeg', 'png'];
            $ext = strtolower($file->getClientExtension());

            if (!in_array($ext, $validTypes, true)) {
                return redirect()->to(site_url('hospital-admin/profile?tab=licenses'))
                                 ->with('error', 'Only PDF, JPG, and PNG certificate files are allowed.');
            }

            if ($file->getSizeByUnit('mb') > 10) {
                return redirect()->to(site_url('hospital-admin/profile?tab=licenses'))
                                 ->with('error', 'Certificate file size cannot exceed 10MB.');
            }

            $uploadDir = FCPATH . 'uploads/licenses';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $newFileName = 'lic_' . $hospitalId . '_' . $license['license_type'] . '_' . time() . '.' . $ext;
            $file->move($uploadDir, $newFileName);

            $dataToUpdate['document_path'] = 'uploads/licenses/' . $newFileName;
        }

        $this->licenseModel->update($licenseId, $dataToUpdate);

        return redirect()->to(site_url('hospital-admin/profile?tab=licenses'))
                         ->with('message', 'License ' . esc($license['title']) . ' updated successfully.');
    }
}

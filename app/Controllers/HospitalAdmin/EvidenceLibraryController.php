<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\AuditEvidenceMediaModel;

class EvidenceLibraryController extends BaseController
{
    protected HospitalModel $hospitalModel;
    protected AuditEvidenceMediaModel $mediaModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
        $this->mediaModel    = new AuditEvidenceMediaModel();
    }

    protected function getActiveHospitalId(): int
    {
        $sessionHospitalId = (int) session()->get('hospital_id');
        if ($sessionHospitalId > 0) {
            return $sessionHospitalId;
        }

        $requestedId = (int) $this->request->getGet('hospital_id');
        if ($requestedId > 0 && has_role('super_admin')) {
            return $requestedId;
        }

        $firstHospital = $this->hospitalModel->first();
        return $firstHospital ? (int) $firstHospital['id'] : 1;
    }

    public function index()
    {
        $hospitalId = $this->getActiveHospitalId();
        $category   = $this->request->getGet('category') ?? 'all';
        $hospital   = $this->hospitalModel->find($hospitalId);
        $evidence   = $this->mediaModel->getEvidenceForHospital($hospitalId, $category);

        return $this->renderWithLayout('hospital_admin/evidence_library', [
            'hospital'       => $hospital,
            'evidence'       => $evidence,
            'activeCategory' => $category,
        ], 'Live Photo & Video Audit Evidence Library');
    }

    public function upload()
    {
        $hospitalId = $this->getActiveHospitalId();

        $rules = [
            'title'    => 'required|min_length[3]|max_length[191]',
            'category' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(site_url('hospital-admin/evidence-library'))
                             ->withInput()
                             ->with('error', 'Please provide a valid evidence title and category.');
        }

        $file = $this->request->getFile('media_file');
        if (!$file || !$file->isValid()) {
            return redirect()->to(site_url('hospital-admin/evidence-library'))
                             ->with('error', 'Please attach a valid image or video file.');
        }

        $ext = strtolower($file->getClientExtension());
        $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true);
        $isVideo = in_array($ext, ['mp4', 'mov', 'webm'], true);

        if (!$isImage && !$isVideo) {
            return redirect()->to(site_url('hospital-admin/evidence-library'))
                             ->with('error', 'Allowed formats: JPG, PNG, WEBP, MP4, MOV.');
        }

        $uploadDir = FCPATH . 'uploads/evidence';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $newFileName = 'ev_' . $hospitalId . '_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $file->move($uploadDir, $newFileName);

        $this->mediaModel->insert([
            'hospital_id'      => $hospitalId,
            'category'         => trim($this->request->getPost('category')),
            'title'            => trim($this->request->getPost('title')),
            'department_name'  => trim($this->request->getPost('department_name') ?? 'General'),
            'media_type'       => $isVideo ? 'video' : 'image',
            'file_path'        => 'uploads/evidence/' . $newFileName,
            'geo_location'     => trim($this->request->getPost('geo_location') ?? ''),
            'capture_date'     => $this->request->getPost('capture_date') ?: date('Y-m-d'),
            'auditor_verified' => 1,
            'remarks'          => trim($this->request->getPost('remarks') ?? ''),
        ]);

        return redirect()->to(site_url('hospital-admin/evidence-library'))
                         ->with('message', 'Evidence media uploaded successfully to Auditor Verification Vault.');
    }
}

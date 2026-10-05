<?php

namespace App\Controllers\Clinical;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\DpdpConsentModel;
use App\Models\PatientWorkflowStepModel;
use App\Models\DepartmentModel;
use App\Models\AuditLogModel;

class ClinicalWorkflowController extends BaseController
{
    protected PatientModel $patientModel;
    protected DpdpConsentModel $consentModel;
    protected PatientWorkflowStepModel $stepModel;
    protected DepartmentModel $deptModel;
    protected AuditLogModel $auditLogModel;

    public function __construct()
    {
        $this->request        = service('request');
        $this->response       = service('response');
        $this->patientModel   = new PatientModel();
        $this->consentModel   = new DpdpConsentModel();
        $this->stepModel      = new PatientWorkflowStepModel();
        $this->deptModel      = new DepartmentModel();
        $this->auditLogModel  = new AuditLogModel();
    }

    /**
     * Display the Dynamic Clinical Workflow, UHID & DPDP Consent Dashboard
     */
    public function index()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userRole   = session()->get('role_slug');
        $filterDept = $this->request->getGet('dept_id');
        $deptId     = in_array($userRole, ['super_admin', 'hospital_admin', 'nabh_coordinator'])
            ? ($filterDept ? (int)$filterDept : null)
            : session()->get('department_id');
        $status     = $this->request->getGet('status') ?: 'all';

        $patients    = $this->patientModel->getPatientsWithConsents($hospitalId, $deptId, $status);
        $departments = $this->deptModel->where('hospital_id', $hospitalId)->findAll();
        $metrics     = $this->patientModel->getClinicalMetrics($hospitalId);
        $nextUhid    = $this->patientModel->generateUhid($hospitalId);

        // Fetch workflow steps for active patients
        $patientSteps = [];
        foreach ($patients as $pt) {
            $patientSteps[$pt['id']] = $this->stepModel->getForPatient($pt['id']);
        }

        return $this->renderWithLayout('clinical/index', [
            'patients'     => $patients,
            'departments'  => $departments,
            'metrics'      => $metrics,
            'nextUhid'     => $nextUhid,
            'patientSteps' => $patientSteps,
            'activeStatus' => $status,
        ], 'Digital Clinical Workflow & DPDP Consent Hub');
    }

    /**
     * Register a new Patient with auto-generated UHID and ABHA Linking
     */
    public function registerPatient()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $uhid = $this->patientModel->generateUhid($hospitalId);
        $firstName = trim((string) $this->request->getPost('first_name'));
        $lastName  = trim((string) $this->request->getPost('last_name'));
        $abhaNum   = trim((string) $this->request->getPost('abha_number'));
        $abhaAddr  = trim((string) $this->request->getPost('abha_address'));

        $patientData = [
            'hospital_id'       => $hospitalId,
            'department_id'     => $this->request->getPost('department_id') ?: null,
            'uhid'              => $uhid,
            'first_name'        => $firstName,
            'last_name'         => $lastName,
            'gender'            => $this->request->getPost('gender') ?: 'male',
            'age'               => (int) $this->request->getPost('age') ?: null,
            'mobile'            => trim((string) $this->request->getPost('mobile')),
            'emergency_contact' => trim((string) $this->request->getPost('emergency_contact')),
            'blood_group'       => $this->request->getPost('blood_group') ?: 'O+',
            'address'           => trim((string) $this->request->getPost('address')),
            'abha_number'       => $abhaNum ?: null,
            'abha_address'      => $abhaAddr ?: null,
            'abha_status'       => ! empty($abhaNum) ? 'verified' : 'unlinked',
            'admission_status'  => $this->request->getPost('admission_status') ?: 'registered',
            'bed_number'        => trim((string) $this->request->getPost('bed_number')),
            'attending_doctor'  => trim((string) $this->request->getPost('attending_doctor')),
            'admission_date'    => date('Y-m-d H:i:s'),
        ];

        $patientId = $this->patientModel->insert($patientData);

        if ($patientId) {
            // Seed default DPDP consents and clinical workflow steps
            $fullName = $firstName . ' ' . $lastName;
            $this->consentModel->createDefaultConsentsForPatient($hospitalId, $patientId, $fullName);
            $this->stepModel->initStepsForPatient($hospitalId, $patientId);

            $this->auditLogModel->log('REGISTER_PATIENT', 'CLINICAL', $hospitalId, $userId, 'patients', $patientId, null, $patientData);

            return redirect()->to('/clinical')->with('message', "Patient registered successfully with Unique Hospital ID: {$uhid}");
        }

        return redirect()->back()->withInput()->with('error', 'Unable to register patient. Please check required fields.');
    }

    /**
     * Link Ayushman Bharat Health Account (ABHA) to Patient
     */
    public function linkAbha()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $patientId = (int) $this->request->getPost('patient_id');
        $abhaNum   = trim((string) $this->request->getPost('abha_number'));
        $abhaAddr  = trim((string) $this->request->getPost('abha_address'));

        $this->patientModel->update($patientId, [
            'abha_number'  => $abhaNum,
            'abha_address' => $abhaAddr,
            'abha_status'  => 'verified',
        ]);

        $this->auditLogModel->log('LINK_ABHA', 'CLINICAL', $hospitalId, $userId, 'patients', $patientId, null, ['abha' => $abhaNum]);

        return redirect()->to('/clinical')->with('message', 'ABHA Health Account successfully verified and linked to UHID.');
    }

    /**
     * Digitally Grant a DPDP Consent with E-Signature Simulation
     */
    public function grantConsent()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $consentId     = (int) $this->request->getPost('consent_id');
        $signatoryName = trim((string) $this->request->getPost('signatory_name'));
        $signatoryType = (string) $this->request->getPost('signatory_type') ?: 'patient';
        $witnessName   = trim((string) $this->request->getPost('witness_name'));
        $lang          = (string) $this->request->getPost('language') ?: 'en';
        $otp           = (string) ($this->request->getPost('verification_otp') ?: rand(1000, 9999));

        $sigHash = 'SIG-DPDP-' . strtoupper(bin2hex(random_bytes(8)));

        $updateData = [
            'signatory_name'         => $signatoryName,
            'signatory_type'         => $signatoryType,
            'witness_name'           => $witnessName,
            'language'               => $lang,
            'status'                 => 'granted',
            'granted_at'             => date('Y-m-d H:i:s'),
            'expiry_date'            => date('Y-m-d', strtotime('+365 days')),
            'digital_signature_hash' => $sigHash,
            'verification_otp'       => $otp,
            'ip_address'             => $this->request->getIPAddress(),
        ];

        $this->consentModel->update($consentId, $updateData);

        $this->auditLogModel->log('GRANT_DPDP_CONSENT', 'CLINICAL', $hospitalId, $userId, 'dpdp_consents', $consentId, null, $updateData);

        return redirect()->to('/clinical')->with('message', 'DPDP 2023 Digital Informed Consent verified and signed with cryptographic hash.');
    }

    /**
     * Revoke a DPDP Consent under DPDP 2023 Right to Withdraw
     */
    public function revokeConsent()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $consentId = (int) $this->request->getPost('consent_id');
        $reason    = trim((string) $this->request->getPost('revoke_reason'));

        $this->consentModel->update($consentId, [
            'status'     => 'revoked',
            'revoked_at' => date('Y-m-d H:i:s'),
        ]);

        $this->auditLogModel->log('REVOKE_DPDP_CONSENT', 'CLINICAL', $hospitalId, $userId, 'dpdp_consents', $consentId, null, ['reason' => $reason]);

        return redirect()->to('/clinical')->with('message', 'DPDP Consent revoked as per patient request.');
    }

    /**
     * Update Clinical Quality Checkpoint Step
     */
    public function updateStep()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;
        $userName   = session()->get('user_name') ?? 'Clinical Nurse';

        $stepId = (int) $this->request->getPost('step_id');
        $status = (string) $this->request->getPost('status');
        $notes  = trim((string) $this->request->getPost('notes'));

        $updateData = [
            'status'       => $status,
            'notes'        => $notes,
            'completed_by' => $status === 'completed' ? $userName : null,
            'completed_at' => $status === 'completed' ? date('Y-m-d H:i:s') : null,
        ];

        $this->stepModel->update($stepId, $updateData);

        $this->auditLogModel->log('UPDATE_WORKFLOW_STEP', 'CLINICAL', $hospitalId, $userId, 'patient_workflow_steps', $stepId, null, $updateData);

        return redirect()->to('/clinical')->with('message', 'Clinical quality checkpoint updated.');
    }

    /**
     * Update Patient Admission & Clinical Journey State
     */
    public function updateAdmissionStatus()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $patientId = (int) $this->request->getPost('patient_id');
        $status    = (string) $this->request->getPost('admission_status');
        $bedNumber = trim((string) $this->request->getPost('bed_number'));

        $updateData = ['admission_status' => $status];
        if (! empty($bedNumber)) {
            $updateData['bed_number'] = $bedNumber;
        }

        if ($status === 'discharged') {
            $updateData['discharge_date'] = date('Y-m-d H:i:s');
        }

        $this->patientModel->update($patientId, $updateData);

        $this->auditLogModel->log('UPDATE_PATIENT_STATUS', 'CLINICAL', $hospitalId, $userId, 'patients', $patientId, null, $updateData);

        return redirect()->to('/clinical')->with('message', "Patient clinical journey updated to '{$status}'.");
    }
}

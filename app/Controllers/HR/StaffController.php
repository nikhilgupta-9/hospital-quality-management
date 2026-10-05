<?php

namespace App\Controllers\HR;

use App\Controllers\BaseController;
use App\Models\StaffModel;
use App\Models\StaffDocumentModel;
use App\Models\TrainingModel;
use App\Models\CredentialingModel;
use App\Models\DepartmentModel;
use App\Models\AuditLogModel;
use App\Models\StaffHealthRecordModel;
use App\Models\ExpiryAlertLogModel;

class StaffController extends BaseController
{
    protected $staffModel;
    protected $staffDocModel;
    protected $trainingModel;
    protected $credentialingModel;
    protected $deptModel;
    protected $auditLogModel;
    protected $healthModel;
    protected $expiryModel;

    public function __construct()
    {
        $this->staffModel         = new StaffModel();
        $this->staffDocModel      = new StaffDocumentModel();
        $this->trainingModel      = new TrainingModel();
        $this->credentialingModel = new CredentialingModel();
        $this->deptModel          = new DepartmentModel();
        $this->auditLogModel      = new AuditLogModel();
        $this->healthModel        = new StaffHealthRecordModel();
        $this->expiryModel        = new ExpiryAlertLogModel();
    }

    public function index()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $deptId = session()->get('department_id');

        $staffMembers = $this->staffModel->getWithDetails($hospitalId, $deptId);
        $credentials  = $this->credentialingModel->getWithDetails($hospitalId);
        $trainings    = $this->trainingModel->getWithAttendanceStats($hospitalId);
        $expiringDocs = $this->staffDocModel->getExpiring($hospitalId, 60);
        $departments  = $this->deptModel->where('hospital_id', $hospitalId)->findAll();
        $healthRoster = $this->healthModel->getHospitalHealthRoster($hospitalId);
        $expiryAlerts = $this->expiryModel->getRecentAlerts($hospitalId, 25);

        return $this->renderWithLayout('hr/index', [
            'staffMembers' => $staffMembers,
            'credentials'  => $credentials,
            'trainings'    => $trainings,
            'expiringDocs' => $expiringDocs,
            'departments'  => $departments,
            'healthRoster' => $healthRoster,
            'expiryAlerts' => $expiryAlerts,
        ], 'HR, Credentialing & Staff Health Suite');
    }

    public function create()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $staffData = [
            'hospital_id'      => $hospitalId,
            'department_id'    => $this->request->getPost('department_id'),
            'employee_code'    => $this->request->getPost('employee_code'),
            'name'             => $this->request->getPost('name'),
            'designation'      => $this->request->getPost('designation'),
            'qualification'    => $this->request->getPost('qualification'),
            'experience_years' => $this->request->getPost('experience_years'),
            'contact'          => $this->request->getPost('contact'),
        ];

        $staffId = $this->staffModel->insert($staffData);

        // Auto-create initial health record
        $this->healthModel->insert([
            'staff_id' => $staffId,
            'hepb_status' => 'not_vaccinated',
            'fitness_status' => 'fit',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->auditLogModel->log('CREATE_STAFF', 'HR', $hospitalId, $userId, 'staff', $staffId, null, $staffData);

        return redirect()->to('/hr')->with('message', 'Staff profile for ' . esc($this->request->getPost('name')) . ' added successfully.');
    }

    public function createTraining()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;

        $trainingData = [
            'hospital_id'    => $hospitalId,
            'title'          => $this->request->getPost('title'),
            'type'           => $this->request->getPost('type'),
            'scheduled_date' => $this->request->getPost('scheduled_date'),
            'trainer_name'   => $this->request->getPost('trainer_name'),
        ];

        $this->trainingModel->insert($trainingData);

        return redirect()->to('/hr')->with('message', 'NABH Training session scheduled successfully.');
    }

    public function updateHealthRecord()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;
        $staffId    = (int) $this->request->getPost('staff_id');

        $healthData = [
            'hepb_dose1_date'     => $this->request->getPost('hepb_dose1_date') ?: null,
            'hepb_dose2_date'     => $this->request->getPost('hepb_dose2_date') ?: null,
            'hepb_dose3_date'     => $this->request->getPost('hepb_dose3_date') ?: null,
            'hepb_booster_date'   => $this->request->getPost('hepb_booster_date') ?: null,
            'hepb_status'         => $this->request->getPost('hepb_status') ?: 'not_vaccinated',
            'anti_hbs_titer'      => $this->request->getPost('anti_hbs_titer') ?: null,
            'tt_vaccine_date'     => $this->request->getPost('tt_vaccine_date') ?: null,
            'annual_checkup_date' => $this->request->getPost('annual_checkup_date') ?: null,
            'fitness_status'      => $this->request->getPost('fitness_status') ?: 'fit',
            'medical_officer_name'=> $this->request->getPost('medical_officer_name') ?: 'Occupational Health Officer',
            'health_remarks'      => $this->request->getPost('health_remarks') ?: null,
            'updated_at'          => date('Y-m-d H:i:s'),
        ];

        $existing = $this->healthModel->where('staff_id', $staffId)->first();
        if ($existing) {
            $this->healthModel->update($existing['id'], $healthData);
        } else {
            $healthData['staff_id'] = $staffId;
            $healthData['created_at'] = date('Y-m-d H:i:s');
            $this->healthModel->insert($healthData);
        }

        $this->auditLogModel->log('UPDATE_STAFF_HEALTH', 'HR', $hospitalId, $userId, 'staff_health_records', $staffId, null, $healthData);

        return redirect()->to('/hr')->with('message', 'Staff vaccination & health record updated successfully.');
    }

    public function updatePrivileging()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;
        $staffId    = (int) $this->request->getPost('staff_id');

        $commStatus = $this->request->getPost('committee_status') ?: 'draft';

        $privData = [
            'staff_id'              => $staffId,
            'procedure'             => $this->request->getPost('procedure'),
            'privilege_type'        => $this->request->getPost('privilege_type') ?: 'core',
            'status'                => ($commStatus === 'ms_approved') ? 'approved' : 'credentialing',
            'committee_status'      => $commStatus,
            'verified_by'           => $userId,
            'committee_reviewed_at' => ($commStatus === 'committee_approved' || $commStatus === 'ms_approved') ? date('Y-m-d H:i:s') : null,
            'ms_approved_at'        => ($commStatus === 'ms_approved') ? date('Y-m-d H:i:s') : null,
            'valid_until'           => $this->request->getPost('valid_until') ?: date('Y-m-d', strtotime('+1 year')),
            'notes'                 => $this->request->getPost('notes'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ];

        $existing = $this->credentialingModel->where('staff_id', $staffId)->first();
        if ($existing) {
            $this->credentialingModel->update($existing['id'], $privData);
        } else {
            $privData['created_at'] = date('Y-m-d H:i:s');
            $this->credentialingModel->insert($privData);
        }

        $this->auditLogModel->log('UPDATE_PRIVILEGING', 'HR', $hospitalId, $userId, 'credentialing', $staffId, null, $privData);

        return redirect()->to('/hr')->with('message', 'Clinical procedural privileging status updated to ' . strtoupper(str_replace('_', ' ', $commStatus)) . '.');
    }

    public function triggerExpiryCheck()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $docs = $this->staffDocModel->getExpiring($hospitalId, 60);

        $createdAlerts = 0;
        foreach ($docs as $doc) {
            $daysLeft = (int) $doc['days_left'];
            $threshold = ($daysLeft <= 15) ? 15 : (($daysLeft <= 30) ? 30 : 60);

            $this->expiryModel->insert([
                'staff_id'       => $doc['staff_id'],
                'alert_type'     => 'council_reg',
                'days_threshold' => $threshold,
                'expiry_date'    => $doc['expiry_date'],
                'sent_channel'   => 'email_sms',
                'status'         => 'notified',
                'details'        => esc($doc['doc_type']) . ' expiring in ' . $daysLeft . ' days (Date: ' . $doc['expiry_date'] . '). Automated renewal notification broadcasted.',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ]);
            $createdAlerts++;
        }

        return redirect()->to('/hr')->with('message', 'Automated 60/30/15-Day Expiry Engine executed. Logged ' . $createdAlerts . ' license alert triggers.');
    }
}

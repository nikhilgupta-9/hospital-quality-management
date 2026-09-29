<?php

namespace App\Controllers\HR;

use App\Controllers\BaseController;
use App\Models\StaffModel;
use App\Models\StaffDocumentModel;
use App\Models\TrainingModel;
use App\Models\CredentialingModel;
use App\Models\DepartmentModel;
use App\Models\AuditLogModel;

class StaffController extends BaseController
{
    protected $staffModel;
    protected $staffDocModel;
    protected $trainingModel;
    protected $credentialingModel;
    protected $deptModel;
    protected $auditLogModel;

    public function __construct()
    {
        $this->staffModel         = new StaffModel();
        $this->staffDocModel      = new StaffDocumentModel();
        $this->trainingModel      = new TrainingModel();
        $this->credentialingModel = new CredentialingModel();
        $this->deptModel          = new DepartmentModel();
        $this->auditLogModel      = new AuditLogModel();
    }

    public function index()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $deptId = session()->get('department_id');

        $staffMembers = $this->staffModel->getWithDetails($hospitalId, $deptId);
        $credentials  = $this->credentialingModel->getWithDetails($hospitalId);
        $trainings    = $this->trainingModel->getWithAttendanceStats($hospitalId);
        $expiringDocs = $this->staffDocModel->getExpiring($hospitalId, 30);
        $departments  = $this->deptModel->where('hospital_id', $hospitalId)->findAll();

        return $this->renderWithLayout('hr/index', [
            'staffMembers' => $staffMembers,
            'credentials'  => $credentials,
            'trainings'    => $trainings,
            'expiringDocs' => $expiringDocs,
            'departments'  => $departments,
        ], 'HR, Credentialing & Training Suite');
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

        return redirect()->to('/hr')->with('message', 'Training session scheduled successfully.');
    }
}

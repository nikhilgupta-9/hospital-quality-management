<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\UserModel;
use App\Models\SubscriptionModel;
use App\Models\AuditLogModel;

class HospitalController extends BaseController
{
    protected $hospitalModel;
    protected $userModel;
    protected $subModel;
    protected $auditLogModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
        $this->userModel     = new UserModel();
        $this->subModel      = new SubscriptionModel();
        $this->auditLogModel = new AuditLogModel();
    }

    public function index()
    {
        $hospitals     = $this->hospitalModel->findAll();
        $users         = $this->userModel->findAll();
        $subscriptions = $this->subModel->getWithHospital();
        $auditLogs     = $this->auditLogModel->getLogs(null, 50);

        return $this->renderWithLayout('admin/dashboard', [
            'hospitals'     => $hospitals,
            'users'         => $users,
            'subscriptions' => $subscriptions,
            'auditLogs'     => $auditLogs,
        ], 'Super Admin — Overview');
    }

    public function create()
    {
        $hospitalData = [
            'name' => $this->request->getPost('name'),
            'code' => $this->request->getPost('code'),
        ];

        $hospitalId = $this->hospitalModel->insert($hospitalData);

        // create subscription
        $this->subModel->insert([
            'hospital_id' => $hospitalId,
            'plan'        => 'Enterprise NABH Compliance Suite',
            'max_users'   => 150,
            'features_json' => json_encode(['document_panel', 'hr_panel', 'equipment_panel']),
            'expiry_date' => date('Y-m-d', strtotime('+1 year')),
        ]);

        $this->auditLogModel->log('CREATE_HOSPITAL', 'ADMIN', $hospitalId, session()->get('user_id'), 'hospitals', $hospitalId, null, $hospitalData);

        return redirect()->to('/admin')->with('message', 'Hospital ' . esc($this->request->getPost('name')) . ' registered successfully.');
    }
}

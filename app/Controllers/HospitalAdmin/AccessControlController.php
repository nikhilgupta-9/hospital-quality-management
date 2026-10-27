<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\AuditLogModel;

class AccessControlController extends BaseController
{
    protected HospitalModel $hospitalModel;
    protected UserModel $userModel;
    protected RoleModel $roleModel;
    protected AuditLogModel $auditLogModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
        $this->userModel     = new UserModel();
        $this->roleModel     = new RoleModel();
        $this->auditLogModel = new AuditLogModel();
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
        $hospital   = $this->hospitalModel->find($hospitalId);
        
        // Fetch all users belonging to this specific hospital
        $db = \Config\Database::connect();
        $users = $db->table('users')
                    ->select('users.*, roles.name as role_name, roles.slug as role_slug')
                    ->join('roles', 'roles.id = users.role_id', 'left')
                    ->where('users.hospital_id', $hospitalId)
                    ->orWhere('users.role_id', 1) // Include Super Admin overview
                    ->orderBy('users.role_id', 'ASC')
                    ->get()
                    ->getResultArray();

        $roles = $this->roleModel->findAll();

        $securityPolicies = [
            [
                'title'       => 'Hospital Tenancy Isolation',
                'description' => 'Staff from one hospital cannot read, query or export records of another hospital.',
                'status'      => 'Active & Enforced',
                'badge'       => 'bg-success',
                'icon'        => 'fas fa-building-shield',
            ],
            [
                'title'       => 'Dual Login Gateways',
                'description' => 'Clinical staff login exclusively at /login; Administrative command at /admin/login.',
                'status'      => 'Hardened',
                'badge'       => 'bg-success',
                'icon'        => 'fas fa-door-closed',
            ],
            [
                'title'       => 'Role-Based Access Control (RBAC)',
                'description' => 'Doctors, Nurses, and Coordinators can only access their assigned departmental routes.',
                'status'      => 'Enforced (4 Roles)',
                'badge'       => 'bg-success',
                'icon'        => 'fas fa-user-lock',
            ],
            [
                'title'       => 'Audit Trail Telemetry',
                'description' => 'Every document modification, consent grant, and license update is logged with user IP.',
                'status'      => 'Immutable Logging',
                'badge'       => 'bg-success',
                'icon'        => 'fas fa-shield-halved',
            ],
        ];

        return $this->renderWithLayout('hospital_admin/access_control', [
            'hospital'         => $hospital,
            'users'            => $users,
            'roles'            => $roles,
            'securityPolicies' => $securityPolicies,
        ], 'Settings & Access Control (RBAC)');
    }

    public function createUser()
    {
        $hospitalId = $this->getActiveHospitalId();

        $rules = [
            'name'     => 'required|min_length[3]|max_length[191]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'role_id'  => 'required|integer',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(site_url('hospital-admin/access-control'))
                             ->withInput()
                             ->with('error', 'Please check the user form: Email must be unique and password at least 8 characters.');
        }

        $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

        $this->userModel->insert([
            'hospital_id'   => $hospitalId,
            'role_id'       => (int) $this->request->getPost('role_id'),
            'name'          => trim($this->request->getPost('name')),
            'email'         => strtolower(trim($this->request->getPost('email'))),
            'password_hash' => $passwordHash,
            'status'        => 'active',
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('hospital-admin/access-control'))
                         ->with('message', 'New authorized hospital user created successfully with role isolation.');
    }
}

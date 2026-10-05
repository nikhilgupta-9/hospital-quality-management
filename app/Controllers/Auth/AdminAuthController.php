<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\HospitalModel;
use App\Models\RoleModel;

class AdminAuthController extends BaseController
{
    protected AdminModel $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    /**
     * Display the Dedicated Administrative Login View
     */
    public function login()
    {
        if (session()->get('isLoggedIn') && in_array(session()->get('role_slug'), ['super_admin', 'hospital_admin'])) {
            return session()->get('role_slug') === 'super_admin'
                ? redirect()->to('/admin')
                : redirect()->to('/hospital-admin');
        }

        return view('auth/admin_login');
    }

    /**
     * Process Administrative Login Attempt
     */
    public function attemptLogin()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email    = trim($this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        $admin = $this->adminModel->findActiveAdminByEmail($email);

        if ($admin === null) {
            // Check if user is staff attempting to use admin portal
            $staffModel = new \App\Models\StaffUserModel();
            if ($staffModel->findActiveStaffByEmail($email) !== null) {
                return redirect()->back()->withInput()->with('error', 'Access Denied: Regular staff accounts cannot sign in through the Admin Portal. Please use the Staff Quality Portal.');
            }

            return redirect()->back()->withInput()->with('error', 'Invalid administrative credentials or account inactive.');
        }

        if (! $this->adminModel->verifyPassword($password, $admin['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid administrative credentials.');
        }

        session()->regenerate();
        session()->set([
            'isLoggedIn'        => true,
            'isAdminLoggedIn'   => true,
            'isStaffLoggedIn'   => false,
            'auth_guard'        => 'admin',
            'user_id'           => $admin['id'],
            'user_name'         => $admin['name'],
            'user_email'        => $admin['email'],
            'role_slug'         => $admin['role_slug'],
            'role_name'         => $admin['role_name'],
            'hospital_id'       => $admin['hospital_id'],
            'hospital_name'     => $admin['hospital_name'] ?? 'HQ Administration',
            'department_id'     => null,
        ]);

        $this->adminModel->touchLastLogin($admin['id']);

        log_message('info', 'Administrator {email} logged in successfully as [{role}].', [
            'email' => $email,
            'role'  => $admin['role_slug'],
        ]);

        return $admin['role_slug'] === 'super_admin'
            ? redirect()->to('/admin')->with('message', 'Welcome back, Super Administrator.')
            : redirect()->to('/hospital-admin')->with('message', 'Welcome back, Hospital Executive.');
    }

    /**
     * Display Administrative Registration View (Secured with Master Key)
     */
    public function register()
    {
        if (session()->get('isLoggedIn') && session()->get('role_slug') === 'super_admin') {
            // Allow logged-in super admin to create new hospital admins easily
        }

        $hospitalModel = new HospitalModel();
        $hospitals = $hospitalModel->where('status', 'active')->orderBy('name', 'ASC')->findAll();

        return view('auth/admin_register', [
            'hospitals' => $hospitals,
        ]);
    }

    /**
     * Process Administrative Registration Attempt
     */
    public function attemptRegister()
    {
        $rules = [
            'name'             => 'required|min_length[3]|max_length[100]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
            'hospital_id'      => 'required|is_natural_no_zero',
            'admin_secret_key' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $masterKey = trim((string) $this->request->getPost('admin_secret_key'));
        $validKey  = env('ADMIN_REGISTRATION_KEY', 'HINTON-ADMIN-SECURE-2026');

        if ($masterKey !== $validKey) {
            return redirect()->back()->withInput()->with('error', 'Invalid Master Administrative Security Key. Unauthorized registration rejected.');
        }

        // Fetch hospital_admin role ID
        $db = \Config\Database::connect();
        $role = $db->table('roles')->where('slug', 'hospital_admin')->get()->getRowArray();
        $roleId = $role ? (int) $role['id'] : 2;

        $newAdminData = [
            'hospital_id'   => (int) $this->request->getPost('hospital_id'),
            'department_id' => null,
            'role_id'       => $roleId,
            'name'          => trim((string) $this->request->getPost('name')),
            'email'         => trim((string) $this->request->getPost('email')),
            'password_hash' => $this->adminModel->hashPassword((string) $this->request->getPost('password')),
            'status'        => 'active',
        ];

        if (! $this->adminModel->insert($newAdminData)) {
            return redirect()->back()->withInput()->with('error', 'Failed to register administrator account. Please check data.');
        }

        log_message('notice', 'New Hospital Admin registered: {email}', ['email' => $newAdminData['email']]);

        return redirect()->to('/admin/login')->with('message', 'Administrative account successfully created! Please sign in.');
    }

    /**
     * Admin Logout
     */
    public function logout()
    {
        session()->remove(['isLoggedIn', 'isAdminLoggedIn', 'auth_guard', 'user_id', 'user_name', 'user_email', 'role_slug', 'role_name', 'hospital_id', 'hospital_name', 'department_id']);
        session()->destroy();

        return redirect()->to('/admin/login')->with('message', 'You have been safely logged out from the Administrative Command Suite.');
    }
}

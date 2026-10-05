<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\StaffUserModel;

class StaffAuthController extends BaseController
{
    protected StaffUserModel $staffModel;

    public function __construct()
    {
        $this->staffModel = new StaffUserModel();
    }

    /**
     * Display the Dedicated Clinical & Staff Portal Login View
     */
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            if (in_array(session()->get('role_slug'), ['super_admin', 'hospital_admin'])) {
                return redirect()->to(session()->get('role_slug') === 'super_admin' ? '/admin' : '/hospital-admin');
            }
            return redirect()->to('/document');
        }

        return view('auth/staff_login');
    }

    /**
     * Process Staff Login Attempt
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

        $staff = $this->staffModel->findActiveStaffByEmail($email);

        if ($staff === null) {
            // Check if this is an administrative account trying to log into the staff portal
            if ($this->staffModel->isEmailAdminAccount($email)) {
                return redirect()->to('/admin/login')
                    ->withInput()
                    ->with('error', 'Administrator account detected. Please use the dedicated Administrative Command Portal.');
            }

            return redirect()->back()->withInput()->with('error', 'Invalid work email or password. Please verify credentials.');
        }

        if (! $this->staffModel->verifyPassword($password, $staff['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid work email or password.');
        }

        session()->regenerate();
        session()->set([
            'isLoggedIn'        => true,
            'isStaffLoggedIn'   => true,
            'isAdminLoggedIn'   => false,
            'auth_guard'        => 'staff',
            'user_id'           => $staff['id'],
            'user_name'         => $staff['name'],
            'user_email'        => $staff['email'],
            'role_slug'         => $staff['role_slug'],
            'role_name'         => $staff['role_name'],
            'hospital_id'       => $staff['hospital_id'],
            'hospital_name'     => $staff['hospital_name'] ?? 'Hospital Quality Portal',
            'department_id'     => $staff['department_id'],
            'department_name'   => $staff['department_name'] ?? 'General Department',
        ]);

        $this->staffModel->touchLastLogin($staff['id']);

        log_message('info', 'Staff user {email} logged in successfully as [{role}].', [
            'email' => $email,
            'role'  => $staff['role_slug'],
        ]);

        return redirect()->to('/dashboard')->with('message', "Welcome back, {$staff['name']}.");
    }

    /**
     * Display Staff Self-Registration View
     */
    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        $hospitals   = $this->staffModel->getActiveHospitals();
        $defaultHospitalId = ! empty($hospitals) ? (int) $hospitals[0]['id'] : 1;
        $departments = $this->staffModel->getDepartmentsByHospital($defaultHospitalId);

        return view('auth/staff_register', [
            'hospitals'   => $hospitals,
            'departments' => $departments,
        ]);
    }

    /**
     * AJAX endpoint to fetch departments when user chooses a hospital in the register form
     */
    public function getDepartments(int $hospitalId)
    {
        $departments = $this->staffModel->getDepartmentsByHospital($hospitalId);
        return $this->response->setJSON($departments);
    }

    /**
     * Process Staff Self-Registration Attempt
     */
    public function attemptRegister()
    {
        $rules = [
            'name'             => 'required|min_length[3]|max_length[100]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
            'hospital_id'      => 'required|is_natural_no_zero',
            'department_id'    => 'required|is_natural_no_zero',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $roleId = $this->staffModel->getDefaultStaffRoleId(); // strictly dept_user

        $staffData = [
            'hospital_id'   => (int) $this->request->getPost('hospital_id'),
            'department_id' => (int) $this->request->getPost('department_id'),
            'role_id'       => $roleId,
            'name'          => trim((string) $this->request->getPost('name')),
            'email'         => trim((string) $this->request->getPost('email')),
            'password_hash' => $this->staffModel->hashPassword((string) $this->request->getPost('password')),
            'status'        => 'active',
        ];

        if (! $this->staffModel->insert($staffData)) {
            return redirect()->back()->withInput()->with('error', 'Unable to create staff account. Please verify input fields.');
        }

        log_message('info', 'New staff member registered: {email}', ['email' => $staffData['email']]);

        return redirect()->to('/login')->with('message', 'Staff registration successful! You can now sign in with your credentials.');
    }

    /**
     * Staff Logout
     */
    public function logout()
    {
        session()->remove(['isLoggedIn', 'isStaffLoggedIn', 'auth_guard', 'user_id', 'user_name', 'user_email', 'role_slug', 'role_name', 'hospital_id', 'hospital_name', 'department_id', 'department_name']);
        session()->destroy();

        return redirect()->to('/login')->with('message', 'You have been signed out.');
    }
}

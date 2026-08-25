<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function show()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login');
    }

    public function attempt()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $email     = $this->request->getPost('email');
        $password  = $this->request->getPost('password');

        $user = $userModel->findActiveByEmail($email);

        if ($user === null || ! $userModel->verifyPassword($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Incorrect email or password.');
        }

        session()->regenerate();
        session()->set([
            'isLoggedIn'    => true,
            'user_id'       => $user['id'],
            'user_name'     => $user['name'],
            'user_email'    => $user['email'],
            'role_slug'     => $user['role_slug'],
            'role_name'     => $user['role_name'],
            'hospital_id'   => $user['hospital_id'],
            'department_id' => $user['department_id'],
        ]);

        $userModel->touchLastLogin($user['id']);

        log_message('info', 'User {email} logged in.', ['email' => $email]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('message', 'You have been signed out.');
    }
}

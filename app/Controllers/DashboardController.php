<?php

namespace App\Controllers;

/**
 * Post-login landing point. Sends each role straight to its own home
 * per the access hierarchy in the project overview — nobody lands on a
 * screen their role can't use.
 */
class DashboardController extends BaseController
{
    public function index()
    {
        return match (session()->get('role_slug')) {
            'super_admin'      => redirect()->to('/admin'),
            'hospital_admin'   => redirect()->to('/hospital-admin'),
            'nabh_coordinator', 'dept_user' => redirect()->to('/document'),
            default            => redirect()->to('/login'),
        };
    }
}

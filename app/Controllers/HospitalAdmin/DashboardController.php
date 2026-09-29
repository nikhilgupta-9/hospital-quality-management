<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('hospital_admin/dashboard', [
            'heading' => 'Hospital Compliance Dashboard',
        ], 'Hospital Admin — Compliance Scorecard');
    }
}

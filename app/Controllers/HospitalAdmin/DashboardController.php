<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'Hospital Compliance Dashboard',
            'message' => 'NABH readiness score and department-wise compliance land here in the next build phase.',
        ], 'Hospital Admin');
    }
}

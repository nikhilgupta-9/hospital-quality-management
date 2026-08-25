<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;

class ReportController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'High-Level Reports',
            'message' => 'Audit, compliance, CAPA, training, and equipment reports land here in the next build phase.',
        ], 'Reports');
    }
}

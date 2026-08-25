<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;

class ApprovalController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'Budget & Resource Approvals',
            'message' => 'Training, equipment, calibration, and AMC/CMC approval requests land here in the next build phase.',
        ], 'Approvals');
    }
}

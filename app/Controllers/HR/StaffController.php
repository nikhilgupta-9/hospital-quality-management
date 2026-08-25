<?php

namespace App\Controllers\HR;

use App\Controllers\BaseController;

class StaffController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'HR Panel',
            'message' => 'Staff profiles, credentials, training, and privileging land here in the next build phase.',
        ], 'HR');
    }
}

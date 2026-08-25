<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HospitalController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'Hospitals & Branches',
            'message' => 'Add, edit, and configure hospitals/branches here — CRUD lands in the next build phase.',
        ], 'Hospitals');
    }
}

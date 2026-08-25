<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;

class DepartmentController extends BaseController
{
    public function index()
    {
        $departments = (new DepartmentModel())->forHospital((int) session()->get('hospital_id'));

        return $this->renderWithLayout('placeholder', [
            'heading' => 'Departments',
            'message' => count($departments) . ' department(s) configured. Full add/edit UI lands in the next build phase.',
        ], 'Departments');
    }
}

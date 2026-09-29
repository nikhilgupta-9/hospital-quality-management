<?php

namespace App\Controllers\Equipment;

use App\Controllers\BaseController;
use App\Models\EquipmentModel;
use App\Models\CalibrationModel;
use App\Models\MaintenanceLogModel;
use App\Models\UtilitySystemModel;
use App\Models\DepartmentModel;
use App\Models\AuditLogModel;

class EquipmentController extends BaseController
{
    protected $equipmentModel;
    protected $calibrationModel;
    protected $maintenanceModel;
    protected $utilityModel;
    protected $deptModel;
    protected $auditLogModel;

    public function __construct()
    {
        $this->equipmentModel   = new EquipmentModel();
        $this->calibrationModel = new CalibrationModel();
        $this->maintenanceModel = new MaintenanceLogModel();
        $this->utilityModel     = new UtilitySystemModel();
        $this->deptModel        = new DepartmentModel();
        $this->auditLogModel    = new AuditLogModel();
    }

    public function index()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $deptId = session()->get('department_id');

        $equipments      = $this->equipmentModel->getWithDetails($hospitalId, $deptId);
        $dueCalibrations = $this->calibrationModel->getDueSoon($hospitalId, 30);
        $utilitySystems  = $this->utilityModel->getByHospital($hospitalId);
        $departments     = $this->deptModel->where('hospital_id', $hospitalId)->findAll();

        return $this->renderWithLayout('equipment/index', [
            'equipments'      => $equipments,
            'dueCalibrations' => $dueCalibrations,
            'utilitySystems'  => $utilitySystems,
            'departments'     => $departments,
        ], 'Equipment & Infrastructure Suite');
    }

    public function create()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $eqData = [
            'hospital_id'     => $hospitalId,
            'department_id'   => $this->request->getPost('department_id'),
            'asset_no'        => $this->request->getPost('asset_no'),
            'name'            => $this->request->getPost('name'),
            'category'        => $this->request->getPost('category'),
            'manufacturer'    => $this->request->getPost('manufacturer'),
            'model'           => $this->request->getPost('model'),
            'serial_no'       => $this->request->getPost('serial_no'),
            'amc_cmc_expiry'  => $this->request->getPost('amc_cmc_expiry'),
            'service_agency'  => $this->request->getPost('service_agency'),
            'status'          => 'active',
        ];

        $eqId = $this->equipmentModel->insert($eqData);

        // Auto schedule initial calibration
        $this->calibrationModel->insert([
            'equipment_id' => $eqId,
            'last_date'    => date('Y-m-d'),
            'next_date'    => date('Y-m-d', strtotime('+1 year')),
            'agency'       => 'NABL Certified Calibration Agency',
            'status'       => 'valid',
        ]);

        $this->auditLogModel->log('CREATE_EQUIPMENT', 'EQUIPMENT', $hospitalId, $userId, 'equipment', $eqId, null, $eqData);

        return redirect()->to('/equipment')->with('message', 'Medical equipment ' . esc($this->request->getPost('asset_no')) . ' registered successfully.');
    }
}

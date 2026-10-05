<?php

namespace App\Controllers\Equipment;

use App\Controllers\BaseController;
use App\Models\EquipmentModel;
use App\Models\CalibrationModel;
use App\Models\MaintenanceLogModel;
use App\Models\UtilitySystemModel;
use App\Models\DepartmentModel;
use App\Models\AuditLogModel;
use App\Models\FacilityRoundDefectModel;
use App\Models\EquipmentCondemnationModel;
use App\Models\SafetySopModel;

class EquipmentController extends BaseController
{
    protected $equipmentModel;
    protected $calibrationModel;
    protected $maintenanceModel;
    protected $utilityModel;
    protected $deptModel;
    protected $auditLogModel;
    protected $defectModel;
    protected $condemnationModel;
    protected $safetySopModel;

    public function __construct()
    {
        $this->equipmentModel    = new EquipmentModel();
        $this->calibrationModel  = new CalibrationModel();
        $this->maintenanceModel  = new MaintenanceLogModel();
        $this->utilityModel      = new UtilitySystemModel();
        $this->deptModel         = new DepartmentModel();
        $this->auditLogModel     = new AuditLogModel();
        $this->defectModel       = new FacilityRoundDefectModel();
        $this->condemnationModel = new EquipmentCondemnationModel();
        $this->safetySopModel    = new SafetySopModel();
    }

    public function index()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $deptId = session()->get('department_id');

        $equipments      = $this->equipmentModel->getWithDetails($hospitalId, $deptId);
        $dueCalibrations = $this->calibrationModel->getDueSoon($hospitalId, 30);
        $utilitySystems  = $this->utilityModel->getByHospital($hospitalId);
        $departments     = $this->deptModel->where('hospital_id', $hospitalId)->findAll();
        
        // Phase 2 Modules
        $facilityDefects = $this->defectModel->getForHospital($hospitalId, $deptId);
        $facilityMetrics = $this->defectModel->getFacilityMetrics($hospitalId);
        $condemnations   = $this->condemnationModel->getForHospital($hospitalId);
        $safetySops      = $this->safetySopModel->getActiveSops($hospitalId);

        // Equipment stats
        $totalAssets = count($equipments);
        $outOfOrderCount = 0;
        $underMaintCount = 0;
        $totalDowntimeHours = 0;

        foreach ($equipments as $eq) {
            if ($eq['status'] === 'out_of_order') $outOfOrderCount++;
            if ($eq['status'] === 'under_maintenance') $underMaintCount++;
            $totalDowntimeHours += (int) ($eq['breakdown_downtime_hours'] ?? 0);
        }

        $equipmentMetrics = [
            'total_assets'     => $totalAssets,
            'out_of_order'     => $outOfOrderCount,
            'under_maint'      => $underMaintCount,
            'operational_rate' => $totalAssets > 0 ? round((($totalAssets - $outOfOrderCount) / $totalAssets) * 100, 1) : 100,
            'total_downtime'   => $totalDowntimeHours,
        ];

        return $this->renderWithLayout('equipment/index', [
            'equipments'       => $equipments,
            'dueCalibrations'  => $dueCalibrations,
            'utilitySystems'   => $utilitySystems,
            'departments'      => $departments,
            'facilityDefects'  => $facilityDefects,
            'facilityMetrics'  => $facilityMetrics,
            'condemnations'    => $condemnations,
            'safetySops'       => $safetySops,
            'equipmentMetrics' => $equipmentMetrics,
        ], 'Infrastructure & Equipment Management Grid');
    }

    public function create()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $eqData = [
            'hospital_id'              => $hospitalId,
            'department_id'            => $this->request->getPost('department_id'),
            'asset_no'                 => $this->request->getPost('asset_no'),
            'name'                     => $this->request->getPost('name'),
            'category'                 => $this->request->getPost('category'),
            'manufacturer'             => $this->request->getPost('manufacturer'),
            'model'                    => $this->request->getPost('model'),
            'serial_no'                => $this->request->getPost('serial_no'),
            'purchase_date'            => $this->request->getPost('purchase_date') ?: date('Y-m-d'),
            'install_date'             => $this->request->getPost('install_date') ?: date('Y-m-d'),
            'amc_cmc_expiry'           => $this->request->getPost('amc_cmc_expiry'),
            'service_agency'           => $this->request->getPost('service_agency'),
            'status'                   => 'active',
            'current_ppm_date'          => date('Y-m-d'),
            'next_ppm_date'             => date('Y-m-d', strtotime('+6 months')),
            'ppm_frequency_months'      => 6,
            'breakdown_downtime_hours' => 0,
            'condemnation_status'       => 'none',
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

    /**
     * Log a new Facility Safety Round Defect
     */
    public function createDefect()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;
        $userName   = session()->get('user_name') ?? 'Safety Auditor';

        $data = [
            'hospital_id'             => $hospitalId,
            'department_id'           => $this->request->getPost('department_id') ?: null,
            'round_date'              => $this->request->getPost('round_date') ?: date('Y-m-d'),
            'inspector_name'          => $this->request->getPost('inspector_name') ?: $userName,
            'location_area'           => trim((string) $this->request->getPost('location_area')),
            'defect_category'         => $this->request->getPost('defect_category'),
            'description'             => trim((string) $this->request->getPost('description')),
            'severity'                => $this->request->getPost('severity') ?: 'medium',
            'assigned_to'             => trim((string) $this->request->getPost('assigned_to')),
            'target_resolution_date'  => $this->request->getPost('target_resolution_date') ?: date('Y-m-d', strtotime('+3 days')),
            'status'                  => 'open',
            'evidence_notes'          => trim((string) $this->request->getPost('evidence_notes')),
            'corrective_action_taken' => null,
            'verified_by'             => null,
        ];

        $defectId = $this->defectModel->insert($data);

        $this->auditLogModel->log('CREATE_FACILITY_DEFECT', 'FACILITY', $hospitalId, $userId, 'facility_rounds_defects', $defectId, null, $data);

        return redirect()->to('/equipment#tab-facility')->with('message', 'Facility safety deficiency successfully logged and assigned.');
    }

    /**
     * Update Defect Resolution Status
     */
    public function updateDefectStatus()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;
        $userName   = session()->get('user_name') ?? 'Quality Auditor';

        $defectId   = (int) $this->request->getPost('defect_id');
        $status     = (string) $this->request->getPost('status');
        $action     = trim((string) $this->request->getPost('corrective_action_taken'));

        $updateData = [
            'status'                  => $status,
            'corrective_action_taken' => $action,
        ];

        if (in_array($status, ['resolved', 'closed'], true)) {
            $updateData['resolution_date'] = date('Y-m-d');
            $updateData['verified_by']     = $userName;
        }

        $this->defectModel->update($defectId, $updateData);

        $this->auditLogModel->log('UPDATE_FACILITY_DEFECT', 'FACILITY', $hospitalId, $userId, 'facility_rounds_defects', $defectId, null, $updateData);

        return redirect()->to('/equipment#tab-facility')->with('message', 'Facility defect resolution updated successfully.');
    }

    /**
     * Update Equipment Operational Status (e.g. Out of Order, Under Maintenance)
     */
    public function updateStatus()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $equipmentId = (int) $this->request->getPost('equipment_id');
        $newStatus   = (string) $this->request->getPost('status');
        $downtime    = (int) $this->request->getPost('breakdown_downtime_hours');

        $updateData = ['status' => $newStatus];
        if ($newStatus === 'out_of_order' || $newStatus === 'under_maintenance') {
            $updateData['last_breakdown_at'] = date('Y-m-d H:i:s');
            if ($downtime > 0) {
                $updateData['breakdown_downtime_hours'] = $downtime;
            }
        }

        $this->equipmentModel->update($equipmentId, $updateData);

        $this->auditLogModel->log('UPDATE_EQUIPMENT_STATUS', 'EQUIPMENT', $hospitalId, $userId, 'equipment', $equipmentId, null, $updateData);

        return redirect()->to('/equipment')->with('message', "Equipment status updated to '{$newStatus}'.");
    }

    /**
     * Record PPM (Preventive Maintenance) Completion
     */
    public function recordPpm()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $equipmentId = (int) $this->request->getPost('equipment_id');
        $months      = (int) ($this->request->getPost('ppm_frequency_months') ?: 6);

        $today = date('Y-m-d');
        $nextDate = date('Y-m-d', strtotime("+{$months} months"));

        $this->equipmentModel->update($equipmentId, [
            'current_ppm_date'     => $today,
            'next_ppm_date'        => $nextDate,
            'ppm_frequency_months' => $months,
            'status'               => 'active',
        ]);

        $this->maintenanceModel->insert([
            'equipment_id' => $equipmentId,
            'type'         => 'preventive',
            'date'         => $today,
            'description'  => 'Periodic preventive maintenance (PPM) completed per NABH checklist. All safety tests passed.',
            'performed_by' => session()->get('user_name') ?? 'Biomedical Engineer',
            'status'       => 'completed',
        ]);

        $this->auditLogModel->log('RECORD_PPM', 'EQUIPMENT', $hospitalId, $userId, 'equipment', $equipmentId, null, ['ppm_date' => $today]);

        return redirect()->to('/equipment')->with('message', 'Preventive Maintenance logged. Next PPM scheduled for ' . $nextDate . '.');
    }

    /**
     * Submit Equipment Condemnation Request
     */
    public function requestCondemnation()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;
        $userName   = session()->get('user_name') ?? 'Biomedical Head';

        $equipmentId = (int) $this->request->getPost('equipment_id');
        $reason      = trim((string) $this->request->getPost('request_reason'));
        $techNotes   = trim((string) $this->request->getPost('technical_notes'));
        $repairEst   = (float) $this->request->getPost('repair_estimate');
        $origCost    = (float) $this->request->getPost('original_cost');

        $condemnationData = [
            'hospital_id'           => $hospitalId,
            'equipment_id'          => $equipmentId,
            'requested_by'          => $userName,
            'request_reason'        => $reason,
            'technical_notes'       => $techNotes,
            'original_cost'         => $origCost,
            'repair_estimate'       => $repairEst,
            'committee_status'      => 'pending',
            'committee_reviewed_at' => null,
            'ms_status'             => 'pending',
            'ms_approved_at'        => null,
            'scrap_certificate_no'  => null,
        ];

        $condemId = $this->condemnationModel->insert($condemnationData);

        // Update equipment state
        $this->equipmentModel->update($equipmentId, [
            'condemnation_status' => 'requested',
            'status'              => 'out_of_order',
        ]);

        $this->auditLogModel->log('REQUEST_CONDEMNATION', 'EQUIPMENT', $hospitalId, $userId, 'equipment_condemnations', $condemId, null, $condemnationData);

        return redirect()->to('/equipment#tab-condemnation')->with('message', 'Equipment condemnation evaluation requested for Technical Committee.');
    }

    /**
     * Review / Approve Condemnation (Committee & Medical Superintendent Sign-off)
     */
    public function reviewCondemnation()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $condemId   = (int) $this->request->getPost('condemnation_id');
        $stage      = (string) $this->request->getPost('stage'); // 'committee' or 'ms'
        $decision   = (string) $this->request->getPost('decision'); // 'recommended', 'approved', 'rejected'

        $condem = $this->condemnationModel->find($condemId);
        if (! $condem) {
            return redirect()->to('/equipment#tab-condemnation')->with('error', 'Condemnation record not found.');
        }

        $updateData = [];

        if ($stage === 'committee') {
            $updateData['committee_status']      = $decision;
            $updateData['committee_reviewed_at'] = date('Y-m-d H:i:s');
        } elseif ($stage === 'ms') {
            $updateData['ms_status']     = $decision;
            $updateData['ms_approved_at'] = date('Y-m-d H:i:s');

            if ($decision === 'approved') {
                $certNo = 'NABH-SCRAP-' . date('Y') . '-' . str_pad($condemId, 4, '0', STR_PAD_LEFT);
                $updateData['scrap_certificate_no'] = $certNo;

                // Mark equipment condemned in main grid
                $this->equipmentModel->update($condem['equipment_id'], [
                    'condemnation_status' => 'approved',
                    'status'              => 'out_of_order',
                ]);
            }
        }

        $this->condemnationModel->update($condemId, $updateData);

        $this->auditLogModel->log('REVIEW_CONDEMNATION', 'EQUIPMENT', $hospitalId, $userId, 'equipment_condemnations', $condemId, null, $updateData);

        return redirect()->to('/equipment#tab-condemnation')->with('message', 'Condemnation stage updated successfully.');
    }
}

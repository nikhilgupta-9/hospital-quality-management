<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipmentModel extends Model
{
    protected $table            = 'equipment';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    protected $allowedFields = [
        'hospital_id', 'department_id', 'asset_no', 'name', 'category',
        'manufacturer', 'model', 'serial_no', 'purchase_date', 'install_date',
        'warranty_expiry', 'amc_cmc_expiry', 'status', 'service_agency',
        'breakdown_downtime_hours', 'last_breakdown_at', 'current_ppm_date',
        'next_ppm_date', 'ppm_frequency_months', 'condemnation_status'
    ];

    public function getWithDetails(int $hospitalId, ?int $departmentId = null, ?string $category = null, ?string $status = null)
    {
        $builder = $this->select('equipment.*, departments.name AS department_name, c.last_date AS last_calibration_date, c.next_date AS next_calibration_date, c.status AS calibration_status')
            ->join('departments', 'departments.id = equipment.department_id', 'left')
            ->join('calibrations c', 'c.equipment_id = equipment.id', 'left')
            ->where('equipment.hospital_id', $hospitalId);

        if ($departmentId !== null) {
            $builder->where('equipment.department_id', $departmentId);
        }
        if ($category !== null) {
            $builder->where('equipment.category', $category);
        }
        if ($status !== null) {
            $builder->where('equipment.status', $status);
        }

        return $builder->orderBy('equipment.id', 'DESC')->findAll();
    }
}

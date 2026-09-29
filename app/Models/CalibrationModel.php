<?php

namespace App\Models;

use CodeIgniter\Model;

class CalibrationModel extends Model
{
    protected $table            = 'calibrations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'equipment_id', 'last_date', 'next_date', 'agency', 'certificate_path', 'status'
    ];

    public function getDueSoon(int $hospitalId, int $days = 30)
    {
        $targetDate = date('Y-m-d', strtotime("+{$days} days"));
        return $this->select('calibrations.*, equipment.name AS equipment_name, equipment.asset_no, departments.name AS department_name')
            ->join('equipment', 'equipment.id = calibrations.equipment_id')
            ->join('departments', 'departments.id = equipment.department_id')
            ->where('equipment.hospital_id', $hospitalId)
            ->where('calibrations.next_date <=', $targetDate)
            ->orderBy('calibrations.next_date', 'ASC')
            ->findAll();
    }
}

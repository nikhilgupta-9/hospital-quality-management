<?php

namespace App\Models;

use CodeIgniter\Model;

class MaintenanceLogModel extends Model
{
    protected $table            = 'maintenance_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'equipment_id', 'maintenance_date', 'service_type', 'engineer',
        'fault_description', 'action_taken', 'spare_parts', 'report_path', 'next_due_date'
    ];

    public function getLogs(int $hospitalId, ?int $equipmentId = null)
    {
        $builder = $this->select('maintenance_logs.*, equipment.name AS equipment_name, equipment.asset_no, departments.name AS department_name')
            ->join('equipment', 'equipment.id = maintenance_logs.equipment_id')
            ->join('departments', 'departments.id = equipment.department_id')
            ->where('equipment.hospital_id', $hospitalId);

        if ($equipmentId !== null) {
            $builder->where('maintenance_logs.equipment_id', $equipmentId);
        }

        return $builder->orderBy('maintenance_logs.maintenance_date', 'DESC')->findAll();
    }
}

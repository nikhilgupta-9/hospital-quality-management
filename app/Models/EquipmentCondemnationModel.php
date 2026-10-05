<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipmentCondemnationModel extends Model
{
    protected $table            = 'equipment_condemnations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'equipment_id', 'requested_by', 'request_reason',
        'technical_notes', 'original_cost', 'repair_estimate',
        'committee_status', 'committee_reviewed_at', 'ms_status',
        'ms_approved_at', 'scrap_certificate_no',
    ];

    protected $validationRules = [
        'hospital_id'    => 'required|is_natural_no_zero',
        'equipment_id'   => 'required|is_natural_no_zero',
        'requested_by'   => 'required|min_length[2]|max_length[191]',
        'request_reason' => 'required|min_length[5]',
    ];

    /**
     * Get condemnations with equipment and department details
     */
    public function getForHospital(int $hospitalId): array
    {
        return $this->select('equipment_condemnations.*, equipment.name AS equipment_name, equipment.asset_no, equipment.category AS equipment_category, equipment.model, equipment.manufacturer, departments.name AS department_name')
            ->join('equipment', 'equipment.id = equipment_condemnations.equipment_id')
            ->join('departments', 'departments.id = equipment.department_id', 'left')
            ->where('equipment_condemnations.hospital_id', $hospitalId)
            ->orderBy('equipment_condemnations.id', 'DESC')
            ->findAll();
    }
}

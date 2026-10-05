<?php

namespace App\Models;

use CodeIgniter\Model;

class FacilityRoundDefectModel extends Model
{
    protected $table            = 'facility_rounds_defects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'department_id', 'round_date', 'inspector_name',
        'location_area', 'defect_category', 'description', 'severity',
        'assigned_to', 'target_resolution_date', 'resolution_date',
        'status', 'corrective_action_taken', 'evidence_notes', 'verified_by',
    ];

    protected $validationRules = [
        'hospital_id'     => 'required|is_natural_no_zero',
        'round_date'      => 'required|valid_date',
        'location_area'   => 'required|min_length[2]|max_length[191]',
        'defect_category' => 'required',
        'description'     => 'required|min_length[5]',
        'severity'        => 'required|in_list[critical,high,medium,low]',
    ];

    /**
     * Get facility defects with department names
     */
    public function getForHospital(int $hospitalId, ?int $deptId = null): array
    {
        $builder = $this->select('facility_rounds_defects.*, departments.name AS department_name')
            ->join('departments', 'departments.id = facility_rounds_defects.department_id', 'left')
            ->where('facility_rounds_defects.hospital_id', $hospitalId);

        if ($deptId !== null) {
            $builder->where('facility_rounds_defects.department_id', $deptId);
        }

        return $builder->orderBy('facility_rounds_defects.id', 'DESC')->findAll();
    }

    /**
     * Get summary metrics for facility dashboard
     */
    public function getFacilityMetrics(int $hospitalId): array
    {
        $all = $this->where('hospital_id', $hospitalId)->findAll();
        $total     = count($all);
        $open      = 0;
        $critical  = 0;
        $resolved  = 0;

        foreach ($all as $item) {
            if ($item['status'] === 'open' || $item['status'] === 'in_progress') {
                $open++;
            }
            if ($item['severity'] === 'critical') {
                $critical++;
            }
            if ($item['status'] === 'resolved' || $item['status'] === 'closed') {
                $resolved++;
            }
        }

        return [
            'total_rounds_defects' => $total,
            'open_defects'         => $open,
            'critical_defects'     => $critical,
            'resolved_defects'     => $resolved,
            'resolution_rate'      => $total > 0 ? round(($resolved / $total) * 100, 1) : 100,
        ];
    }
}

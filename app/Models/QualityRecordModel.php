<?php

namespace App\Models;

use CodeIgniter\Model;

class QualityRecordModel extends Model
{
    protected $table            = 'quality_records';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'department_id', 'type', 'recorded_date', 'value_json', 'recorded_by'
    ];

    public function getRecords(int $hospitalId, ?string $type = null)
    {
        $builder = $this->select('quality_records.*, departments.name AS department_name, users.name AS recorded_by_name')
            ->join('departments', 'departments.id = quality_records.department_id', 'left')
            ->join('users', 'users.id = quality_records.recorded_by', 'left')
            ->where('quality_records.hospital_id', $hospitalId);

        if ($type !== null) {
            $builder->where('quality_records.type', $type);
        }

        return $builder->orderBy('quality_records.recorded_date', 'DESC')->findAll();
    }
}

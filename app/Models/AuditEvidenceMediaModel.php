<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditEvidenceMediaModel extends Model
{
    protected $table            = 'audit_evidence_media';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'hospital_id',
        'category',
        'title',
        'department_name',
        'media_type',
        'file_path',
        'geo_location',
        'capture_date',
        'auditor_verified',
        'remarks',
    ];

    public function getEvidenceForHospital(int $hospitalId, ?string $category = null): array
    {
        $builder = $this->where('hospital_id', $hospitalId);
        if ($category !== null && $category !== 'all') {
            $builder->where('category', $category);
        }
        return $builder->orderBy('capture_date', 'DESC')->findAll();
    }
}

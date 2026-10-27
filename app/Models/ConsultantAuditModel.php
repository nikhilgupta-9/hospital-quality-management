<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultantAuditModel extends Model
{
    protected $table            = 'consultant_audits';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'hospital_id',
        'audit_title',
        'audit_type',
        'lead_auditor_name',
        'audit_date',
        'major_nc_count',
        'minor_nc_count',
        'ofi_count',
        'overall_score',
        'status',
        'summary_notes',
    ];

    public function getAuditsForHospital(int $hospitalId): array
    {
        return $this->where('hospital_id', $hospitalId)
                    ->orderBy('audit_date', 'DESC')
                    ->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditInstanceModel extends Model
{
    protected $table            = 'audit_instances';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'checklist_id', 'target_type', 'target_id', 'conducted_by', 'conducted_date', 'status'
    ];

    public function getWithDetails(int $hospitalId)
    {
        return $this->select('audit_instances.*, ac.name AS checklist_name, ac.applies_to, users.name AS conducted_by_name')
            ->join('audit_checklists ac', 'ac.id = audit_instances.checklist_id')
            ->join('users', 'users.id = audit_instances.conducted_by', 'left')
            ->where('ac.hospital_id', $hospitalId)
            ->orderBy('audit_instances.conducted_date', 'DESC')
            ->findAll();
    }
}

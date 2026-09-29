<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $table            = 'documents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    protected $allowedFields = [
        'hospital_id', 'department_id', 'category', 'title', 'doc_number',
        'owner_id', 'approver_id', 'issue_date', 'review_date', 'expiry_date',
        'status', 'current_version_id'
    ];

    public function getWithDetails(int $hospitalId, ?int $departmentId = null, ?string $status = null, ?string $category = null)
    {
        $builder = $this->select('documents.*, departments.name AS department_name, users.name AS owner_name, approvers.name AS approver_name, dv.version_no, dv.file_path, dv.change_note')
            ->join('departments', 'departments.id = documents.department_id', 'left')
            ->join('users', 'users.id = documents.owner_id', 'left')
            ->join('users approvers', 'approvers.id = documents.approver_id', 'left')
            ->join('document_versions dv', 'dv.id = documents.current_version_id', 'left')
            ->where('documents.hospital_id', $hospitalId);

        if ($departmentId !== null) {
            $builder->where('documents.department_id', $departmentId);
        }
        if ($status !== null) {
            $builder->where('documents.status', $status);
        }
        if ($category !== null) {
            $builder->where('documents.category', $category);
        }

        return $builder->orderBy('documents.id', 'DESC')->findAll();
    }

    public function getExpiringSoon(int $hospitalId, int $days = 30)
    {
        $targetDate = date('Y-m-d', strtotime("+{$days} days"));
        return $this->select('documents.*, departments.name AS department_name')
            ->join('departments', 'departments.id = documents.department_id', 'left')
            ->where('documents.hospital_id', $hospitalId)
            ->where('documents.expiry_date <=', $targetDate)
            ->where('documents.expiry_date >=', date('Y-m-d'))
            ->orderBy('documents.expiry_date', 'ASC')
            ->findAll();
    }
}

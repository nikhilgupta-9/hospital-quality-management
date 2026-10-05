<?php

namespace App\Models;

use CodeIgniter\Model;

class CredentialingModel extends Model
{
    protected $table            = 'credentialing';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'staff_id', 'procedure', 'privilege_type', 'status', 'committee_status',
        'verified_by', 'committee_reviewed_at', 'ms_approved_at', 'valid_until', 'notes'
    ];

    public function getWithDetails(int $hospitalId, ?string $status = null)
    {
        $builder = $this->select('credentialing.*, staff.name AS staff_name, staff.employee_code, staff.designation, departments.name AS department_name, users.name AS verified_by_name')
            ->join('staff', 'staff.id = credentialing.staff_id')
            ->join('departments', 'departments.id = staff.department_id')
            ->join('users', 'users.id = credentialing.verified_by', 'left')
            ->where('staff.hospital_id', $hospitalId);

        if ($status !== null) {
            $builder->where('credentialing.status', $status);
        }

        return $builder->orderBy('credentialing.valid_until', 'ASC')->findAll();
    }
}

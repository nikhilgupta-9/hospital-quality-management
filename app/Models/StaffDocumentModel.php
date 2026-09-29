<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffDocumentModel extends Model
{
    protected $table            = 'staff_documents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'staff_id', 'doc_type', 'file_path', 'issue_date', 'expiry_date', 'status'
    ];

    public function getExpiring(int $hospitalId, int $days = 30)
    {
        $targetDate = date('Y-m-d', strtotime("+{$days} days"));
        return $this->select('staff_documents.*, staff.name AS staff_name, staff.employee_code, departments.name AS department_name')
            ->join('staff', 'staff.id = staff_documents.staff_id')
            ->join('departments', 'departments.id = staff.department_id')
            ->where('staff.hospital_id', $hospitalId)
            ->where('staff_documents.expiry_date <=', $targetDate)
            ->where('staff_documents.expiry_date >=', date('Y-m-d'))
            ->orderBy('staff_documents.expiry_date', 'ASC')
            ->findAll();
    }
}

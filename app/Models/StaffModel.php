<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table            = 'staff';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    protected $allowedFields = [
        'hospital_id', 'department_id', 'user_id', 'employee_code', 'name',
        'designation', 'qualification', 'joining_date', 'experience_years', 'contact'
    ];

    public function getWithDetails(int $hospitalId, ?int $departmentId = null)
    {
        $builder = $this->select('staff.*, departments.name AS department_name, users.email AS user_email')
            ->join('departments', 'departments.id = staff.department_id', 'left')
            ->join('users', 'users.id = staff.user_id', 'left')
            ->where('staff.hospital_id', $hospitalId);

        if ($departmentId !== null) {
            $builder->where('staff.department_id', $departmentId);
        }

        return $builder->orderBy('staff.id', 'DESC')->findAll();
    }
}

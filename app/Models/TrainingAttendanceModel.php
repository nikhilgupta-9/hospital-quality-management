<?php

namespace App\Models;

use CodeIgniter\Model;

class TrainingAttendanceModel extends Model
{
    protected $table            = 'training_attendance';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'training_id', 'staff_id', 'attended', 'score', 'certificate_path'
    ];

    public function getByTraining(int $trainingId)
    {
        return $this->select('training_attendance.*, staff.name AS staff_name, staff.employee_code, departments.name AS department_name')
            ->join('staff', 'staff.id = training_attendance.staff_id')
            ->join('departments', 'departments.id = staff.department_id')
            ->where('training_attendance.training_id', $trainingId)
            ->findAll();
    }
}

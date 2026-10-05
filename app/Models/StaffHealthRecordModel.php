<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffHealthRecordModel extends Model
{
    protected $table            = 'staff_health_records';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'staff_id', 'hepb_dose1_date', 'hepb_dose2_date', 'hepb_dose3_date',
        'hepb_booster_date', 'hepb_status', 'anti_hbs_titer', 'tt_vaccine_date',
        'annual_checkup_date', 'fitness_status', 'medical_officer_name',
        'health_remarks'
    ];

    public function getByStaffId(int $staffId)
    {
        return $this->where('staff_id', $staffId)->first();
    }

    public function getHospitalHealthRoster(int $hospitalId)
    {
        return $this->select('staff_health_records.*, staff.name AS staff_name, staff.employee_code, staff.designation, departments.name AS department_name')
            ->join('staff', 'staff.id = staff_health_records.staff_id')
            ->join('departments', 'departments.id = staff.department_id', 'left')
            ->where('staff.hospital_id', $hospitalId)
            ->findAll();
    }
}

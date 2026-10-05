<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpiryAlertLogModel extends Model
{
    protected $table            = 'expiry_alert_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'staff_id', 'alert_type', 'days_threshold', 'expiry_date',
        'sent_channel', 'status', 'details'
    ];

    public function getRecentAlerts(int $hospitalId, int $limit = 20)
    {
        return $this->select('expiry_alert_logs.*, staff.name AS staff_name, staff.employee_code, staff.designation, departments.name AS department_name')
            ->join('staff', 'staff.id = expiry_alert_logs.staff_id')
            ->join('departments', 'departments.id = staff.department_id', 'left')
            ->where('staff.hospital_id', $hospitalId)
            ->orderBy('expiry_alert_logs.id', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditLogModel extends Model
{
    protected $table            = 'audit_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'user_id', 'hospital_id', 'action', 'module', 'record_type',
        'record_id', 'old_value_json', 'new_value_json', 'ip_address', 'created_at'
    ];

    public function log(string $action, string $module, ?int $hospitalId = null, ?int $userId = null, ?string $recordType = null, ?int $recordId = null, $oldVal = null, $newVal = null)
    {
        return $this->insert([
            'user_id' => $userId ?? (session()->get('user_id') ?? null),
            'hospital_id' => $hospitalId ?? (session()->get('hospital_id') ?? null),
            'action' => $action,
            'module' => $module,
            'record_type' => $recordType,
            'record_id' => $recordId,
            'old_value_json' => $oldVal ? json_encode($oldVal) : null,
            'new_value_json' => $newVal ? json_encode($newVal) : null,
            'ip_address' => service('request')->getIPAddress(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function getLogs(?int $hospitalId = null, int $limit = 100)
    {
        $builder = $this->select('audit_logs.*, users.name AS user_name, hospitals.name AS hospital_name')
            ->join('users', 'users.id = audit_logs.user_id', 'left')
            ->join('hospitals', 'hospitals.id = audit_logs.hospital_id', 'left');

        if ($hospitalId !== null) {
            $builder->where('audit_logs.hospital_id', $hospitalId);
        }

        return $builder->orderBy('audit_logs.id', 'DESC')->findAll($limit);
    }
}

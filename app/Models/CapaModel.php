<?php

namespace App\Models;

use CodeIgniter\Model;

class CapaModel extends Model
{
    protected $table            = 'capa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'source_type', 'source_id', 'finding', 'responsible_user_id',
        'due_date', 'evidence_path', 'status', 'closed_at'
    ];

    public function getWithDetails(int $hospitalId, ?string $status = null)
    {
        $builder = $this->select('capa.*, users.name AS responsible_user_name')
            ->join('users', 'users.id = capa.responsible_user_id', 'left')
            ->where('capa.hospital_id', $hospitalId);

        if ($status !== null) {
            $builder->where('capa.status', $status);
        }

        return $builder->orderBy('capa.due_date', 'ASC')->findAll();
    }
}

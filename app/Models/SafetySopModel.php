<?php

namespace App\Models;

use CodeIgniter\Model;

class SafetySopModel extends Model
{
    protected $table            = 'safety_sops';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'code_type', 'title', 'category', 'sop_number',
        'version', 'summary', 'action_steps', 'contact_extension',
        'file_path', 'is_active',
    ];

    /**
     * Get all active safety SOPs for hospital
     */
    public function getActiveSops(int $hospitalId): array
    {
        return $this->where('hospital_id', $hospitalId)
            ->where('is_active', 1)
            ->orderBy('code_type', 'ASC')
            ->findAll();
    }
}

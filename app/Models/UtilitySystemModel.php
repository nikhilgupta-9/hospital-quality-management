<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilitySystemModel extends Model
{
    protected $table            = 'utility_systems';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'type', 'name', 'location', 'install_date'
    ];

    public function getByHospital(int $hospitalId)
    {
        return $this->where('hospital_id', $hospitalId)
            ->orderBy('type', 'ASC')
            ->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table            = 'departments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['hospital_id', 'name', 'code'];

    public function forHospital(int $hospitalId): array
    {
        return $this->where('hospital_id', $hospitalId)->orderBy('name', 'ASC')->findAll();
    }
}

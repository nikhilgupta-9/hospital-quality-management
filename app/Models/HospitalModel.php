<?php

namespace App\Models;

use CodeIgniter\Model;

class HospitalModel extends Model
{
    protected $table            = 'hospitals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['parent_id', 'name', 'code', 'address', 'license_expiry', 'status'];

    /**
     * Branches belonging to a given hospital (self-referencing parent_id).
     */
    public function branchesOf(int $hospitalId): array
    {
        return $this->where('parent_id', $hospitalId)->findAll();
    }
}

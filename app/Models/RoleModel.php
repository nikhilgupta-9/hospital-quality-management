<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * The four portal roles: super_admin, hospital_admin, nabh_coordinator,
 * dept_user — see the NABH Portal Blueprint's RBAC matrix for what each
 * one can do.
 */
class RoleModel extends Model
{
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['name', 'slug'];
}

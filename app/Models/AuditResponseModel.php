<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditResponseModel extends Model
{
    protected $table            = 'audit_responses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'audit_instance_id', 'checklist_item_id', 'answer', 'remarks', 'photo_path'
    ];
}

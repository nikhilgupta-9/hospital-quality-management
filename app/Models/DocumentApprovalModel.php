<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentApprovalModel extends Model
{
    protected $table            = 'document_approvals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'document_version_id', 'approver_id', 'status', 'comments', 'decided_at'
    ];
}

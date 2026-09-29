<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentVersionModel extends Model
{
    protected $table            = 'document_versions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'document_id', 'version_no', 'file_path', 'change_note',
        'uploaded_by', 'uploaded_at', 'created_at'
    ];
}

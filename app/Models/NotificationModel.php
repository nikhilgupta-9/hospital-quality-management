<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table            = 'notifications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'user_id', 'hospital_id', 'type', 'channel', 'related_type',
        'related_id', 'title', 'message', 'sent_at', 'read_at'
    ];

    public function getUnread(int $userId)
    {
        return $this->where('user_id', $userId)
            ->where('read_at', null)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}

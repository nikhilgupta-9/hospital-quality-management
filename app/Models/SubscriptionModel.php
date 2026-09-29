<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model
{
    protected $table            = 'subscriptions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'plan', 'max_users', 'features_json', 'expiry_date'
    ];

    public function getWithHospital()
    {
        return $this->select('subscriptions.*, hospitals.name AS hospital_name, hospitals.code AS hospital_code')
            ->join('hospitals', 'hospitals.id = subscriptions.hospital_id')
            ->orderBy('subscriptions.expiry_date', 'ASC')
            ->findAll();
    }
}

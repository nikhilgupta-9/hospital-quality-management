<?php

namespace App\Models;

use CodeIgniter\Model;

class PricingPlanModel extends Model
{
    protected $table            = 'pricing_plans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'name',
        'slug',
        'tagline',
        'badge_text',
        'bed_capacity',
        'price_monthly',
        'price_yearly',
        'currency',
        'billing_period',
        'max_users',
        'features_list',
        'is_popular',
        'is_active',
        'sort_order',
        'cta_text',
        'cta_url',
    ];

    /**
     * Get all active pricing plans for public view ordered by sort_order
     */
    public function getActivePlans()
    {
        return $this->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();
    }

    /**
     * Get all plans for Admin CRUD
     */
    public function getAllAdminPlans()
    {
        return $this->orderBy('sort_order', 'ASC')
            ->findAll();
    }
}

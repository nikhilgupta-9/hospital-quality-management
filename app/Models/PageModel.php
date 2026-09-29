<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table            = 'site_pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'slug',
        'title',
        'subtitle',
        'content',
        'meta_title',
        'meta_description',
    ];

    /**
     * Get page by slug or return null
     */
    public function getBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)->first();
    }
}

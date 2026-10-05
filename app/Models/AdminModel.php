<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    protected $allowedFields = [
        'hospital_id', 'department_id', 'role_id',
        'name', 'email', 'password_hash', 'status', 'last_login_at',
    ];

    protected $validationRules = [
        'name'  => 'required|min_length[2]|max_length[191]',
        'email' => 'required|valid_email|max_length[191]|is_unique[users.email,id,{id}]',
    ];

    /**
     * Allowed Admin Role Slugs strictly segregated from staff
     */
    protected array $adminRoles = ['super_admin', 'hospital_admin'];

    /**
     * Find an active administrator by email.
     * Enforces strict role filtering — staff users can NEVER be returned by this query.
     */
    public function findActiveAdminByEmail(string $email): ?array
    {
        return $this->select('users.*, roles.slug AS role_slug, roles.name AS role_name, hospitals.name AS hospital_name')
            ->join('roles', 'roles.id = users.role_id')
            ->join('hospitals', 'hospitals.id = users.hospital_id', 'left')
            ->where('users.email', $email)
            ->where('users.status', 'active')
            ->whereIn('roles.slug', $this->adminRoles)
            ->first();
    }

    /**
     * Get admin by ID with role verification
     */
    public function findAdminById(int $id): ?array
    {
        return $this->select('users.*, roles.slug AS role_slug, roles.name AS role_name, hospitals.name AS hospital_name')
            ->join('roles', 'roles.id = users.role_id')
            ->join('hospitals', 'hospitals.id = users.hospital_id', 'left')
            ->where('users.id', $id)
            ->whereIn('roles.slug', $this->adminRoles)
            ->first();
    }

    /**
     * Hash a plaintext password
     */
    public function hashPassword(string $plain): string
    {
        return password_hash($plain, PASSWORD_DEFAULT);
    }

    /**
     * Verify password hash
     */
    public function verifyPassword(string $plain, string $hash): bool
    {
        return password_verify($plain, $hash);
    }

    /**
     * Update last login timestamp
     */
    public function touchLastLogin(int $userId): void
    {
        $this->update($userId, ['last_login_at' => date('Y-m-d H:i:s')]);
    }
}

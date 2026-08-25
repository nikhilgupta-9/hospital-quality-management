<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
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
     * Find an active user by email, with their role slug joined in —
     * everything RoleFilter and the login flow need in one query.
     */
    public function findActiveByEmail(string $email): ?array
    {
        return $this->select('users.*, roles.slug AS role_slug, roles.name AS role_name')
            ->join('roles', 'roles.id = users.role_id')
            ->where('users.email', $email)
            ->where('users.status', 'active')
            ->first();
    }

    public function withRole(int $userId): ?array
    {
        return $this->select('users.*, roles.slug AS role_slug, roles.name AS role_name')
            ->join('roles', 'roles.id = users.role_id')
            ->where('users.id', $userId)
            ->first();
    }

    /**
     * Hash a plaintext password the same way everywhere it's set —
     * during seeding, self-registration (once that exists), or a
     * password reset flow.
     */
    public function hashPassword(string $plain): string
    {
        return password_hash($plain, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $plain, string $hash): bool
    {
        return password_verify($plain, $hash);
    }

    public function touchLastLogin(int $userId): void
    {
        $this->update($userId, ['last_login_at' => date('Y-m-d H:i:s')]);
    }
}

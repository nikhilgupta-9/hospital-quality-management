<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffUserModel extends Model
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
        'name'          => 'required|min_length[2]|max_length[191]',
        'email'         => 'required|valid_email|max_length[191]|is_unique[users.email,id,{id}]',
        'hospital_id'   => 'required|is_natural_no_zero',
        'department_id' => 'required|is_natural_no_zero',
    ];

    /**
     * Staff & Clinical Roles (Administrative roles are strictly forbidden here)
     */
    protected array $staffRoles = ['nabh_coordinator', 'dept_user', 'doctor', 'nurse', 'auditor'];

    /**
     * Find an active staff / departmental user by email.
     * Guarantees super_admin accounts cannot be authenticated via the Staff model.
     */
    public function findActiveStaffByEmail(string $email): ?array
    {
        return $this->select('users.*, roles.slug AS role_slug, roles.name AS role_name, hospitals.name AS hospital_name, departments.name AS department_name')
            ->join('roles', 'roles.id = users.role_id')
            ->join('hospitals', 'hospitals.id = users.hospital_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->where('users.email', $email)
            ->where('users.status', 'active')
            ->whereIn('roles.slug', $this->staffRoles)
            ->first();
    }

    /**
     * Check if email belongs to an administrative account (for helpful redirect hints)
     */
    public function isEmailAdminAccount(string $email): bool
    {
        $user = $this->select('roles.slug')
            ->join('roles', 'roles.id = users.role_id')
            ->where('users.email', $email)
            ->whereIn('roles.slug', ['super_admin', 'hospital_admin'])
            ->first();

        return ! empty($user);
    }

    /**
     * Get staff by ID with complete hospital and department data
     */
    public function findStaffById(int $id): ?array
    {
        return $this->select('users.*, roles.slug AS role_slug, roles.name AS role_name, hospitals.name AS hospital_name, departments.name AS department_name')
            ->join('roles', 'roles.id = users.role_id')
            ->join('hospitals', 'hospitals.id = users.hospital_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->where('users.id', $id)
            ->whereIn('roles.slug', $this->staffRoles)
            ->first();
    }

    /**
     * Retrieve all active hospitals for registration dropdown
     */
    public function getActiveHospitals(): array
    {
        $db = \Config\Database::connect();
        return $db->table('hospitals')
            ->select('id, name, code')
            ->where('status', 'active')
            ->orderBy('name', 'ASC')
            ->get()
            ->getResultArray();
    }

    /**
     * Retrieve all departments for a given hospital
     */
    public function getDepartmentsByHospital(int $hospitalId): array
    {
        $db = \Config\Database::connect();
        return $db->table('departments')
            ->select('id, name, code')
            ->where('hospital_id', $hospitalId)
            ->orderBy('name', 'ASC')
            ->get()
            ->getResultArray();
    }

    /**
     * Retrieve default role ID for new staff registrations (dept_user)
     */
    public function getDefaultStaffRoleId(): int
    {
        $db = \Config\Database::connect();
        $role = $db->table('roles')->where('slug', 'dept_user')->get()->getRowArray();
        return $role ? (int) $role['id'] : 4;
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

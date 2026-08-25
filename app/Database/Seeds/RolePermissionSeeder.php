<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Grants matching the RBAC matrix in the Blueprint (§03).
 */
class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $grants = [
            'super_admin' => [
                'hospital.manage', 'subscription.manage', 'department.manage',
                'report.export', 'audit_log.view',
            ],
            'hospital_admin' => [
                'department.manage', 'document.view', 'hr.view', 'equipment.view',
                'budget.approve', 'report.export', 'audit_log.view',
            ],
            'nabh_coordinator' => [
                'department.view', 'document.edit', 'document.approve',
                'hr.manage', 'training.manage', 'equipment.manage', 'maintenance.manage',
                'capa.manage', 'budget.request', 'report.export', 'audit_log.view',
            ],
            'dept_user' => [
                'document.edit', 'hr.view', 'equipment.view', 'maintenance.manage', 'capa.submit',
            ],
        ];

        $roles       = $this->db->table('roles')->get()->getResultArray();
        $permissions = $this->db->table('permissions')->get()->getResultArray();

        $roleIdBySlug = array_column($roles, 'id', 'slug');
        $permIdByKey  = [];
        foreach ($permissions as $p) {
            $permIdByKey[$p['module'] . '.' . $p['action']] = $p['id'];
        }

        foreach ($grants as $slug => $permKeys) {
            $roleId = $roleIdBySlug[$slug] ?? null;
            if (! $roleId) {
                continue;
            }

            foreach ($permKeys as $key) {
                $permId = $permIdByKey[$key] ?? null;
                if (! $permId) {
                    continue;
                }

                $exists = $this->db->table('role_permissions')
                    ->where('role_id', $roleId)
                    ->where('permission_id', $permId)
                    ->get()->getRow();

                if (! $exists) {
                    $this->db->table('role_permissions')->insert([
                        'role_id'       => $roleId,
                        'permission_id' => $permId,
                    ]);
                }
            }
        }
    }
}

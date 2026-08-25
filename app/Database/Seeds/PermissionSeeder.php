<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Module.action permissions backing the RBAC matrix in the Blueprint (§03).
 * Granting a role a permission here means "this role's routes for this
 * module are reachable" — the Full vs. View vs. Own-Dept distinction within
 * a reachable module is enforced in the controller/model layer, not here.
 */
class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['module' => 'hospital',     'action' => 'manage'],
            ['module' => 'subscription', 'action' => 'manage'],
            ['module' => 'department',   'action' => 'manage'],
            ['module' => 'department',   'action' => 'view'],
            ['module' => 'document',     'action' => 'edit'],
            ['module' => 'document',     'action' => 'approve'],
            ['module' => 'document',     'action' => 'view'],
            ['module' => 'hr',           'action' => 'manage'],
            ['module' => 'hr',           'action' => 'view'],
            ['module' => 'training',     'action' => 'manage'],
            ['module' => 'equipment',    'action' => 'manage'],
            ['module' => 'equipment',    'action' => 'view'],
            ['module' => 'maintenance',  'action' => 'manage'],
            ['module' => 'capa',         'action' => 'manage'],
            ['module' => 'capa',         'action' => 'submit'],
            ['module' => 'budget',       'action' => 'approve'],
            ['module' => 'budget',       'action' => 'request'],
            ['module' => 'report',       'action' => 'export'],
            ['module' => 'audit_log',    'action' => 'view'],
        ];

        foreach ($permissions as $perm) {
            $exists = $this->db->table('permissions')
                ->where('module', $perm['module'])
                ->where('action', $perm['action'])
                ->get()->getRow();

            if (! $exists) {
                $perm['created_at'] = date('Y-m-d H:i:s');
                $perm['updated_at'] = date('Y-m-d H:i:s');
                $this->db->table('permissions')->insert($perm);
            }
        }
    }
}

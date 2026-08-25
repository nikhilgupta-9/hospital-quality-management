<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * The four roles in the access hierarchy — see the project overview's
 * Super Admin → Hospital Admin → NABH Coordinator chain, with
 * dept_user covering the "Dept / Staff User" row in the RBAC matrix.
 */
class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'Super Admin',      'slug' => 'super_admin'],
            ['name' => 'Hospital Admin',   'slug' => 'hospital_admin'],
            ['name' => 'NABH Coordinator', 'slug' => 'nabh_coordinator'],
            ['name' => 'Dept / Staff User', 'slug' => 'dept_user'],
        ];

        foreach ($roles as $role) {
            $exists = $this->db->table('roles')->where('slug', $role['slug'])->get()->getRow();

            if (! $exists) {
                $role['created_at'] = date('Y-m-d H:i:s');
                $role['updated_at'] = date('Y-m-d H:i:s');
                $this->db->table('roles')->insert($role);
            }
        }
    }
}

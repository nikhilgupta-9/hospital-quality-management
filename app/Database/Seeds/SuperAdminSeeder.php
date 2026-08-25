<?php

namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;

/**
 * Creates the first login so the portal isn't a locked box after
 * `php spark migrate` + `php spark db:seed DatabaseSeeder`.
 *
 * Override the default credentials by setting these in your .env before
 * seeding (recommended for anything beyond a first local run):
 *   SUPERADMIN_EMAIL    = you@yourhospitalgroup.com
 *   SUPERADMIN_PASSWORD = something-not-this
 */
class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        $email    = getenv('SUPERADMIN_EMAIL') ?: 'superadmin@example.com';
        $password = getenv('SUPERADMIN_PASSWORD') ?: 'ChangeMe!123';

        $existing = $this->db->table('users')->where('email', $email)->get()->getRow();
        if ($existing) {
            CLI::write('Super Admin already exists — skipping.', 'yellow');
            return;
        }

        $role = $this->db->table('roles')->where('slug', 'super_admin')->get()->getRow();
        if (! $role) {
            CLI::write('Run RoleSeeder before SuperAdminSeeder.', 'red');
            return;
        }

        $this->db->table('users')->insert([
            'hospital_id'   => null,
            'department_id' => null,
            'role_id'       => $role->id,
            'name'          => 'Super Admin',
            'email'         => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'status'        => 'active',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        CLI::write("Super Admin created: {$email} / {$password}", 'green');
        CLI::write('Sign in and change this password immediately on a real deployment.', 'yellow');
    }
}

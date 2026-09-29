<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Run everything in the right order with: php spark db:seed DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(ComprehensiveHospitalSeeder::class);
    }
}

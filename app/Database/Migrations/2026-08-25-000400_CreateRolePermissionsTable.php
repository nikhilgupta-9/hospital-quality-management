<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Core & Tenancy — role_permissions
 */
class CreateRolePermissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'role_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'permission_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['role_id', 'permission_id']);
        $this->forge->addForeignKey('role_id', 'roles', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'permissions', 'id', false, 'CASCADE');

        $this->forge->createTable('role_permissions', true);
    }

    public function down()
    {
        $this->forge->dropTable('role_permissions', true);
    }
}

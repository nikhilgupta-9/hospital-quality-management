<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Core & Tenancy — users
 */
class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'department_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'role_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'name' => ['type' => 'VARCHAR', 'constraint' => 191],
                'email' => ['type' => 'VARCHAR', 'constraint' => 191],
                'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'active'],
                'last_login_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('department_id');
        $this->forge->addKey('role_id');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'SET NULL');
        $this->forge->addForeignKey('department_id', 'departments', 'id', false, 'SET NULL');
        $this->forge->addForeignKey('role_id', 'roles', 'id', false, 'RESTRICT');

        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}

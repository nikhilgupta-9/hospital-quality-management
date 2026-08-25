<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Core & Tenancy — permissions
 */
class CreatePermissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'module' => ['type' => 'VARCHAR', 'constraint' => 100],
                'action' => ['type' => 'VARCHAR', 'constraint' => 100],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['module', 'action']);

        $this->forge->createTable('permissions', true);
    }

    public function down()
    {
        $this->forge->dropTable('permissions', true);
    }
}

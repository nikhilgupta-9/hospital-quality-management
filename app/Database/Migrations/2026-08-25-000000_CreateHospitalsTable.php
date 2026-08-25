<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Core & Tenancy — hospitals
 */
class CreateHospitalsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'parent_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'name' => ['type' => 'VARCHAR', 'constraint' => 191],
                'code' => ['type' => 'VARCHAR', 'constraint' => 50],
                'address' => ['type' => 'TEXT', 'null' => true],
                'license_expiry' => ['type' => 'DATE', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'active'],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('code');
        $this->forge->addKey('parent_id');

        $this->forge->createTable('hospitals', true);
    }

    public function down()
    {
        $this->forge->dropTable('hospitals', true);
    }
}

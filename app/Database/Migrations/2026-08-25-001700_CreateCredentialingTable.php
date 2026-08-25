<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * HR Panel — credentialing
 */
class CreateCredentialingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'staff_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'procedure' => ['type' => 'VARCHAR', 'constraint' => 191],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'credentialing'],
                'verified_by' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'valid_until' => ['type' => 'DATE', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('staff_id');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('staff_id', 'staff', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('verified_by', 'users', 'id', false, 'SET NULL');

        $this->forge->createTable('credentialing', true);
    }

    public function down()
    {
        $this->forge->dropTable('credentialing', true);
    }
}

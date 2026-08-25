<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — calibrations
 */
class CreateCalibrationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'equipment_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'last_date' => ['type' => 'DATE', 'null' => true],
                'next_date' => ['type' => 'DATE', 'null' => true],
                'agency' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'certificate_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'pending'],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('equipment_id');
        $this->forge->addKey('next_date');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('equipment_id', 'equipment', 'id', false, 'CASCADE');

        $this->forge->createTable('calibrations', true);
    }

    public function down()
    {
        $this->forge->dropTable('calibrations', true);
    }
}

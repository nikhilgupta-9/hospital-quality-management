<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — maintenance_logs
 */
class CreateMaintenanceLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'equipment_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'maintenance_date' => ['type' => 'DATE', 'null' => false],
                'service_type' => ['type' => 'VARCHAR', 'constraint' => 30],
                'engineer' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'fault_description' => ['type' => 'TEXT', 'null' => true],
                'action_taken' => ['type' => 'TEXT', 'null' => true],
                'spare_parts' => ['type' => 'TEXT', 'null' => true],
                'report_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'next_due_date' => ['type' => 'DATE', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('equipment_id');
        $this->forge->addKey('next_due_date');
        $this->forge->addForeignKey('equipment_id', 'equipment', 'id', false, 'CASCADE');

        $this->forge->createTable('maintenance_logs', true);
    }

    public function down()
    {
        $this->forge->dropTable('maintenance_logs', true);
    }
}

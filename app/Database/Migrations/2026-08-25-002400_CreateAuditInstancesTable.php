<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — audit_instances
 * NOTE: target_type/target_id is polymorphic (equipment, utility_systems) — no DB-level FK on target_id by design.
 */
class CreateAuditInstancesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'checklist_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'target_type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'target_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'conducted_by' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'conducted_date' => ['type' => 'DATE', 'null' => false],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'in_progress'],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('checklist_id');
        $this->forge->addKey('target_type');
        $this->forge->addKey('target_id');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('checklist_id', 'audit_checklists', 'id', false, 'RESTRICT');
        $this->forge->addForeignKey('conducted_by', 'users', 'id', false, 'SET NULL');

        $this->forge->createTable('audit_instances', true);
    }

    public function down()
    {
        $this->forge->dropTable('audit_instances', true);
    }
}

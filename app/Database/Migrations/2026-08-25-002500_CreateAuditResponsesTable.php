<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — audit_responses
 */
class CreateAuditResponsesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'audit_instance_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'checklist_item_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'answer' => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
                'remarks' => ['type' => 'TEXT', 'null' => true],
                'photo_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('audit_instance_id');
        $this->forge->addForeignKey('audit_instance_id', 'audit_instances', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('checklist_item_id', 'checklist_items', 'id', false, 'CASCADE');

        $this->forge->createTable('audit_responses', true);
    }

    public function down()
    {
        $this->forge->dropTable('audit_responses', true);
    }
}

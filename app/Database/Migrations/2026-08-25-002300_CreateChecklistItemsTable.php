<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — checklist_items
 */
class CreateChecklistItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'checklist_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'question' => ['type' => 'VARCHAR', 'constraint' => 255],
                'sort_order' => ['type' => 'INT', 'unsigned' => true, 'null' => false, 'default' => 0],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('checklist_id');
        $this->forge->addForeignKey('checklist_id', 'audit_checklists', 'id', false, 'CASCADE');

        $this->forge->createTable('checklist_items', true);
    }

    public function down()
    {
        $this->forge->dropTable('checklist_items', true);
    }
}

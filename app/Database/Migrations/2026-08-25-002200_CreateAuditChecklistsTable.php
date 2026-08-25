<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — audit_checklists
 */
class CreateAuditChecklistsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'name' => ['type' => 'VARCHAR', 'constraint' => 191],
                'applies_to' => ['type' => 'VARCHAR', 'constraint' => 50],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('applies_to');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');

        $this->forge->createTable('audit_checklists', true);
    }

    public function down()
    {
        $this->forge->dropTable('audit_checklists', true);
    }
}

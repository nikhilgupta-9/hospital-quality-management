<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Document Panel — document_approvals
 */
class CreateDocumentApprovalsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'document_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'version_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'action' => ['type' => 'VARCHAR', 'constraint' => 50],
                'actor_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'remarks' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('document_id');
        $this->forge->addForeignKey('document_id', 'documents', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('version_id', 'document_versions', 'id', false, 'SET NULL');
        $this->forge->addForeignKey('actor_id', 'users', 'id', false, 'RESTRICT');

        $this->forge->createTable('document_approvals', true);
    }

    public function down()
    {
        $this->forge->dropTable('document_approvals', true);
    }
}

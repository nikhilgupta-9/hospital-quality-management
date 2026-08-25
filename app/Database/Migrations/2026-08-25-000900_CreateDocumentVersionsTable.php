<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Document Panel — document_versions
 */
class CreateDocumentVersionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'document_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'version_no' => ['type' => 'VARCHAR', 'constraint' => 20],
                'file_path' => ['type' => 'VARCHAR', 'constraint' => 255],
                'uploaded_by' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'uploaded_at' => ['type' => 'DATETIME', 'null' => true],
                'change_note' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('document_id');
        $this->forge->addForeignKey('document_id', 'documents', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('uploaded_by', 'users', 'id', false, 'RESTRICT');

        $this->forge->createTable('document_versions', true);
    }

    public function down()
    {
        $this->forge->dropTable('document_versions', true);
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * HR Panel — staff_documents
 */
class CreateStaffDocumentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'staff_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'doc_type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'file_path' => ['type' => 'VARCHAR', 'constraint' => 255],
                'issue_date' => ['type' => 'DATE', 'null' => true],
                'expiry_date' => ['type' => 'DATE', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'valid'],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('staff_id');
        $this->forge->addKey('doc_type');
        $this->forge->addKey('expiry_date');
        $this->forge->addForeignKey('staff_id', 'staff', 'id', false, 'CASCADE');

        $this->forge->createTable('staff_documents', true);
    }

    public function down()
    {
        $this->forge->dropTable('staff_documents', true);
    }
}

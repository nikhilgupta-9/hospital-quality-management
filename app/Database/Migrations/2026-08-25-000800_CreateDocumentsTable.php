<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Document Panel — documents
 */
class CreateDocumentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'department_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'category' => ['type' => 'VARCHAR', 'constraint' => 100],
                'title' => ['type' => 'VARCHAR', 'constraint' => 255],
                'doc_number' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'owner_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'approver_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'issue_date' => ['type' => 'DATE', 'null' => true],
                'review_date' => ['type' => 'DATE', 'null' => true],
                'expiry_date' => ['type' => 'DATE', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'draft'],
                'current_version_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('department_id');
        $this->forge->addKey('status');
        $this->forge->addKey('expiry_date');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('department_id', 'departments', 'id', false, 'RESTRICT');
        $this->forge->addForeignKey('owner_id', 'users', 'id', false, 'SET NULL');
        $this->forge->addForeignKey('approver_id', 'users', 'id', false, 'SET NULL');

        $this->forge->createTable('documents', true);
    }

    public function down()
    {
        $this->forge->dropTable('documents', true);
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Document Panel — capa
 * NOTE: source_type/source_id is a polymorphic reference (documents, audit_instances, etc.) — no DB-level FK on source_id by design.
 */
class CreateCapaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'source_type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'source_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'finding' => ['type' => 'TEXT', 'null' => false],
                'responsible_user_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'due_date' => ['type' => 'DATE', 'null' => false],
                'evidence_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'open'],
                'closed_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('source_type');
        $this->forge->addKey('source_id');
        $this->forge->addKey('status');
        $this->forge->addKey('due_date');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('responsible_user_id', 'users', 'id', false, 'RESTRICT');

        $this->forge->createTable('capa', true);
    }

    public function down()
    {
        $this->forge->dropTable('capa', true);
    }
}

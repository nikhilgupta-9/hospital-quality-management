<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Core & Tenancy — audit_logs
 * NOTE: Immutable log. The app DB user should be granted INSERT/SELECT only on this table — no UPDATE or DELETE.
 */
class CreateAuditLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'user_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'action' => ['type' => 'VARCHAR', 'constraint' => 100],
                'module' => ['type' => 'VARCHAR', 'constraint' => 100],
                'record_type' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'record_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'old_value_json' => ['type' => 'TEXT', 'null' => true],
                'new_value_json' => ['type' => 'TEXT', 'null' => true],
                'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('user_id');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('module');
        $this->forge->addKey('record_type');
        $this->forge->addKey('record_id');
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'SET NULL');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'SET NULL');

        $this->forge->createTable('audit_logs', true);
    }

    public function down()
    {
        $this->forge->dropTable('audit_logs', true);
    }
}

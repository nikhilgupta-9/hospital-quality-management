<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Shared Services — notifications
 */
class CreateNotificationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'user_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'channel' => ['type' => 'VARCHAR', 'constraint' => 30],
                'related_type' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'related_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'message' => ['type' => 'TEXT', 'null' => true],
                'sent_at' => ['type' => 'DATETIME', 'null' => true],
                'read_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('user_id');
        $this->forge->addKey('read_at');
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'SET NULL');

        $this->forge->createTable('notifications', true);
    }

    public function down()
    {
        $this->forge->dropTable('notifications', true);
    }
}

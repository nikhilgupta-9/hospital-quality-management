<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Shared Services — notification_rules
 */
class CreateNotificationRulesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'event_type' => ['type' => 'VARCHAR', 'constraint' => 100],
                'days_before' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'channel' => ['type' => 'VARCHAR', 'constraint' => 30],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('event_type');

        $this->forge->createTable('notification_rules', true);
    }

    public function down()
    {
        $this->forge->dropTable('notification_rules', true);
    }
}

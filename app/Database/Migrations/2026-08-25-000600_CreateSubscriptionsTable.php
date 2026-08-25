<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Core & Tenancy — subscriptions
 */
class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'plan' => ['type' => 'VARCHAR', 'constraint' => 100],
                'max_users' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'features_json' => ['type' => 'TEXT', 'null' => true],
                'expiry_date' => ['type' => 'DATE', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('hospital_id');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');

        $this->forge->createTable('subscriptions', true);
    }

    public function down()
    {
        $this->forge->dropTable('subscriptions', true);
    }
}

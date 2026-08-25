<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — utility_systems
 */
class CreateUtilitySystemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'name' => ['type' => 'VARCHAR', 'constraint' => 191],
                'location' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'install_date' => ['type' => 'DATE', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('type');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');

        $this->forge->createTable('utility_systems', true);
    }

    public function down()
    {
        $this->forge->dropTable('utility_systems', true);
    }
}

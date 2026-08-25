<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * HR Panel — trainings
 */
class CreateTrainingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'title' => ['type' => 'VARCHAR', 'constraint' => 191],
                'type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'scheduled_date' => ['type' => 'DATE', 'null' => false],
                'trainer_name' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('scheduled_date');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');

        $this->forge->createTable('trainings', true);
    }

    public function down()
    {
        $this->forge->dropTable('trainings', true);
    }
}

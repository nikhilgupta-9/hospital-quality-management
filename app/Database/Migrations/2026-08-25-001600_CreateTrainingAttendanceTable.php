<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * HR Panel — training_attendance
 */
class CreateTrainingAttendanceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'training_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'staff_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'attended' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'score' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'certificate_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['training_id', 'staff_id']);
        $this->forge->addForeignKey('training_id', 'trainings', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('staff_id', 'staff', 'id', false, 'CASCADE');

        $this->forge->createTable('training_attendance', true);
    }

    public function down()
    {
        $this->forge->dropTable('training_attendance', true);
    }
}

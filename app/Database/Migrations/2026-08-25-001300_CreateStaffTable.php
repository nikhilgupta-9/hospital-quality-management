<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * HR Panel — staff
 */
class CreateStaffTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'department_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'user_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'employee_code' => ['type' => 'VARCHAR', 'constraint' => 50],
                'name' => ['type' => 'VARCHAR', 'constraint' => 191],
                'designation' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'qualification' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'joining_date' => ['type' => 'DATE', 'null' => true],
                'experience_years' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'contact' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('employee_code');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('department_id');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('department_id', 'departments', 'id', false, 'RESTRICT');
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'SET NULL');

        $this->forge->createTable('staff', true);
    }

    public function down()
    {
        $this->forge->dropTable('staff', true);
    }
}

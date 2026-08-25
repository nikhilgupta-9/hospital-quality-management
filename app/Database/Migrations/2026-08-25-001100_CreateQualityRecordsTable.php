<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Document Panel — quality_records
 */
class CreateQualityRecordsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'department_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'type' => ['type' => 'VARCHAR', 'constraint' => 50],
                'recorded_date' => ['type' => 'DATE', 'null' => false],
                'value_json' => ['type' => 'TEXT', 'null' => true],
                'recorded_by' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('type');
        $this->forge->addKey('recorded_date');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('department_id', 'departments', 'id', false, 'SET NULL');
        $this->forge->addForeignKey('recorded_by', 'users', 'id', false, 'SET NULL');

        $this->forge->createTable('quality_records', true);
    }

    public function down()
    {
        $this->forge->dropTable('quality_records', true);
    }
}

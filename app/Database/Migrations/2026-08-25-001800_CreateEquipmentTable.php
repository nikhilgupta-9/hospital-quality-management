<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Equipment & Infrastructure Panel — equipment
 */
class CreateEquipmentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'hospital_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'department_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                'asset_no' => ['type' => 'VARCHAR', 'constraint' => 100],
                'name' => ['type' => 'VARCHAR', 'constraint' => 191],
                'category' => ['type' => 'VARCHAR', 'constraint' => 50],
                'manufacturer' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'model' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'serial_no' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'purchase_date' => ['type' => 'DATE', 'null' => true],
                'install_date' => ['type' => 'DATE', 'null' => true],
                'warranty_expiry' => ['type' => 'DATE', 'null' => true],
                'amc_cmc_expiry' => ['type' => 'DATE', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'active'],
                'service_agency' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('asset_no');
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('department_id');
        $this->forge->addKey('category');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('hospital_id', 'hospitals', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('department_id', 'departments', 'id', false, 'RESTRICT');

        $this->forge->createTable('equipment', true);
    }

    public function down()
    {
        $this->forge->dropTable('equipment', true);
    }
}

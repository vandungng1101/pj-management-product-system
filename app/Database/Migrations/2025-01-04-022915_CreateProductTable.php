<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'pro_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 10,
                'auto_increment' => true,
            ],
            'pro_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'pro_desc' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'null' => false,
                'constraint' => '10,2',
            ],
            'cate_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('pro_id', true);
        $this->forge->addForeignKey('cate_id', 'category', 'cate_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product');
    }

    public function down()
    {
        //
        $this->forge->dropTable('product');
    }
    
}

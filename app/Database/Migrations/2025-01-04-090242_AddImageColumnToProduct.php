<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageColumnToProduct extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('product',[
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('product','image');
    }
}

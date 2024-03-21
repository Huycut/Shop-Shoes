<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'key'=>[
                'type'          =>'INT',
                'constraint'    =>255,
                'unsigned'      =>true,
            ],
            'productType'=>[
                'type'=> 'VARCHAR',
                'constraint'=>50,

            ],
            
        ]);
        $this->forge->addKey('key',true);
        $this->forge->createTable('Category');
    }

    public function down()
    {
        $this->forge->dropTable('Category');
    }
}

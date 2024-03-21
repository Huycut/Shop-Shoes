<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idProduct'=>[
                'type'          =>'INT',
                'constraint'    =>255,
                'unsigned'      =>true,
            ],
            'nameProduct'=>[
                'type'=> 'VARCHAR',
                'constraint'=>50,

            ],
            'keyProduct'=> [
                'type' =>'VARCHAR',
                'constraint' => 50,
            ],
            'imgProduct'=>[
                'type'=>'VARCHAR',
                'constraint' =>300,
            ],
            'title'=>[
                'type' => 'VARCHAR',
                'constraint' =>300
            ]
            
        ]);
        $this->forge->addKey('idProduct',true);
        $this->forge->createTable('Product');
    }

    public function down()
    {
        $this->forge->dropTable('Product');
    }
}

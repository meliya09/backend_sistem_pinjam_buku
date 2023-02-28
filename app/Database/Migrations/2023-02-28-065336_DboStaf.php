<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DboStaf extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_staf' => [  
                'type' => 'INT', 
                'constraint' => 11, 
                'unsigned' => true, 
                'auto_increment' => true, 
            ], 
            'nama_staf' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 50, 
                'null' => false, 
            ], 
            'jabatan_staf' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 50, 
                'null' => false, 
            ], 
            'telp_staf' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 14, 
                'null' => false, 
            ], 
            'alamat_staf' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 100, 
                'null' => false, 
            ], 
            'user_time timestamp default now()' 
        ]); 
        $this->forge->addPrimaryKey('id_staf'); 
        $this->forge->createTable('dbo_staf'); 
    }

    public function down()
    {
        $this->forge->dropTable('dbo_staf');
    }
}

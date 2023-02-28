<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DboMurid extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_murid' => [  
                'type' => 'INT', 
                'constraint' => 11, 
                'unsigned' => true, 
                'auto_increment' => true, 
            ], 
            'nama_murid' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 50, 
                'null' => false, 
            ], 
            'jenis_kelamin' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 1, 
                'null' => false, 
            ], 
            'telp_murid' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 14, 
                'null' => false, 
            ], 
            'alamat_murid' => [ 
                'type' => 'VARCHAR', 
                'constraint' => 100, 
                'null' => false, 
            ], 
            'user_time timestamp default now()' 
        ]); 
        $this->forge->addPrimaryKey('id_murid'); 
        $this->forge->createTable('dbo_murid'); 
    }

    public function down()
    {
        $this->forge->dropTable('dbo_murid');
    }
}

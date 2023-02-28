<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DboRakBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_rak_buku' => [  
                'type' => 'INT', 
                'constraint' => 11, 
                'unsigned' => true, 
                'auto_increment' => true, 
            ], 
            'nama_rak_buku' => [ 
                'type' => 'VARCHAR', 
                'constraint' => '50', 
                'null' => false, 
            ], 
            'lokasi_rak_buku' => [ 
                'type' => 'VARCHAR', 
                'constraint' => '50', 
                'null' => false, 
            ], 
            'id_buku' => [ 
                'type' => 'INT', 
                'constraint' => '11', 
                'null' => false 
            ], 

            'user_time timestamp default now()' 
        ]); 
        $this->forge->addPrimaryKey('id_rak_buku'); 
        $this->forge->addForeignKey('id_buku', 'dbo_buku', 'id_buku');
        $this->forge->createTable('dbo_rak_buku'); 
    }

    public function down()
    {
        $this->forge->dropTable('dbo_rak_buku');
    }
}

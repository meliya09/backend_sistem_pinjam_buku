<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DboBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_buku' => [  
                'type' => 'INT', 
                'constraint' => 11, 
                'unsigned' => true, 
                'auto_increment' => true, 
            ], 
            'kd_buku' => [ 
                'type' => 'VARCHAR', 
                'constraint' => '6', 
                'null' => false, 
            ], 
            'judul_buku' => [ 
                'type' => 'VARCHAR', 
                'constraint' => '100', 
                'null' => false, 
            ], 
            'penulis' => [ 
                'type' => 'VARCHAR', 
                'constraint' => '50', 
                'null' => false 
            ], 
            'penerbit' => [ 
                'type' => 'VARCHAR', 
                'constraint' => '100', 
                'null' => false, 
            ], 
            'tahun_penerbit' => [ 
                'type' => 'INT', 
                'constraint' => '4', 
                'null' => false, 
            ], 
            'stok_buku' => [ 
                'type' => 'INT', 
                'constraint' => '20', 
                'null' => false, 
            ],

            'user_time timestamp default now()' 
        ]); 
        $this->forge->addPrimaryKey('id_buku'); 
        $this->forge->createTable('dbo_buku'); 
    }

    public function down()
    {
        $this->forge->dropTable('dbo_buku');
    }
}

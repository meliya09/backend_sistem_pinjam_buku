<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DboPengembalian extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_pengembalian' => [  
                'type' => 'INT', 
                'constraint' => 11, 
                'unsigned' => true, 
                'auto_increment' => true, 
            ], 
            'tanggal_kembali' => [ 
                'type' => 'DATE', 
                'null' => false, 
            ], 
            'denda' => [ 
                'type' => 'INT', 
                'constraint' => '11', 
                'null' => false 
            ], 
            'id_buku' => [ 
                'type' => 'INT', 
                'constraint' => '11', 
                'null' => false, 
            ], 
            'id_staf' => [ 
                'type' => 'INT', 
                'constraint' => '11', 
                'null' => false, 
            ], 
            'id_murid' => [ 
                'type' => 'INT', 
                'constraint' => '11', 
                'null' => false, 
            ], 

            'user_time timestamp default now()' 
        ]); 
        $this->forge->addPrimaryKey('id_pengembalian'); 
        $this->forge->addForeignKey('id_buku', 'dbo_buku', 'id_buku');
        $this->forge->addForeignKey('id_staf', 'dbo_staf', 'id_staf');
        $this->forge->addForeignKey('id_murid', 'dbo_murid', 'id_murid');
        $this->forge->createTable('dbo_pengembalian'); 
    }

    public function down()
    {
        $this->forge->dropTable('dbo_pengembalian');
    }
}


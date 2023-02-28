<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MuridModel extends Model
{
    protected $table = 'dbo_murid';
    protected $primaryKey = 'id_murid';
    protected $allowedFields = [
        'nama_murid',
        'jenis_kelamin',
        'telp_murid',
        'alamat_murid',
    ];
    protected $updatedField = 'updated_at';

    public function getAllMurid(){
       $query = $this->db->table('dbo_murid')
       ->orderBy('id_murid', 'asc')
       ->get()->getResultArray();  
       return $query;
    }

    public function MuridById($id)
    {
        $murid = $this
            ->asArray()
            ->where(['id_murid' => $id])
            ->first();

        if (!$murid) throw new Exception('Could not find murid for specified ID');

        return $murid;
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModels extends Model
{
    protected $primaryKey = 'id_pesanan';
    protected $table      = 'pesanan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'total_bayar', 'status_bayar', 'bukti_bayar', 'pesan',  'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function getAllPesananWhere($id_user)
    {
        return $this->where("status_bayar", "1")->where("id_user", $id_user)->get()->getResult();
    }
}
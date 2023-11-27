<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table = 'gejala';
    protected $primaryKey = 'id_gejala';
    protected $allowedFields = [
        'benjolan',
        'demam',
        'keringat',
        'sakitTenggorokan',
        'pilek',
        'lelah',
        'gatal',
        'sesak',
        'penurunanBerat',
        'hasil',
        'timeCustom',
        'id_pengguna'
    ];

    public function getAllGejala()
    {
        return $this->findAll();
    }

    public function getGejalaWithAkun()
    {
        return $this->select('gejala.*, akun.nama')
        ->join('akun', 'akun.idAkun = gejala.id_pengguna')
        ->findAll();
    }

    public function getHistoriByUserId($userId) 
    {
        return $this->select('gejala.*, akun.nama')
            ->join('akun', 'akun.idAkun = gejala.id_pengguna')
            ->where('gejala.id_pengguna', $userId)
            ->findAll();
    }
}

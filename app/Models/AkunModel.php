<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'idAkun';
    protected $allowedFields = ['nama', 'username', 'password'];
}

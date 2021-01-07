<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';
    protected $allowedFields = ['username', 'password', 'nama', 'email', 'telp', 'tgl_lahir', 'alamat', 'id_provinsi', 'id_kabupaten', 'id_kecamatan'];

    protected $useTimestamps = false;


}

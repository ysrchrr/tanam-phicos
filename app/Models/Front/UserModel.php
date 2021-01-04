<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';

    //  protected $returnType = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'password', 'nama', 'email', 'telp', 'tgl_lahir', 'alamat', 'id_provinsi', 'id_kabupaten', 'id_kecamatan'];

    protected $useTimestamps = false;
    //protected $createdField = 'created_at';
    //protected $updatedField = 'updated_at';
    //protected $deletedField = 'deleted_at';

    //protected $validationRules = [];
    //protected $validationMessages = [];
    //protected $skipValidation = false;


}

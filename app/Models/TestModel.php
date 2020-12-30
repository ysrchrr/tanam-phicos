<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id_admin';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'nama', 'password', 'email', 'telp'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}

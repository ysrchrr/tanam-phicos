<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    protected $allowedFields = ['judul_blog', 'terakhir_diperbarui', 'isi_blog'];

    protected $useTimestamps = false;

}

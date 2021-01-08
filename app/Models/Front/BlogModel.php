<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    protected $allowedFields = ['judul_blog', 'terakhir_diperbarui', 'isi_blog'];

    protected $useTimestamps = false;

    public function recent()
    {
        $query = 'select * from blog order by terakhir_diperbarui desc limit 5';
        return  $this->query($query);
    }

    public function archive()
    {
        $query = 'SELECT CONCAT(MONTHNAME ( terakhir_diperbarui )," ",YEAR ( terakhir_diperbarui )) AS tanggal 
    FROM
        blog 
    GROUP BY
        YEAR ( terakhir_diperbarui ),
        MONTH ( terakhir_diperbarui );
    
        ';

        return $this->query($query);
    }

    public function archive_month($tanggal)
    {
        $query = 'SELECT *  FROM blog
        JOIN admin ON blog.id_admin = admin.id_admin
          WHERE
        YEAR ( blog.terakhir_diperbarui ) = YEAR ("' . $tanggal . '") 
        AND MONTH ( blog.terakhir_diperbarui ) = MONTH ("' . $tanggal . '")';

        return $this->query($query);
    }
}

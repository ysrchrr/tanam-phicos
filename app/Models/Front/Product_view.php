<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class Product_view extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    // SELECT * FROM `barang`
    // LEFT JOIN gambar on gambar.id_barang = barang.id_barang
    public function get_product_list($where)
    {
        $query = "select barang.*, gambar.link_gambar from barang left join gambar on gambar.id_barang = barang.id_barang ";

        if (isset($where) && !empty($where)) {
            $query .= "where id_kategori ='$where'";
        }
        return $this->query($query);
    }
    public function get_product_detail() {
        $data = $this->db->table('barang');
        $data->select('barang.*, gambar.link_gambar');
        $data->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        // $data->where('barang.id_barang = ' $id);
        return $data->get();
    }
}

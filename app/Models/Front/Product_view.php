<?php

namespace App\Models\Front;
use CodeIgniter\Model;

class Product_view extends Model {
    // SELECT * FROM `barang`
    // LEFT JOIN gambar on gambar.id_barang = barang.id_barang
    public function get_product_list() {
        $data = $this->db->table('barang');
        $data->select('barang.*, gambar.link_gambar');
        $data->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        return $data->get();
    }
}

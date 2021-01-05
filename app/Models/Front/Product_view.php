<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class Product_view extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    public function get_product_list($where)
    {
        $data = $this->db->table('barang');
        $data->select('barang.*, gambar.link_gambar, kategori.nama_kategori');
        $data->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        $data->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');

        if (isset($kategori) && !empty($kategori)) {
            $data->where("barang.id_kategori = '$kategori'");
        }

        return $data->get();     
    }

    public function get_product_detail($kategori, $id) {
        $data = $this->db->table('barang');
        $data->select('barang.*, gambar.link_gambar, kategori.nama_kategori');
        $data->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        $data->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');

        if (isset($id) && !empty($id)) {
            $data->where("barang.id_barang = '$id'");
        }

        return $data->get();
    }
}

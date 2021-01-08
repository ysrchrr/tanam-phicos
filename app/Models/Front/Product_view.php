<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class Product_view extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    // SELECT * FROM `barang`
    // LEFT JOIN gambar on gambar.id_barang = barang.id_barang
    public function get_product_list($kategori)
    {
        $data = $this->db->table('barang');
        $data->select('barang.*, barang.slug_barang as slug_barang, gambar.link_gambar, kategori.*');
        $data->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        $data->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');

        if (isset($kategori) && !empty($kategori)) {
        //     $data->where("kategori.slug = '$kategori'");
        // } else {
            $data->where("kategori.slug_kategori = '$kategori'");
        }

        return $data->get();     
    }

    public function get_product_detail($kategori, $id) {
        $data = $this->db->table('barang');
        $data->select('barang.*, gambar.link_gambar, kategori.*');
        $data->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        $data->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');

        if (isset($id) && !empty($id)) {
            $data->where("barang.slug_barang = '$id'");
        }

        return $data->get();
    }
}

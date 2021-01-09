<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id_cart';
    protected $allowedFields = ['id_member', 'jumlah', 'total'];

    protected $useTimestamps = false;

    public function savecart($id_barang, $jumlah)
    {
        $cek_harga = $this->query('select * from barang where id_barang=' . $id_barang)->getrowarray();
        $cek_data = $this->query('select * from cart where id_member=' . session()->get('user_id'));
        if (count($cek_data->getresultarray()) < 1) {
            $data_post_cart = array(
                'id_member' =>    session()->get('user_id'),
                'jumlah' => $jumlah,
                'total'  => $cek_harga['harga_barang'] * $jumlah

            );
            $this->save($data_post_cart);
            $cek_data = $this->query('select * from cart where id_member=' . session()->get('user_id'))->getrorwarray();
            $data_post_cart_detail = array(
                'id_cart' => $cek_data['id_cart'],
                'id_barang' => $id_barang,
                'sub_jumlah' => $jumlah,
                'sub_total'  => $cek_harga['harga_barang'] * $jumlah
            );
            $this->table('cart_detail')->insert($data_post_cart_detail);
        } else {
            $cek_data = $this->query('select * from cart where id_member=' . session()->get('user_id'))->getrorwarray();
            $cek_cd =  $this->query('select * from cart_detail where id_cart=' . $cek_data['id_cart']);
            if (count($cek_cd->getresultarray() < 1)) {
                $data_post_cart_detail = array(
                    'id_cart' => $cek_data['id_cart'],
                    'id_barang' => $id_barang,
                    'sub_jumlah' => $jumlah,
                    'sub_total'  => $cek_harga['harga_barang'] * $jumlah
                );
                $this->table('cart_detail')->insert($data_post_cart_detail);
            } else {
                $jumlah_akhir = $jumlah + $cek_cd->getrowarray()['sub_jumlah'];
                $sub_total = $cek_harga['harga_barang'] * $jumlah_akhir;
                $id_cart = $cek_data['id_cart'];
                $query = "Update cart_detail set 
                            sub_jumlah=$jumlah_akhir,
                            sub_total=$sub_total 
                            where id_cart=$id_cart 
                            and id_barang=$id_barang
                            ";

                $this->query($query);
            }
        }
    }

    public function tampilcart($id_barang, $jumlah_akhir)
    {
    }
}

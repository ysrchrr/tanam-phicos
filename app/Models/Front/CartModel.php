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
            $cek_data = $this->query('select * from cart where id_member=' . session()->get('user_id'))->getrowarray();
            $id_cart = $cek_data['id_cart'];
            $sub_total = $cek_harga['harga_barang'] * $jumlah;
            // $data_post_cart_detail = array(
            //     'id_cart' => $cek_data['id_cart'],
            //     'id_barang' => $id_barang,
            //     'sub_jumlah' => $jumlah,
            //     'sub_total'  => $cek_harga['harga_barang'] * $jumlah
            // );
            $query = "insert into cart_detail(id_cart,id_barang,sub_jumlah,sub_total)
                        values($id_cart,$id_barang,$jumlah,$sub_total)
                        ";
            $this->query($query);
        } else {
            $cek_data = $this->query('select * from cart where id_member=' . session()->get('user_id'))->getrowarray();
            $cek_cd =  $this->query('select * from cart_detail where id_cart=' . $cek_data['id_cart'] . ' and id_barang=' . $id_barang);
            if (count($cek_cd->getresultarray()) < 1) {
                $id_cart = $cek_data['id_cart'];
                $data_post_cart_detail = array(
                    'id_cart' => $cek_data['id_cart'],
                    'id_barang' => $id_barang,
                    'sub_jumlah' => $jumlah,
                    'sub_total'  => $cek_harga['harga_barang'] * $jumlah
                );

                $sub_total = $cek_harga['harga_barang'] * $jumlah;
                $query = "insert into cart_detail(id_cart,id_barang,sub_jumlah,sub_total)
                        values($id_cart,$id_barang,$jumlah,$sub_total)
                ";
                // var_dump($query);
                $this->query($query);
            } else {
                // var_dump($cek_cd->getrowarray()['sub_jumlah']);

                $jumlah_akhir = $jumlah + $cek_cd->getrowarray()['sub_jumlah'];
                $sub_total = $cek_harga['harga_barang'] * $jumlah_akhir;
                $id_cart = $cek_data['id_cart'];
                $query = "Update cart_detail set 
                            sub_jumlah=$jumlah_akhir,
                            sub_total=$sub_total 
                            where id_cart=$id_cart 
                            and id_barang=$id_barang
                            ";
                // var_dump($query);
                $this->query($query);
            }
            $query = "select sum(sub_jumlah) as jumlah,sum(sub_total) as total from cart_detail where id_cart=" . $cek_data['id_cart'];
            $cek = $this->query($query)->getrowarray();
            $data_post_cart = array(
                'id_cart' => $cek_data['id_cart'],
                'id_member' =>    session()->get('user_id'),
                'jumlah' => $cek['jumlah'],
                'total'  => $cek['total']

            );
            $this->save($data_post_cart);
        }
    }

    public function updatecart($id_cart, $id_barang, $jumlah)
    {
        $barang = $this->query("select * from barang where id_barang =" . $id_barang)->getrowarray();
        $sub_total = $jumlah * $barang['harga_barang'];
        $query1 = "Update cart_detail set 
        sub_jumlah=$jumlah,
        sub_total=$sub_total 
        where id_cart=$id_cart 
        and id_barang=$id_barang
        ";
        $this->query($query1);

        $query = "select sum(sub_jumlah) as jumlah,sum(sub_total) as total from cart_detail where id_cart=" . $id_cart;
        $cek = $this->query($query)->getrowarray();
        $data_post_cart = array(
            'id_cart' => $id_cart,
            'id_member' =>    session()->get('user_id'),
            'jumlah' => $cek['jumlah'],
            'total'  => $cek['total']

        );
        $this->save($data_post_cart);

        return true;
    }

    public function delete_cart($id_cart, $id_barang)
    {

        $cek_cd =  $this->query('select * from cart_detail where id_cart=' . $id_cart);
        if (count($cek_cd->getresultarray()) > 1) {
            $qd = "delete from cart_detail where id_cart= $id_cart and id_barang = $id_barang";
            $this->query($qd);
            $query = "select sum(sub_jumlah) as jumlah,sum(sub_total) as total from cart_detail where id_cart=" . $id_cart;
            $cek = $this->query($query)->getrowarray();
            $data_post_cart = array(
                'id_cart' => $id_cart,
                'id_member' =>    session()->get('user_id'),
                'jumlah' => $cek['jumlah'],
                'total'  => $cek['total']

            );
            $this->save($data_post_cart);
        } else if (count($cek_cd->getresultarray()) == 1) {
            $qd = "delete from cart_detail where id_cart= $id_cart and id_barang = $id_barang";
            $this->query($qd);
            $qd2 = "delete from cart where id_cart= $id_cart";
            $this->query($qd2);
        }
    }

    public function tampilcart($id_barang, $jumlah_akhir)
    {

        $this->savecart($id_barang, $jumlah_akhir);
        $data_cart = $this->query('select * from cart where id_member=' . session()->get('user_id'))->getresultarray();

        if (count($data_cart) > 0) {
            $query = "select * from cart_detail join barang on cart_detail.id_barang = barang.id_barang where cart_detail.id_cart =" . $data_cart[0]['id_cart'];
            $query_j = "select sum(cart_detail.sub_jumlah) as jumlah from cart_detail join barang on cart_detail.id_barang = barang.id_barang where cart_detail.id_cart =" . $data_cart[0]['id_cart'];
            $jumlah = $this->query($query_j)->getrowarray()['jumlah'];
            $cart_d = $this->query($query)->getresultarray();
            $gambar = $this->query('select * from gambar group by id_barang')->getresultarray();

            $data_dalam = '';
            foreach ($cart_d as $cd) {
                $data_dalam .= '<tr>';
                foreach ($gambar as $g) {
                    if ($g['id_barang'] == $cd['id_barang']) {
                        $data_dalam .= '<td class="image"><img alt="IMAGE" class="img-responsive" src="' . $g['link_gambar'] . '"></td>';
                    }
                }
                $data_dalam .= '<td class="name"><a href="#">' . $cd['nama_barang'] . ' </a></td>';
                $data_dalam .= '<td class="quantity">' . $cd['sub_jumlah'] . '</td>';
                $data_dalam .= '<td class="total">' . $cd['sub_total'] . '</td>';
                $data_dalam .= '<td class="remove"><img src="' . base_url() . '/front-assets/image/remove-small.png" alt="Remove" title="Remove"></td>';
                $data_dalam .= '</tr>';
            }
            $datacart = '
								<a href="' . base_url() . '/front/cart" class="dropdown-toggle" data-toggle="dropdown"><span>' . $jumlah . '</span></a>
								<div class="cart-info dropdown-menu text-center">
									<table class="table">
										<thead>
											<tr>
												<td></td>
												<td>Nama</td>
												<td>Jumlah</td>
												<td>Harga</td>
											<tr>
										</thead>
										<tbody>
										' . $data_dalam . '
										</tbody>
									</table>
									<div class="cart-total">
										<table>
											<tbody>
												<tr>
													<td><b>Total:</b></td>
													<td>Rp. ' . $data_cart[0]['total'] . '</td>
												</tr>
											</tbody>
										</table>
										<div class="checkout"><a href="' . base_url() . '/cart" class="ajax_right">View Cart</a> | <a href="' . base_url() . '/front/checkout" class="ajax_right">Checkout</a></div>

									</div>

								</div>';
        } else {
            $datacart = '
								<a href="' . base_url() . '/front/cart" class="dropdown-toggle" data-toggle="dropdown"><span>0</span></a>
								<div class="cart-info dropdown-menu text-center">
									<h6>Keranjang masih kosong</h6>
								</div>
                                ';
        }

        return $datacart;
    }
}

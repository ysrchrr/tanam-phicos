<?php

namespace App\Controllers;

use App\Models\Front\UserModel;
use App\Models\Front\Product_view;

class Account extends BaseController
{
    public function __construct()
    {

        $this->UserModel = new UserModel();
        $this->product_view = new Product_view();
    }

    public function get_cart()
    {

        if (session()->get('login')) {
            $cart['total'] = $this->product_view->get_cart_home(session()->get('user_id'));
            $cart['detail'] = [];
            if (count($cart['total']->getresultarray()) > 0) {
                $cart['total'] = $cart['total']->getrowarray();
                $cart['detail'] = $this->product_view->get_cart_home_detail(session()->get('user_id'))->getresultarray();
            }
            $cart['gambar'] = $this->product_view->query('select * from gambar group by id_barang')->getresultarray();
        } else {
            $cart['total'] = "";
            $cart['detail'] = [];
            $cart['gambar'] = "";
        }

        return $cart;
    }

    public function test()
    {
    }

    public function index()
    {

        if (!session()->get('login')) {
            return redirect()->to(base_url() . '/');
        }

        $data = array(
            'title' => "Phicos | Account",
            'cart' =>     $this->get_cart()['total'],
            'cart_d' =>     $this->get_cart()['detail'],
            'gambar' =>     $this->get_cart()['gambar'],
            'validation' => \Config\Services::validation(),
            'bio' => $this->UserModel->query('select * from member where id_member =' . session()->get('user_id'))->getrowarray()
        );

        return view('front/pages/account', $data);
    }

    public function akun_update()
    {

        if (!$this->validate([
            'username'  => 'required',
            'password' => 'required',
            'email' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            'tgl_lahir' => 'required',
        ])) {
            session()->setflashdata('pesan', 'Data yang anda isi belum lengkap');
            return redirect()->to(base_url() . '/account')->withInput();
        }

        $password = $this->request->getVar('password');
        if ($password == 'abcde') {
            $password = $this->request->getVar('password_old');
        } else {
            $password = md5($this->request->getVar('password'));
        }
        $data = [
            'id_member' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'telp' => $this->request->getVar('telp'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
        ];
        $this->UserModel->save($data);
        return redirect()->to(base_url() . '/account');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url() . '/');
    }

    public function address()
    {
        if (!session()->get('login')) {
            return redirect()->to(base_url() . '/');
        }
        $data = array(
            'title' => "Phicos | Address",
            'validation' => \Config\Services::validation(),
            'cart' =>     $this->get_cart()['total'],
            'cart_d' =>     $this->get_cart()['detail'],
            'gambar' =>     $this->get_cart()['gambar'],
            'bio' => $this->UserModel->query('select * from member where id_member =' . session()->get('user_id'))->getrowarray(),
            'provinsi' => $this->UserModel->query('select * from wilayah_provinsi order by nama asc')->getresultarray(),
            'kota' => $this->UserModel->query('select * from wilayah_kabupaten order by nama asc')->getresultarray(),
            'kecamatan' => $this->UserModel->query('select * from wilayah_kecamatan order by nama asc')->getresultarray(),

        );

        return view('front/pages/address', $data);
    }

    public function orders()
    {
        if (!session()->get('login')) {
            return redirect()->to(base_url() . '/');
        }

        $a = "";
        $pemesanan = $this->UserModel->query('select * from pemesanan where id_member =' . session()->get('user_id'))->getresultarray();

        if (count($pemesanan) == 0) {
            $data = array(
                'title' => "Phicos | Address",
                'cart' =>     $this->get_cart()['total'],
                'cart_d' =>     $this->get_cart()['detail'],
                'gambar' =>     $this->get_cart()['gambar'],
            );
            return view('front/pages/orders_blank', $data);
        }

        foreach ($pemesanan as $p) {
            $a .= $p['id_pemesanan'];
        }
        $b = implode(',', str_split($a));

        $data = array(
            'title' => "Phicos | Address",
            'cart' =>     $this->get_cart()['total'],
            'cart_d' =>     $this->get_cart()['detail'],
            'gambar' =>     $this->get_cart()['gambar'],
            'validation' => \Config\Services::validation(),
            'pemesanan' => $pemesanan,
            'pemesanan_detail' => $this->UserModel->query('select * from pemesanan_detail as pd,barang as b where pd.id_barang = b.id_barang and pd.id_pemesanan in (' . $b . ')')->getresultarray(),
            'gambar_pd' => $this->UserModel->query('select * from gambar group by id_barang')->getresultarray()
        );

        // dd($data['pemesanan_detail']);


        return view('front/pages/orders', $data);
    }

    public function orders_detail($nomor_order = "")
    {

        if (!session()->get('login')) {
            return redirect()->to(base_url() . '/');
        }

        if (empty($nomor_order)) {
            return redirect()->to(base_url() . '/account/orders');
        }

        $pemesanan = $this->UserModel->query('select * from pemesanan p, member m where m.id_member =' . session()->get('user_id') . ' and p.id_member =' . session()->get('user_id') . ' and p.id_pemesanan =' . $nomor_order);

        if (count($pemesanan->getresultarray()) < 1) {
            return redirect()->to(base_url() . '/account/orders');
        }

        $pemesanan = $pemesanan->getrowarray();
        $data = array(
            'title' => "Phicos | Pesanan Detail",
            'bio' => $pemesanan,
            'cart' =>     $this->get_cart()['total'],
            'cart_d' =>     $this->get_cart()['detail'],
            'gambar' =>     $this->get_cart()['gambar'],
            'pemesanan_detail' => $this->UserModel->query('select * from pemesanan_detail as pd,barang as b where pd.id_barang = b.id_barang and pd.id_pemesanan =' . $pemesanan['id_pemesanan'])->getresultarray(),
            'provinsi' => $this->UserModel->query('select * from wilayah_provinsi where id =' . $pemesanan['id_provinsi'])->getrowarray(),
            'kabupaten' => $this->UserModel->query('select * from wilayah_kabupaten where id =' . $pemesanan['id_kabupaten'])->getrowarray(),
            'kecamatan' => $this->UserModel->query('select * from wilayah_kecamatan where id =' . $pemesanan['id_kecamatan'])->getrowarray(),
            'gambar_pd' => $this->UserModel->query('select * from gambar group by id_barang')->getresultarray()
        );

        return view('front/pages/orders_detail', $data);
    }

    public function address_update()
    {
        if (!$this->validate([
            'id'  => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',

        ])) {
            session()->setflashdata('pesan', 'Data yang anda isi belum lengkap');
            return redirect()->to(base_url() . '/account/address')->withInput();
        }

        $data = [
            'id_member' => $this->request->getVar('id'),
            'alamat' => $this->request->getVar('alamat'),
            'id_provinsi' => $this->request->getVar('provinsi'),
            'id_kabupaten' => $this->request->getVar('kota'),
            'id_kecamatan' => $this->request->getVar('kecamatan'),

        ];


        $this->UserModel->save($data);
        return redirect()->to(base_url() . '/account/address');
    }
}

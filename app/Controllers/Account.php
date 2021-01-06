<?php

namespace App\Controllers;

use App\Models\Front\UserModel;
// use App\Models\Front\Product_view;

class Account extends BaseController
{
    public function __construct()
    {

        $this->UserModel = new UserModel();
    }

    public function test()
    {
    }

    public function index()
    {

        if (!session()->get('login')) {
            return redirect()->to(base_url() . '/front');
        }

        $data = array(
            'title' => "Phicos | Account",
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
            // session()->setflashdata('pesan', 'Data yang anda isi belum lengkap');
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
        return redirect()->to(base_url() . '/front');
    }

    public function address()
    {
        if (!session()->get('login')) {
            return redirect()->to(base_url() . '/front');
        }
        $data = array(
            'title' => "Phicos | Address",
            'validation' => \Config\Services::validation(),
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
            return redirect()->to(base_url() . '/front');
        }

        $a = "";
        $pemesanan = $this->UserModel->query('select * from pemesanan where id_member =' . session()->get('user_id'))->getresultarray();

        if (count($pemesanan) == 0) {
            $data = array(
                'title' => "Phicos | Address",
            );
            return view('front/pages/orders_blank', $data);
        }

        foreach ($pemesanan as $p) {
            $a .= $p['id_pemesanan'];
        }
        $b = implode(',', str_split($a));

        $data = array(
            'title' => "Phicos | Address",
            'validation' => \Config\Services::validation(),
            'pemesanan' => $pemesanan,
            'pemesanan_detail' => $this->UserModel->query('select * from pemesanan_detail as pd,barang as b where pd.id_barang = b.id_barang and pd.id_pemesanan in (' . $b . ')')->getresultarray(),
            'gambar_pd' => $this->UserModel->query('select * from gambar group by id_barang')->getresultarray()
        );

        // dd($data['pemesanan_detail']);


        return view('front/pages/orders', $data);
    }

    public function orders_detail()
    {
        if (!session()->get('login')) {
            return redirect()->to(base_url() . '/front');
        }
        $data = array(
            'title' => "Phicos | Pesanan Detail",
            'validation' => \Config\Services::validation(),
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
            // session()->setflashdata('pesan', 'Data yang anda isi belum lengkap');
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

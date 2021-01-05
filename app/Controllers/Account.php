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


    public function index()
    {
        $data = array(
            'title' => "Phicos | Account",
            'validation' => \Config\Services::validation(),

        );

        return view('front/pages/account', $data);
    }

    public function address()
    {
        $data = array(
            'title' => "Phicos | Address",
            'validation' => \Config\Services::validation(),
            'provinsi' => $this->UserModel->query('select * from wilayah_provinsi order by nama asc')->getresultarray(),
            'kota' => $this->UserModel->query('select * from wilayah_kabupaten order by nama asc')->getresultarray(),
            'kecamatan' => $this->UserModel->query('select * from wilayah_kecamatan order by nama asc')->getresultarray(),

        );

        return view('front/pages/address', $data);
    }

    public function orders()
    {
        $data = array(
            'title' => "Phicos | Address",
            'validation' => \Config\Services::validation(),


        );

        return view('front/pages/orders', $data);
    }

    public function orders_detail()
    {
        $data = array(
            'title' => "Phicos | Pesanan Detail",
            'validation' => \Config\Services::validation(),


        );

        return view('front/pages/orders_detail', $data);
    }
}

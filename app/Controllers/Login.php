<?php

namespace App\Controllers;

use App\Models\Front\UserModel;
use App\Models\Front\Product_view;

class Login extends BaseController
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



    public function index()
    {
        $data = array(
            'title' => "Phicos | Login",
            'cart' =>     $this->get_cart()['total'],
            'cart_d' =>     $this->get_cart()['detail'],
            'gambar' =>     $this->get_cart()['gambar'],
            'validation' => \Config\Services::validation(),

        );

        return view('Login', $data);
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        if (empty($username) && empty($password)) {
            return redirect()->to(base_url() . '/login');
        }

        $data_login = $this->UserModel->where(['username' => $username])->first();
        // $data_login = $this->Product_view->where(['username' => $username])->first();
        if ($data_login) {
            if (md5($password) == $data_login['password']) {

                $session_login = [
                    'user_id' =>   $data_login['id_member'],
                    'user_nama' =>   $data_login['username'],
                    'user_email' =>  $data_login['email'],
                    'login' => TRUE
                ];
                session()->set($session_login);
                return redirect()->to(base_url() . '/');
            } else {
                session()->setFlashdata('pesan', 'username atau password salah');
                return redirect()->to(base_url() . '/login')->withInput();
            }
        } else {
            session()->setFlashdata('pesan', 'username atau password salah');
            return redirect()->to(base_url() . '/login')->withInput();
        }
    }

    public function daftar()
    {
        $data = array(
            'title' => "Phicos | Daftar",
            'cart' =>     $this->get_cart()['total'],
            'cart_d' =>     $this->get_cart()['detail'],
            'gambar' =>     $this->get_cart()['gambar'],
            'validation' => \Config\Services::validation(),

        );

        return view('daftar', $data);
    }


    public function proses_daftar()
    {

        // dd($_POST);
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[member.username]',
                'errors' => [
                    'required' => '{field} username harus diisi.',
                    'is_unique' => '{field} username sudah ada',
                ],
            ],
            'email' =>  [
                'rules' => 'required|is_unique[member.email]',
                'errors' => [
                    'required' => '{field} email harus diisi.',
                    'is_unique' => '{field} email sudah ada',
                ],
            ],
            'password' => 'required'

        ])) {
            session()->setflashdata('pesan', 'Data yang anda isi belum lengkap');
            // session()->setFlashdata('pesan', 'username atau password salah');
            return redirect()->to(base_url() . '/daftar')->withInput();
        }


        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),

        ];


        $this->UserModel->save($data);
        session()->setflashdata('pesan', 'Silakan Login.');
        return redirect()->to(base_url() . '/login');
    }
}

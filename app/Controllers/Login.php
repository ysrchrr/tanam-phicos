<?php

namespace App\Controllers;

use App\Models\Front\UserModel;
// use App\Models\Front\Product_view;

class Login extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }


    public function index()
    {
        $data = array(
            'title' => "Phicos | Login",
            'validation' => \Config\Services::validation(),

        );

        return view('Login', $data);
    }

    public function auth()
    {
        // if (!$this->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ])) {
        //     return redirect()->to(base_url() . '/login')->withInput();
        // }

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
                return redirect()->to(base_url() . '/front');
            } else {
                return redirect()->to(base_url() . '/login')->withInput();
            }
        } else {
            return redirect()->to(base_url() . '/login')->withInput();
        }
    }
}

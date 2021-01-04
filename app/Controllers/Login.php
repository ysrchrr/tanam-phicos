<?php

namespace App\Controllers;

use App\Models\TestModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->TestModel = new TestModel();
    }


    public function index()
    {
        $data = array(
            'title' => "Phicos | Login"

        );

        return view('Login', $data);
    }

    public function auth()
    {
        
    }
}

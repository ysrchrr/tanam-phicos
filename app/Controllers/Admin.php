<?php

namespace App\Controllers;

use App\Models\TestModel;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->TestModel = new TestModel();
	}

	public function index()
	{
		return view('admin/index');
	}

	public function test()
	{
		return view('referensi/admin-e-commerce');
	}

	public function tes_aja()
	{
		$a = $this->TestModel->query('select * from admin')->getresultarray();
		dd($a);
	}
	//--------------------------------------------------------------------

}

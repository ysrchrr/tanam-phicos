<?php namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin/index');
	}

	public function test() 
	{
		return view('referensi/admin-e-commerce');
	}
	//--------------------------------------------------------------------

}

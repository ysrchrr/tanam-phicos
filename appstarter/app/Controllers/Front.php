<?php namespace App\Controllers;

class Front extends BaseController
{
	public function index()
	{
		return view('front/index');
	}

	public function test() 
	{
		return view('referensi/front-e-commerce');
	}
	//--------------------------------------------------------------------

}

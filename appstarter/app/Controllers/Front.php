<?php namespace App\Controllers;

class Front extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Front - Sapphire'
		);
		return view('front/index', $data);
	}

	public function test() 
	{
		return view('referensi/front-e-commerce');
	}
	//--------------------------------------------------------------------

}

<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Front\Product_view;

class Front extends BaseController
{
	public function index()
	{
		$model = new Product_view();
		$data = array(
			'title' => 'Front - Sapphire',
			'product' => $model->get_product_list()->getResult()
		);
		// $data['title'] = 'Front - Sapphire part 2';
		// $data['product'] = $model->get_product_list()->getResult();

		echo view('front/index', $data);
	}

	public function test()
	{
		return view('referensi/front-e-commerce');
	}

	public function tampilkategori()
	{

	}

	public function tampildata()
	{
		# code...
	}
	//--------------------------------------------------------------------

}

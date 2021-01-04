<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Front\Product_view;

class Front extends BaseController {
	public function index() {
		$model = new Product_view();
		$data = array(
			'title' => 'Front - Sapphire',
			'product' => $model->get_product_list()->getResult()
		);
		// $data['title'] = 'Front - Sapphire part 2';
		// $data['product'] = $model->get_product_list()->getResult();

		echo view('front/index', $data);
	}

	public function all_products() {
		$data = array(
			'title' => 'All Products',
			'name' => 'Bunga',
			'category' => 'Bunga'
		);
		echo view('front/pages/all_products', $data);
	}

	public function show_product() {
		$model = new Product_view();
		$data = array(
			'title' => 'Begonia Flower',
			'name' => 'Chili 辣椒',
			'other_name' => 'Capsicum annuum',
			'category' => 'Herbal',
			'product' => $model->get_product_detail()->getResult()
		);
		echo view('front/pages/product', $data);
	}

	public function test() 
	{
		return view('referensi/front-e-commerce');
	}
	//--------------------------------------------------------------------

}

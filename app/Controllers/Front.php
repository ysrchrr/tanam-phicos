<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Front\Product_view;

class Front extends BaseController
{

	public function __construct()
	{
		$this->product_view = new Product_view();
	}

	public function index($kategori = "")
	{
		$model = new Product_view();
		$data = array(
			'title' => 'Front - Sapphire',
			'product'  => $this->product_view->get_product_list($kategori)->getResult(),
			'category' => $this->product_view->query('Select * from kategori'),

		);

		echo view('front/index', $data);
	}

	public function all_products($kategori = "") {
		$model = new Product_view();
		$ambil = $model->get_product_list($kategori)->getRowArray();
		$data = array(
			'title' => 'All Products',
			'name' => $ambil['nama_kategori'],
			// 'category' => 'BBBunga',
			'product'  => $model->get_product_list($kategori)->getResult(),
			'category' => $model->query('Select * from kategori')->getResultArray()
		);
		echo view('front/pages/all_products', $data);
	}

	public function show_product($kategori="", $product_id) {
		$model = new Product_view();
		$ambil = $model->get_product_detail($kategori, $product_id)->getRowArray();
		$data = array(
			'title' => 'Product',
			'name' =>  $ambil['nama_barang'],
			'other_name' => $ambil['nama_lain'],
			'id_category' => $ambil['id_kategori'],
			'category' => $ambil['nama_kategori'],
			'link_img' => $ambil['link_gambar']
		);

		echo view('front/pages/product', $data);
	}

	public function test() 
	{
		return view('referensi/front-e-commerce');
	}
}

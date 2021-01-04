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

	public function index()
	{
		// $kategori = $this->product_view->query('Select * from kategori')->getresultarray();
		// $nama_k = "";
		// $sub_k = "";
		// foreach ($kategori as $k) {
		// 	$nama_k .= $k['nama'];
		// 	// echo "<b>" . $k['nama'] . "</b><br>";
		// 	$sub_kategori = $this->product_view->query('Select * from sub_kategori where id_kategori = ' . $k['id_kategori'])->getresultarray();
		// 	foreach ($sub_kategori as $sk) {
		// 		// echo $sk['nama'] . "<br>";
		// 		$nama_k .= $k['nama'] . $sk['nama'] . "<br>";
		// 	}
		// }

		// var_dump("<pre>", $nama_k);
		// die();

		$model = new Product_view();
		$data = array(
			'title' => 'Front - Sapphire',
			'product'  => $model->get_product_list()->getResult(),
			'sub_kategori1' => $this->product_view->query('Select * from sub_kategori'),

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
		$a = '<div class="row">
			<div class="col-md-12">
				<ul class="pagination pull-right">
				  <li><a href="#">&laquo;</a></li>
				  <li class="active"><a href="#">1</a></li>
				  <li><a href="#">2</a></li>
				  <li><a href="#">3</a></li>
				  <li><a href="#">4</a></li>
				  <li><a href="#">5</a></li>
				  <li><a href="#">&raquo;</a></li>
				</ul>
			</div>
		</div>';
	}

	public function tampildata()
	{
		$kategori = $this->request->getvar('kategori');
	}
	//--------------------------------------------------------------------

}

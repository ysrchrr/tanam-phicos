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
		if (empty($kategori)) {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
		} else {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->where('id_kategori', $kategori);
		}

		$data = array(
			'title' => 'Front - Sapphire',
			'category' => $this->product_view->query('Select * from kategori'),
			'product'  => $produk->paginate(9),
			'pager' => $produk->pager
		);

		echo view('front/index', $data);
	}

	public function all_products($kategori = "")
	{
		$model = new Product_view();
		$ambil = $model->get_product_list($kategori)->getRowArray();

		if (empty($kategori)) {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
			$nama = "Semua Produk";
		} else {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->where('id_kategori', $kategori);
			$nama = $ambil['nama_kategori'];
		}

		$data = array(
			'title' => 'All Products',
			'name' => $nama,
			// 'product'  => $model->get_product_list($kategori)->getResult(),
			'category' => $model->query('Select * from kategori')->getResultArray(),
			'product'  => $produk->paginate(9),
			'pager' => $produk->pager
		);
		echo view('front/pages/all_products', $data);
	}

	public function show_product($kategori = "", $product_id)
	{
		$model = new Product_view();
		$ambil = $model->get_product_detail($kategori, $product_id)->getRowArray();
		$data = array(
			'title' => 'Product',
			'name' =>  $ambil['nama_barang'],
			'other_name' => $ambil['nama_lain'],
			'price' => $ambil['harga_barang'],
			'description' => $ambil['deskripsi'],
			'id_category' => $ambil['id_kategori'],
			'category' => $ambil['nama_kategori'],
			'link_img' => $ambil['link_gambar'],
			'related_product' => $model->get_product_list($ambil['id_kategori'])->getResultArray()
		);
		// $related_product = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->where('id_kategori', $kategori);
		// $related_product = $model->get_product_list()->where('id_kategori', $kategori);
		// dd($related_product);
		// dd($data['related_product']);
		echo view('front/pages/product', $data);
	}

	public function cariproduk()
	{
		$cari = $this->request->getVar('search');
		if (empty($cari)) {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
		} else {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->like('nama_barang', $cari);
		}

		$data = array(
			'title' => 'Hasil Pencarian - Sapphire',
			'product'  => $produk->paginate(9),
			'category' => $this->product_view->query('Select * from kategori'),
			'pager' => $produk->pager

		);
		return  view('front/index', $data);
	}

	public function test()
	{
		return view('referensi/front-e-commerce');
	}
}

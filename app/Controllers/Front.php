<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Front\Product_view;
use App\Models\Front\UserModel;
use App\Models\Front\CartModel;

class Front extends BaseController
{

	public function __construct()
	{
		$this->product_view = new Product_view();
		$this->CartModel = new CartModel();
		$this->UserModel = new UserModel();
	}


	public function update_cart()
	{
		$id_barang = $this->request->getVar('id_barang');
		$id_cart = $this->request->getVar('id_cart');
		$jumlah = $this->request->getVar('jumlah');

		$save = $this->CartModel->updatecart($id_cart, $id_barang, $jumlah);
		if ($save) {
			return redirect()->to(base_url() . '/cart');
		}
	}

	public function hapus_cart($id_cart, $id_barang)
	{
		if (empty($id_cart) && empty($id_barang)) {
			return redirect()->to(base_url() . '/cart');
		}

		$cek_user = $this->CartModel->query("select * from cart where id_cart =$id_cart")->getrowarray();
		if ($cek_user['id_member'] != session()->get('user_id')) {
			return redirect()->to(base_url() . '/cart');
		}

		$this->CartModel->delete_cart($id_cart, $id_barang);
		return redirect()->to(base_url() . '/cart');
	}
	public function cart_detail()
	{
		if (!session()->get('login')) {
			return redirect()->to(base_url() . '/');
		}

		$data = array(
			'title' => 'Front - Sapphire',
			'cart' => 	$this->get_cart()['total'],
			'cart_d' => 	$this->get_cart()['detail'],
			'gambar' => 	$this->get_cart()['gambar'],
			// 'category' => $this->product_view->query('Select * from kategori'),
			// 'product'  => $produk->paginate(9),
			// 'pager' => $produk->pager
		);

		echo view('front/pages/cart_detail', $data);
	}

	public function get_cart()
	{

		if (session()->get('login')) {
			$cart['total'] = $this->product_view->get_cart_home(session()->get('user_id'));
			$cart['detail'] = [];
			if (count($cart['total']->getresultarray()) > 0) {
				$cart['total'] = $cart['total']->getrowarray();
				$cart['detail'] = $this->product_view->get_cart_home_detail(session()->get('user_id'))->getresultarray();
			}
			$cart['gambar'] = $this->product_view->query('select * from gambar group by id_barang')->getresultarray();
		} else {
			$cart['total'] = "";
			$cart['detail'] = [];
			$cart['gambar'] = "";
		}

		return $cart;
	}


	public function index($kategori = "")
	{

		if (empty($kategori)) {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->join('kategori', 'barang.id_kategori= kategori.id_kategori');
		} else {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->join('kategori', 'barang.id_kategori= kategori.id_kategori')->where('slug_kategori', $kategori);
		}


		$data = array(
			'title' => 'Front - Sapphire',
			'cart' => 	$this->get_cart()['total'],
			'cart_d' => 	$this->get_cart()['detail'],
			'gambar' => 	$this->get_cart()['gambar'],
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
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
			$nama = "Semua Produk";
		} else {
			$produk = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left')->where('slug_kategori', $kategori);
			$nama = $ambil['nama_kategori'];
		}

		$data = array(
			'title' => 'All Products',
			'name' => $nama,
			// 'slug_barang' => $ambil['slug_barang'],
			'slug_category' => $ambil['slug_kategori'],
			// 'product'  => $model->get_product_list($kategori)->getResult(),
			'cart' => 	$this->get_cart()['total'],
			'cart_d' => 	$this->get_cart()['detail'],
			'gambar' => 	$this->get_cart()['gambar'],
			'category' => $model->query('Select * from kategori')->getResultArray(),
			'product'  => $produk->paginate(9),
			'pager' => $produk->pager
		);
		// dd($produk);
		// dd($data['tes']);
		echo view('front/pages/all_products', $data);
	}

	public function tambahcart()
	{
		$id_barang = $this->request->getVar('id_barang');
		$jumlah	= $this->request->getVar('jumlah_barang');


		$data = array(
			'sukses' => $this->CartModel->tampilcart($id_barang, $jumlah)
		);



		echo json_encode($data);
	}

	public function show_product($kategori = "", $product_id)
	{
		$model = new Product_view();
		$ambil = $model->get_product_detail($kategori, $product_id)->getRowArray();
		$data = array(
			'title' => 'Product',
			'id' =>  $ambil['id_barang'],
			'name' =>  $ambil['nama_barang'],
			'other_name' => $ambil['nama_lain'],
			'price' => $ambil['harga_barang'],
			'cart' => 	$this->get_cart()['total'],
			'cart_d' => 	$this->get_cart()['detail'],
			'gambar' => 	$this->get_cart()['gambar'],
			'description' => $ambil['deskripsi'],
			'slug_category' => $ambil['slug_kategori'],
			'category' => $ambil['nama_kategori'],
			'link_img' => $ambil['link_gambar'],
			'related_product' => $model->get_product_list($ambil['slug_kategori'])->getResultArray()
		);
		// $related_product = $this->product_view->join('gambar', 'gambar.id_barang = barang.id_barang', 'left')->where('id_kategori', $kategori);
		// $related_product = $model->get_product_list()->where('id_kategori', $kategori);
		// dd($data['category']);
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
			'cart' => 	$this->get_cart()['total'],
			'cart_d' => 	$this->get_cart()['detail'],
			'gambar' => 	$this->get_cart()['gambar'],
			'category' => $this->product_view->query('Select * from kategori'),
			'pager' => $produk->pager

		);
		return  view('front/index', $data);
	}

	public function konsultasi()
	{
		$data = array(
			'title' => 'Phicos | Konsultasi',
			'cart' => 	$this->get_cart()['total'],
			'cart_d' => 	$this->get_cart()['detail'],
			'gambar' => 	$this->get_cart()['gambar'],


		);
		return  view('front/pages/konsul', $data);
	}

	public function checkout()
	{
		if (!session()->get('login')) {
			return redirect()->to(base_url() . '/');
		}

		$data = array(
			'title' => 'Phicos | Checkout',
			'cart' => $this->get_cart()['total'],
			'cart_d' => $this->get_cart()['detail'],
			'gambar' => $this->get_cart()['gambar'],
			'bio' => $this->UserModel->query('select * from member where id_member =' . session()->get('user_id'))->getrowarray(),
            'provinsi' => $this->UserModel->query('select * from wilayah_provinsi order by nama asc')->getresultarray(),
            'kota' => $this->UserModel->query('select * from wilayah_kabupaten order by nama asc')->getresultarray(),
            'kecamatan' => $this->UserModel->query('select * from wilayah_kecamatan order by nama asc')->getresultarray(),
		);

		return view('front/pages/checkout', $data);
	}

	public function checkout_save() {
		if (!$this->validate([
            'input_user_id'  => 'required',
            'input_alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'input_kodepos' => 'required',
            'input_phone' => 'required',

        ])) {
            session()->setflashdata('pesan', 'Data yang anda isi belum lengkap');
            return redirect()->to(base_url() . '/checkout')->withInput();
		}
		
		$data = [
            'id_member' => $this->request->getVar('input_user_id'),
            'alamat' => $this->request->getVar('input_alamat'),
            'nama_instansi' => $this->request->getVar('input_perusahaan'),
            'id_provinsi' => $this->request->getVar('provinsi'),
            'id_kabupaten' => $this->request->getVar('kota'),
            'id_kecamatan' => $this->request->getVar('kecamatan'),
            'kodepos' => $this->request->getVar('input_kodepos'),
            'telp' => $this->request->getVar('input_phone')
		];
		// dd($data);
		$this->UserModel->save($data);
        return redirect()->to(base_url() . '/checkout');
	}

	public function test()
	{
		return view('referensi/front-e-commerce');
	}
}

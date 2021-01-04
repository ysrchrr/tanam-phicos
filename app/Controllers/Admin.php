<?php

namespace App\Controllers;

use App\Models\TestModel;
use App\Models\AdminModel;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->barang = new AdminModel();
	}

	public function index(){
		$data = array(
			'title' => "Admin Panel"
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/content');
		echo view('admin/footer');
	}

	public function kelola(){
		$data = array(
			'title' => "Admin Panel",
			'barang' => $this->barang->get_all_barang(),
			'kategori' => $this->barang->getSubKategori()
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/kelola');
		echo view('admin/footer');
	}

	public function book_add() {
        $data = array(
            'nama_barang' => $this->request->getPost('nama_barang'),
            'nama_lain' => $this->request->getPost('nama_lain'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga_barang' => $this->request->getPost('harga_barang'),
			'stok_barang' => $this->request->getPost('stok_barang'),
			'deskripsi' => $this->request->getPost('deskripsi')
		);
		// print_r($data);
        $insert = $this->barang->book_add($data);
        echo json_encode(array("status" => TRUE));
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
	

}

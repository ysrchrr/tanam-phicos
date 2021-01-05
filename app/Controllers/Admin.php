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
			'title' => "Kelola Barang",
			'barang' => $this->barang->get_all_barang(),
			'kategori' => $this->barang->getSubKategori()
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/kelola');
		echo view('admin/footer');
	}

	public function kategori(){
		$data = array(
			'title' => "Kelola Kategori",
			'barang' => $this->barang->get_all_barang(),
			'kategori' => $this->barang->getSubKategori()
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/kategori');
		echo view('admin/footer');
	}

	public function tampilkanBarang(){
        $tampilBarang = $this->barang->dotampilkanBarang();
        echo json_encode($tampilBarang);
	}
	
	public function tampilkanKategori(){
		$tampilKategori = $this->barang->dotampilkanKategori();
		echo json_encode($tampilKategori);
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
	
	public function newKategori(){
		$nama = $this->request->getPost('nama_kategori');
        $data = $this->barang->donewKategori($nama);
        echo json_encode($data);
    }

	public function test(){
		return view('referensi/admin-e-commerce');
	}

	public function tes_aja(){
		$a = $this->TestModel->query('select * from admin')->getresultarray();
		dd($a);
	}
	
	public function detailBarang(){
		$id_barang = $this->request->getVar('id_barang');
		// print_r($_POST);
		$data = $this->barang->dodetailBarang($id_barang);
        echo json_encode($data);
	}

	public function detailKategori(){
		$id_kategori = $this->request->getVar('id_kategori');
		// print_r($_POST);
		$data = $this->barang->dodetailKategori($id_kategori);
        echo json_encode($data);
	}

	public function updateBarang(){
		$id_barang = $this->request->getVar('id_barang');
		$id_kategori = $this->request->getVar('id_kategori');
		$nama_barang = $this->request->getVar('nama_barang');
		$nama_lain = $this->request->getVar('nama_lain');
		$harga_barang = $this->request->getVar('harga_barang');
		$stok_barang = $this->request->getVar('stok_barang');
		$deskripsi = $this->request->getVar('deskripsi');
        // print_r($_POST);
        $data = $this->barang->doupdateRecord($id_barang, $id_kategori, $nama_barang, $nama_lain, $harga_barang, $stok_barang, $deskripsi);
        echo json_encode($data);
	}

	public function updateKategori(){
		$id_kategori = $this->request->getVar('id_kategori');
		$nama_kategori = $this->request->getVar('nama_kategori');
        // print_r($_POST);
        $data = $this->barang->doupdateKategori($id_kategori, $nama_kategori);
        echo json_encode($data);
	}

	public function deleteRecord(){
		$id = $this->request->getVar('kode');
        $data = $this->barang->dodeleteRecord($id);
        echo json_encode($data);
	}
	
	public function deleteKategori(){
		$id = $this->request->getVar('kode');
		// print_r($_POST);
        $data = $this->barang->dodeleteKategori($id);
        echo json_encode($data);
	}
}

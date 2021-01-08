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

	public function index()
	{
		$data = array(
			'title' => "Admin Panel",
			'summary' => $this->barang->summary(),
			'terlaris' => $this->barang->laris()->getresultarray(),
			'terjual' => $this->barang->terjual()->getresultarray(),

		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/content');
		echo view('admin/footer');
	}

	public function kelola()
	{
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

	public function kategori()
	{
		$data = array(
			'title' => "Kelola Kategori"
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/kategori');
		echo view('admin/footer');
	}

	public function blog()
	{
		$data = array(
			'title' => "Kelola Blog"
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/blogmgmt');
		echo view('admin/footer');
	}

	public function newpost()
	{
		$data = array(
			'title' => "Tulis postingan"
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/new-post');
		echo view('admin/footer');
	}

	public function showpost()
	{
		$id_blog = $this->request->getVar('id_blog');
		$data = array(
			'title' => 'Edit Post',
			'id_blog' => $this->barang->detailPost($id_blog)
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/edit-post');
		echo view('admin/footer');
	}

	public function tampilkanBarang()
	{
		$tampilBarang = $this->barang->dotampilkanBarang();
		echo json_encode($tampilBarang);
	}

	public function tampilkanKategori()
	{
		$tampilKategori = $this->barang->dotampilkanKategori();
		echo json_encode($tampilKategori);
	}

	public function tampilkanBlog()
	{
		$tampilBlog = $this->barang->dotampilkanBlog();
		echo json_encode($tampilBlog);
	}

	public function book_add()
	{
		$data = array(
			'nama_barang' => $this->request->getPost('nama_barang'),
			'nama_lain' => $this->request->getPost('nama_lain'),
			'id_kategori' => $this->request->getPost('id_kategori'),
			'harga_barang' => $this->request->getPost('harga_barang'),
			'stok_barang' => $this->request->getPost('stok_barang'),
			'deskripsi' => $this->request->getPost('deskripsi')
		);
		$insert = $this->barang->book_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function newKategori()
	{
		$nama = $this->request->getPost('nama_kategori');
		$data = $this->barang->donewKategori($nama);
		echo json_encode($data);
	}

	public function newBlog()
	{
		$judul = $this->request->getPost('judul');
		$isi = $this->request->getPost('isi');
		$today = $this->request->getPost('tanggal');
		$data = $this->barang->donewBlog($judul, $isi, $today);
		echo json_encode($data);
	}

	public function detailBarang()
	{
		$id_barang = $this->request->getVar('id_barang');
		$data = $this->barang->dodetailBarang($id_barang);
		echo json_encode($data);
	}

	public function detailKategori()
	{
		$id_kategori = $this->request->getVar('id_kategori');
		$data = $this->barang->dodetailKategori($id_kategori);
		echo json_encode($data);
	}

	public function updateBarang()
	{
		$id_barang = $this->request->getVar('id_barang');
		$id_kategori = $this->request->getVar('id_kategori');
		$nama_barang = $this->request->getVar('nama_barang');
		$nama_lain = $this->request->getVar('nama_lain');
		$harga_barang = $this->request->getVar('harga_barang');
		$stok_barang = $this->request->getVar('stok_barang');
		$deskripsi = $this->request->getVar('deskripsi');
		$data = $this->barang->doupdateRecord($id_barang, $id_kategori, $nama_barang, $nama_lain, $harga_barang, $stok_barang, $deskripsi);
		echo json_encode($data);
	}

	public function updateKategori()
	{
		$id_kategori = $this->request->getVar('id_kategori');
		$nama_kategori = $this->request->getVar('nama_kategori');
		$data = $this->barang->doupdateKategori($id_kategori, $nama_kategori);
		echo json_encode($data);
	}

	public function updateBlog()
	{
		$id = $this->request->getVar('id_blog');
		$judul = $this->request->getVar('judul_blog');
		$isi = $this->request->getVar('quillText');
		$tanggal = $this->request->getVar('today');
		print_r($_POST);
		// $data = $this->barang->doupdateBlog($id, $judul, $isi, $tanggal);
		// echo json_encode($data);
	}

	public function deleteRecord()
	{
		$id = $this->request->getVar('kode');
		$data = $this->barang->dodeleteRecord($id);
		echo json_encode($data);
	}

	public function deleteKategori()
	{
		$id = $this->request->getVar('kode');
		$data = $this->barang->dodeleteKategori($id);
		echo json_encode($data);
	}

	public function deleteBlog()
	{
		$id = $this->request->getVar('kode');
		$data = $this->barang->dodeleteBlog($id);
		echo json_encode($data);
	}

	public function myupload()
	{
		$this->load->library('upload'); //loading the library
		$imagePath = realpath(APPPATH . '../assets/images/carImages'); //this is your real path APPPATH means you are at the application folder
		$number_of_files_uploaded = count($_FILES['files']['name']);
		if ($number_of_files_uploaded > 5) { // checking how many images your user/client can upload
			$carImages['return'] = false;
			$carImages['message'] = "You can upload 5 Images";
			echo json_encode($carImages);
		} else {
			for ($i = 0; $i <  $number_of_files_uploaded; $i++) {
				$_FILES['userfile']['name']     = $_FILES['files']['name'][$i];
				$_FILES['userfile']['type']     = $_FILES['files']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['userfile']['error']    = $_FILES['files']['error'][$i];
				$_FILES['userfile']['size']     = $_FILES['files']['size'][$i];
				//configuration for upload your images
				$config = array(
					'file_name'     => random_string('alnum', 16),
					'allowed_types' => 'jpg|jpeg|png|gif',
					'max_size'      => 3000,
					'overwrite'     => FALSE,
					'upload_path'
					=> $imagePath
				);
				$this->upload->initialize($config);
				$errCount = 0; //counting errrs
				if (!$this->upload->do_upload()) {
					$error = array('error' => $this->upload->display_errors());
					$carImages[] = array(
						'errors' => $error
					); //saving arrors in the array
				} else {
					$filename = $this->upload->data();
					$carImages[] = array(
						'fileName' => $filename['file_name'],
						'watermark' => $this->createWatermark($filename['file_name'])
					);
				} //if file uploaded

			} //for loop ends here
			echo json_encode($carImages); //sending the data to the jquery/ajax or you can save the files name inside your database.
		} //else
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

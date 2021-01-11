<?php

namespace App\Controllers;

use App\Models\TestModel;
use App\Models\AdminModel;

class Admin extends BaseController
{
	public function __construct(){
		// helper('form');
		// helper('filesystem');
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

	public function member()
	{
		$data = array(
			'title' => "Kelola Member"
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/members');
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

	public function pesanan()
	{
		$data = array(
			'title' => "Kelola Pesanan"
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/order-list');
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

	public function tampilkanPesanan()
	{
		$tampilPesanan = $this->barang->dotampilkanPesanan();
		echo json_encode($tampilPesanan);
	}

	public function tampilkanMember()
	{
		$tampilMember = $this->barang->dotampilkanMember();
		echo json_encode($tampilMember);
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
		$nama = $this->request->getPost('nama_barang');
			$xslug = explode(" ", $nama);
			$yslug = implode("-", $xslug);
			$nslug = strtolower($yslug);
			$cekslug = $this->database->query("SELECT slug_barang FROM barang WHERE slug_barang = '$nslug'")->getRowArray();
			// var_dump($cekslug['slug']);
			if($cekslug['slug_barang'] == ''){
				$slug = $nslug;
				// echo $slug;
			} else{
				$zslug = $cekslug['slug_barang'] . '-2';
				$cekslugtwo = $this->database->query("SELECT slug_barang FROM barang WHERE slug_barang = '$zslug'")->getRowArray();
				if($cekslugtwo['slug_barang'] == ''){
					$slug = $zslug;
				} else {
					$slug = $zslug . '-2';
				}
			}
		$data = array(
			'nama_barang' => $this->request->getPost('nama_barang'),
			'nama_lain' => $this->request->getPost('nama_lain'),
			'id_kategori' => $this->request->getPost('id_kategori'),
			'harga_barang' => $this->request->getPost('harga_barang'),
			'stok_barang' => $this->request->getPost('stok_barang'),
			'deskripsi' => $this->request->getPost('deskripsi'),
			'slug_barang' => $slug
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
		$judul = $this->request->getPost('judul_blog');
			$xslug = explode(" ", $judul);
			$yslug = implode("-", $xslug);
			$nslug = strtolower($yslug);
			$cekslug = $this->database->query("SELECT slug FROM blog WHERE slug = '$nslug'")->getRowArray();
			// var_dump($cekslug['slug']);
			if($cekslug['slug'] == ''){
				$slug = $nslug;
				// echo $slug;
			} else{
				$zslug = $cekslug['slug'] . '-2';
				$cekslugtwo = $this->database->query("SELECT slug FROM blog WHERE slug = '$zslug'")->getRowArray();
				if($cekslugtwo['slug'] == ''){
					$slug = $zslug;
				} else {
					$slug = $zslug . '-2';
				}
			}
		$isi = $this->request->getPost('isi');
		$today = date('Y-m-d');
		if (empty($_FILES['gambar_blog']['name'])) {
			$gambar = '';
		} else {
			$img = $this->request->getFile('gambar_blog');
			$gambar = $img->getName();
			$img->move(ROOTPATH . 'public/gambar-blog', $gambar);
		}
        $data = $this->barang->donewBlog($judul, $isi, $today, $gambar, $slug);
		echo json_encode($data);
	}

	public function detailBarang()
	{
		$id_barang = $this->request->getVar('id_barang');
		$data = $this->barang->dodetailBarang($id_barang);
		echo json_encode($data);
	}

	public function detailMembers()
	{
		$id_member = $this->request->getVar('id_member');
		$data = $this->barang->dodetailMember($id_member);
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
		$id = $this->request->getPost('id_blog_e');
		$judul = $this->request->getPost('judul_blog_e');
		$isi = $this->request->getPost('isi');
		$today = date("Y-m-d");
		$xslug = explode(" ", $judul);
		$yslug = implode("-", $xslug);
		$nslug = strtolower($yslug);
		$cekslug = $this->database->query("SELECT slug FROM blog WHERE slug = '$nslug'")->getRowArray();
		// var_dump($cekslug['slug']);
		if($cekslug['slug'] == ''){
			$slug = $nslug;
			// echo $slug;
		} else{
			$zslug = $cekslug['slug'] . '-2';
			$cekslugtwo = $this->database->query("SELECT slug FROM blog WHERE slug = '$zslug'")->getRowArray();
			if($cekslugtwo['slug'] == ''){
				$slug = $zslug;
			} else {
				$slug = $zslug . '-2';
			}
		}
		if (empty($_FILES['gambar_blog']['name'])) {
			$cekgambar = $this->database->query("SELECT gambar_blog FROM blog WHERE id_blog = '$id'")->getRowArray();
			$gambar = $cekgambar['gambar_blog'];
		} else {
			$img = $this->request->getFile('gambar_blog');
			$gambar = $img->getName();
			$img->move(ROOTPATH . 'public/gambar-blog', $gambar);
		}
        $data = $this->barang->doupdateBlog($id, $judul, $isi, $today, $gambar, $slug);
        echo json_encode($data);
	}

	public function deleteRecord()
	{
		$id = $this->request->getVar('kode');
		$data = $this->barang->dodeleteRecord($id);
		echo json_encode($data);
	}

	public function deleteMember()
	{
		$id = $this->request->getVar('kode');
		// print_r($_POST);
		$data = $this->barang->dodeleteMember($id);
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

	public function delimg(){
		$id_blog = $this->request->getVar('id_blog');
		$del = $this->database->query("UPDATE blog SET gambar_blog = '' WHERE id_blog = '$id_blog'");
		$cekgambar = $this->database->query("SELECT gambar_blog FROM blog WHERE id_blog = '$id_blog'")->getRowArray();
		$gambar = $cekgambar['gambar_blog'];
		$path_to_file = ROOTPATH . 'public/gambar-blog' . $gambar;
		if(unlink($path_to_file)) {
			return redirect()->to('/Admin/showpost?id_blog=' . $id_blog);
		}
		else {
			echo 'errors occured';
		}
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

<?php

namespace App\Controllers;

use App\Models\TestModel;
use App\Models\AdminModel;

class Admin extends BaseController
{
	public function __construct(){
		$this->barang = new AdminModel();
	}

	public function login(){
		$data = array(
			'title' => "Login"
		);
		echo view('admin/login', $data);
	}

	function aksi_login(){
		$session = session();
		$username = $this->request->getPost('username');
		$password = md5($this->request->getPost('password'));
		// print_r($_POST);
		// echo ($username . " | " . $password);
		$ceklogin = $this->database->query("SELECT COUNT(id_admin) AS cek FROM `admin` WHERE username = '$username' AND `password` = '$password'")->getRowArray();
		// echo $username . " | " . $password . "<br/>";
		// echo $ceklogin['cek'];
		if($ceklogin['cek'] > 0){
			$data_session = array(
				'username' => $username,
				'logged_in' => TRUE
				);
			$session->set($data_session);
			return redirect()->to('/admin/index');
		}else{
			return redirect()->to('/admin/login?err=1');
		}
	}

	public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/admin/login');
    }

	public function index()
	{
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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

	public function account()
	{
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
		$data = array(
			'title' => "Pengaturan Akun"
		);
		echo view('admin/header', $data);
		echo view('admin/sidebar');
		echo view('admin/account');
		echo view('admin/footer');
	}

	public function kategori()
	{
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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
		if(! session()->get('logged_in')){
            return redirect()->to('/Admin/login'); 
        }
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
		helper(['form', 'url']);
		$imgdb = \Config\Database::connect();
		$udb = $imgdb->table('gambar');
		if ($this->request->getFileMultiple('images')) {
			foreach($this->request->getFileMultiple('images') as $file){   
				$file->move(ROOTPATH . '/public/gambar/');
				if(!$file){
					echo "error gabisa";
				}
				$barang_id = $this->imgdb->query("SELECT id_barang FROM barang ORDER BY id_barang DESC LIMIT 1")->getRowArray();
				$id = $barang_id['id_barang'];
				$data = [
					'id_barang' => $id,
					'link_gambar' => $file->getClientName()
					// 'name' =>  $file->getClientName(),
					// 'type'  => $file->getClientMimeType()
				];

				$save = $udb->insert($data);
			}
		} else{
			echo "error input ga kebaca";
		}
		$nama = $this->request->getPost('nama_barang');
			$xslug = explode(" ", $nama);
			$yslug = implode("-", $xslug);
			$nslug = strtolower($yslug);
			$cekslug = $this->database->query("SELECT slug_barang FROM barang WHERE slug_barang = '$nslug'")->getRowArray();
			// var_dump($cekslug['slug']);
			if($cekslug['slug_barang'] == ''){
				$slug = $nslug;
				// echo $slug;
			} else {
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
	
	public function detailPemesanan()
	{
		$id_Pemesanan = $this->request->getVar('id_pemesanan');
		$data = $this->barang->dodetailPemesanan($id_Pemesanan);
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

	public function updateAccount()
	{
		$id_admin = $this->request->getVar('id_admin');
		$nama = $this->request->getVar('nama_e');
		$uname = $this->request->getVar('username_e');
		$telp = $this->request->getVar('telp_e');
		$email = $this->request->getVar('email_e');
		// print_r($_POST);
		$this->barang->doupdateAccount($id_admin, $nama, $uname, $telp, $email);
		return redirect()->to('/Admin/account?id=' . $id_admin .'&change=profile');
	}

	public function updatePassword()
	{
		$id_admin = $this->request->getVar('id_admin');
		$oldPassword = $this->request->getVar('oldPassword');
		$newPassword = md5($this->request->getVar('newPassword'));
		$CnewPassword = $this->request->getVar('CnewPassword');
		// print_r($_POST);
		$this->barang->doupdatePassword($id_admin, $oldPassword, $newPassword);
		return redirect()->to('/Admin/account?id=' . $id_admin .'&change=password');
	}

	public function updateKategori()
	{
		$id_kategori = $this->request->getVar('id_kategori');
		$nama_kategori = $this->request->getVar('nama_kategori');
		$data = $this->barang->doupdateKategori($id_kategori, $nama_kategori);
		echo json_encode($data);
	}

	public function updatePemesanan()
	{
		$id_pemesanan = $this->request->getVar('id_pemesanan');
		$status = $this->request->getVar('status');
		$data = $this->barang->doupdatePemesanan($id_pemesanan, $status);
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

	public function deletePemesanan()
	{
		$id = $this->request->getVar('kode');
		$data = $this->barang->dodeletePemesanan($id);
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
		$cekgambar = $this->database->query("SELECT gambar_blog FROM blog WHERE id_blog = '$id_blog'")->getRowArray();
		$path_to_file = ROOTPATH . 'public\gambar-blog/' . $cekgambar['gambar_blog'];
		unlink($path_to_file);
		$this->database->query("UPDATE blog SET gambar_blog = '' WHERE id_blog = '$id_blog'");
		return redirect()->to('/Admin/showpost?id_blog=' . $id_blog);
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

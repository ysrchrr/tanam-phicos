<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'barang';
    
    // protected $allowedFields = ['id_barang', 'id_kategori', 'nama_barang', 'nama_lain', 'harga_barang', 'stok_barang', 'deskripsi', 'created_at', 'updated_at'];
    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function dotampilkanBarang(){
        $query = $this->db->query("SELECT * FROM barang ORDER BY id_barang");
        return $query->getResult();
    }

    public function dotampilkanKategori(){
        $query = $this->db->query("SELECT * FROM kategori ORDER BY nama_kategori");
        return $query->getResult();
    }

    public function dotampilkanBlog(){
        $query = $this->db->query("SELECT * FROM blog ORDER BY terakhir_diperbarui");
        return $query->getResult();
    }

    public function summary(){
        $query = $this->db->query("SELECT 
                                    (SELECT COUNT(id_barang) FROM barang) AS totalProduk,
                                    (SELECT COUNT(id_kategori) FROM kategori) AS totalKategori,
                                    (SELECT COUNT(id_pemesanan) FROM pemesanan) AS totalPesanan,
                                    (SELECT COUNT(id_member) FROM member) AS totalMember");
        return $query->getResult();
    }

    public function get_all_barang() {
        $query = $this->db->query('SELECT * FROM barang');
        return $query->getResultArray();
    }

    public function getBarang($id = false){
        if($id === false){
            return $this->table('barang')->get()->getResultArray();
        } else {
            return $this->table('barang')->where('id_barang', $id)->get()->getResultArray();
        }
    }

    public function book_add($data) {
        $query = $this->db->table('barang')->insert($data);
        return $this->db->insertID();
    }
    
    public function donewKategori($nama){
        $query = $this->db->query("INSERT INTO `kategori`(`nama_kategori`) VALUES ('$nama')");
        return $query;
    }

    public function donewBlog($judul, $isi, $today){
        $query = $this->db->query("INSERT INTO `blog`(`judul_blog`, `terakhir_diperbarui`, `isi_blog`) VALUES ('$judul', '$today', '$isi')");
        return $query;
    }
    
    public function getSubKategori(){
        $db = \Config\Database::connect();
        $builder = $db->table('kategori')->get();
        return $builder->getResultArray();
    }

    public function dodetailBarang($idne){
        $hsl = $this->db->query("SELECT * FROM barang WHERE id_barang = '$idne'");
        foreach ($hsl->getResult() as $data) {
            $hasil = array(
                'id_barang' => $data->id_barang,
                'nama_barang' => $data->nama_barang,
                'nama_lain' => $data->nama_lain,
                'harga_barang' => $data->harga_barang,
                'stok_barang' => $data->stok_barang,
                'deskripsi' => $data->deskripsi
            );
        }
		return $hasil;
    }

    public function dodetailKategori($id_kategori){
        $hsl = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
        foreach ($hsl->getResult() as $data) {
            $hasil = array(
                'id_kategori' => $data->id_kategori,
                'nama_kategori' => $data->nama_kategori
            );
        }
		return $hasil;
    }

    public function doupdateRecord($id_barang, $id_kategori, $nama_barang, $nama_lain, $harga_barang, $stok_barang, $deskripsi){
        $hasil = $this->db->query("UPDATE `barang` SET 
                                    `id_kategori` = '$id_kategori',
                                    `nama_barang` = '$nama_barang',
                                    `nama_lain` = '$nama_lain',
                                    `harga_barang` = '$harga_barang',
                                    `stok_barang` = '$stok_barang',
                                    `deskripsi` = '$deskripsi' 
                                    WHERE
                                    `id_barang` = '$id_barang'"
                                );
        return $hasil;
    }

    public function doupdateKategori($id_kategori, $nama_kategori){
        $hasil = $this->db->query("UPDATE `kategori` SET 
                                    `nama_kategori` = '$nama_kategori'
                                    WHERE
                                    `id_kategori` = '$id_kategori'"
                                );
        return $hasil;
    }

    public function dodeleteRecord($id){
        $hasil = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'");
		return $hasil;
    }
    
    public function dodeleteKategori($id){
        $hasil = $this->db->query("DELETE FROM kategori WHERE id_kategori = '$id'");
		return $hasil;
    }

    public function dodeleteBlog($id){
        $hasil = $this->db->query("DELETE FROM blog WHERE id_blog = '$id'");
		return $hasil;
    }

    public function detailPost($id_blog){
        $query = $this->db->query("SELECT * FROM blog WHERE id_blog = '$id_blog'");
        return $query;
    }

    public function doupdateBlog($id, $judul, $isi, $tanggal){
        // print_r($_POST);
        $query = $this->db->query("UPDATE `blog` SET 
                                    `judul_blog` = '$judul', 
                                    `terakhir_diperbarui` = '$tanggal', 
                                    `isi_blog` = '$isi' 
                                    WHERE `id_blog` = '$id'");
        // if($query){
        //     echo "yyyy";
        // } else {
        //     echo "nnnn";
        // }
        return $query;
    }
}
?>
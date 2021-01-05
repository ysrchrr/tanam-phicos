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

    public function get_all_barang() {
        //$query = $this->db->table('books');
        $query = $this->db->query('SELECT * FROM barang');
        //print_r($query->getResult());
        // $query = $this->db->get();
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
    
    public function getSubKategori(){
        $db = \Config\Database::connect();
        $builder = $db->table('kategori')->get();
        return $builder->getResultArray();
    }
}
?>
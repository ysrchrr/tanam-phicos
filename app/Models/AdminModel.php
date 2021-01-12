<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'barang';

    // protected $allowedFields = ['id_barang', 'id_kategori', 'nama_barang', 'nama_lain', 'harga_barang', 'stok_barang', 'deskripsi', 'created_at', 'updated_at'];
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function dotampilkanBarang()
    {
        $query = $this->db->query("SELECT
        barang.id_barang,
        barang.id_kategori,
        barang.nama_barang,
        barang.nama_lain,
        barang.harga_barang,
        barang.stok_barang,
        barang.deskripsi,
        gambar.link_gambar 
    FROM
        barang
        JOIN gambar ON gambar.id_barang = barang.id_barang");
        return $query->getResult();
    }

    public function dotampilkanMember()
    {
        $query = $this->db->query("SELECT * FROM member ORDER BY nama");
        return $query->getResult();
    }
    
    public function dotampilkanPesanan()
    {
        $query = $this->db->query("SELECT DISTINCT
        pemesanan.id_pemesanan,
        member.nama,
        pemesanan.total,
        pemesanan.tgl_pesan,
        pemesanan.status_pemesanan
    FROM
        pemesanan
    JOIN member on member.id_member = pemesanan.id_member");
        return $query->getResult();
    }

    public function dotampilkanKategori()
    {
        $query = $this->db->query("SELECT * FROM kategori ORDER BY nama_kategori");
        return $query->getResult();
    }

    public function dotampilkanBlog()
    {
        $query = $this->db->query("SELECT * FROM blog ORDER BY terakhir_diperbarui");
        return $query->getResult();
    }

    public function summary()
    {
        $query = $this->db->query("SELECT 
                                    (SELECT COUNT(id_barang) FROM barang) AS totalProduk,
                                    (SELECT COUNT(id_kategori) FROM kategori) AS totalKategori,
                                    (SELECT COUNT(id_pemesanan) FROM pemesanan) AS totalPesanan,
                                    (SELECT COUNT(id_member) FROM member) AS totalMember");
        return $query->getResult();
    }

    public function get_all_barang()
    {
        $query = $this->db->query('SELECT * FROM barang');
        return $query->getResultArray();
    }

    public function getBarang($id = false)
    {
        if ($id === false) {
            return $this->table('barang')->get()->getResultArray();
        } else {
            return $this->table('barang')->where('id_barang', $id)->get()->getResultArray();
        }
    }

    public function book_add($data)
    {
        $query = $this->db->table('barang')->insert($data);
        return $this->db->insertID();
    }

    public function donewKategori($nama)
    {
        $query = $this->db->query("INSERT INTO `kategori`(`nama_kategori`) VALUES ('$nama')");
        return $query;
    }

    public function donewBlog($judul, $isi, $today, $gambar, $slug)
    {
        $query = $this->db->query("INSERT INTO `blog`(`judul_blog`, `terakhir_diperbarui`, `isi_blog`, `gambar_blog`, `slug`) VALUES ('$judul', '$today', '$isi', '$gambar', '$slug')");
        return $query;
    }

    public function getSubKategori()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kategori')->get();
        return $builder->getResultArray();
    }

    public function dodetailBarang($idne)
    {
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
    
    public function dodetailPemesanan($id_Pemesanan)
    {
        $hsl = $this->db->query("SELECT
                                    pemesanan.id_pemesanan,
                                    member.nama,
                                    pemesanan.resi,
                                    pemesanan.total,
                                    pemesanan.tgl_pesan,
                                    pemesanan.status_pemesanan
                                FROM
                                    pemesanan
                                JOIN member on member.id_member = pemesanan.id_member
                                WHERE pemesanan.id_pemesanan = '$id_Pemesanan'");
        foreach ($hsl->getResult() as $data) {
            $hasil = array(
                'id_pemesanan' => $data->id_pemesanan,
                'nama' => $data->nama,
                'resi' => $data->resi,
                'total' => $data->total,
                'tgl_pesan' => $data->tgl_pesan,
                'status_pemesanan' => $data->status_pemesanan
            );
        }
        return $hasil;
    }

    public function dodetailMember($id_member)
    {
        $hsl = $this->db->query("SELECT * FROM member WHERE id_member = '$id_member'");
        foreach ($hsl->getResult() as $data) {
            $hasil = array(
                'id_member' => $data->id_member,
                'nama' => $data->nama,
                'username' => $data->username,
                'email' => $data->email,
                'alamat' => $data->alamat
            );
        }
        return $hasil;
    }

    public function dodetailKategori($id_kategori)
    {
        $hsl = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
        foreach ($hsl->getResult() as $data) {
            $hasil = array(
                'id_kategori' => $data->id_kategori,
                'nama_kategori' => $data->nama_kategori
            );
        }
        return $hasil;
    }

    public function doupdateRecord($id_barang, $id_kategori, $nama_barang, $nama_lain, $harga_barang, $stok_barang, $deskripsi)
    {
        $hasil = $this->db->query(
            "UPDATE `barang` SET 
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

    public function doupdateKategori($id_kategori, $nama_kategori)
    {
        $hasil = $this->db->query(
            "UPDATE `kategori` SET 
                                    `nama_kategori` = '$nama_kategori'
                                    WHERE
                                    `id_kategori` = '$id_kategori'"
        );
        return $hasil;
    }

    public function doupdatePemesanan($id_pemesanan, $status)
    {
        $hasil = $this->db->query(
            "UPDATE `pemesanan` SET `status_pemesanan` = '$status' WHERE `id_pemesanan` = '$id_pemesanan'"
        );
        return $hasil;
    }

    public function dodeleteRecord($id)
    {
        $hasil = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'");
        return $hasil;
    }

    public function dodeleteMember($id)
    {
        $hasil = $this->db->query("DELETE FROM member WHERE id_member = '$id'");
        return $hasil;
    }

    public function dodeletePemesanan($id)
    {
        $hasil = $this->db->query("DELETE FROM pemesanan WHERE id_pemesanan = '$id'");
        return $hasil;
    }

    public function dodeleteKategori($id)
    {
        $hasil = $this->db->query("DELETE FROM kategori WHERE id_kategori = '$id'");
        return $hasil;
    }

    public function dodeleteBlog($id)
    {
        $hasil = $this->db->query("DELETE FROM blog WHERE id_blog = '$id'");
        return $hasil;
    }

    public function detailPost($id_blog)
    {
        $query = $this->db->query("SELECT * FROM blog WHERE id_blog = '$id_blog'");
        return $query;
    }

    public function doupdateBlog($id, $judul, $isi, $today, $gambar, $slug)
    {
        // print_r($_POST);
        $query = $this->db->query("UPDATE `blog` SET 
                                    `judul_blog` = '$judul', 
                                    `terakhir_diperbarui` = '$today', 
                                    `isi_blog` = '$isi',
                                    `gambar_blog` = '$gambar',
                                    `slug` = '$slug'
                                    WHERE `id_blog` = '$id'");
        return $query;
    }

    public function laris()
    {
        $query = 'SELECT
        barang.nama_barang as nama,
        sum(pemesanan_detail.jumlah_barang) as total,
        barang.stok_barang as stok,
        gambar.link_gambar as link
    FROM
        barang,
        pemesanan,
        pemesanan_detail,
        gambar
        
    WHERE
        pemesanan.id_pemesanan = pemesanan_detail.id_pemesanan 
        and pemesanan_detail.id_barang = barang.id_barang
        and pemesanan_detail.id_barang = gambar.id_barang
        GROUP BY pemesanan_detail.id_barang
        ORDER BY total desc
        limit 3';

        return $this->query($query);
    }

    public function terjual()
    {
        $query = 'SELECT
        barang.nama_barang as nama,
        sum(pemesanan_detail.jumlah_barang) as total,
        gambar.link_gambar as link,
        barang.stok_barang as stok
    FROM
        barang,
        pemesanan,
        pemesanan_detail,
        gambar
        
    WHERE
        pemesanan.id_pemesanan = pemesanan_detail.id_pemesanan 
        and pemesanan_detail.id_barang = barang.id_barang
        and pemesanan_detail.id_barang = gambar.id_barang
        AND year(pemesanan.tgl_pesan) = YEAR(CURDATE())
        and MONTH(pemesanan.tgl_pesan) = MONTH(CURDATE())
        and DAY(pemesanan.tgl_pesan)  = DAY(CURDATE())
        GROUP BY pemesanan_detail.id_barang
        ORDER BY total desc
    ';

        return $this->query($query);
    }
}

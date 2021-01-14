<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $useTimestamps = true;
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = ['id_pemesanan', 'id_member', 'jumlah', 'total', 'tgl_pesan', 'notes'];

    // public function save($data) {
    //     $query = $this->db->table('pemesanan')->insert($data);
    //     return $query;
    // }
    
    // public function delete($id) {
    //     $data = $this->db->table('pemesanan')->delete(array('id_pemesanan' => $id));
    //     return $data;
    // }
}

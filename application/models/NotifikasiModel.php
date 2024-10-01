<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiModel extends GLOBAL_Model {

    public function __construct() {
        parent::__construct();
    }

    // Function to get notifications based on user role
    public function get_notifications_by_role($role) {
        // Example query; adjust according to your database structure
        $this->db->where('role', $role);
        $query = $this->db->get('tb_notifikasi');
        return $query->result_array();
    }

    public function get_barang_stok_rendah($limit = 10)
    {
        $this->db->where('stok <=', 10);
        return $this->db->get('tb_barang', $limit)->result();
    }

    public function get_pinjaman_menunggu()
    {
        $this->db->select('tb_pengajuan.*, tb_pengguna.username');
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_pengguna', 'tb_pengajuan.user_id = tb_pengguna.pengguna_id');
        $this->db->where('tb_pengajuan.status', 'Menunggu Persetujuan');
        return $this->db->get()->result();
    }
}
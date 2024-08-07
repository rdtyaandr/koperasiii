<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiModel extends GLOBAL_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan notifikasi berdasarkan pengguna_id
    public function get_notifikasi($pengguna_id) {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('tb_notifikasi')->result();
    }

    // Fungsi untuk menandai notifikasi sebagai dibaca
    public function tandai_dibaca($id, $pengguna_id) {
        $this->db->where('id', $id);
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->update('tb_notifikasi', ['status' => 'dibaca']);
    }

    // Fungsi untuk menambah notifikasi
    public function tambah_notifikasi($data) {
        return $this->db->insert('tb_notifikasi', $data);
    }

    // Fungsi untuk mengecek notifikasi stok rendah
    public function cek_notifikasi_stok_rendah($barang_id) {
        $this->db->where('tipe', 'stok_rendah');
        $this->db->where('barang_id', $barang_id);
        return $this->db->get('tb_notifikasi')->num_rows() > 0;
    }

    // Fungsi untuk mengecek notifikasi limit kredit
    public function cek_notifikasi_limit_kredit($pengguna_id) {
        $this->db->where('tipe', 'limit_kredit');
        $this->db->where('pengguna_id', $pengguna_id);
        return $this->db->get('tb_notifikasi')->num_rows() > 0;
    }
    public function countUnreadNotifikasi($pengguna_id) {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->where('status', 'unread'); // Menyaring notifikasi yang belum dibaca
        return $this->db->count_all_results('tb_notifikasi');
    }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiModel extends GLOBAL_Model {

    // Mendapatkan semua notifikasi untuk pengguna tertentu
    public function get_notifikasi($pengguna_id) {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('notifikasi');
        return $query->result_array();
    }

    // Menandai notifikasi sebagai dibaca untuk pengguna tertentu
    public function tandai_dibaca($id, $pengguna_id) {
        $this->db->where('id', $id);
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->update('notifikasi', array('status' => 'dibaca'));
    }
}
?>

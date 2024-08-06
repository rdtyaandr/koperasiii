<?php

class NotifikasiModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Metode untuk menambah notifikasi
    public function tambah_notifikasi($data)
    {
        $this->db->insert('notifikasi', $data);
        return $this->db->affected_rows();
    }

    // Metode untuk mengambil notifikasi berdasarkan pengguna
    public function ambil_notifikasi($pengguna_id)
    {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('notifikasi')->result_array();
    }
}
?>

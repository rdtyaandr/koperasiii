<?php

class NotifikasiModel extends GLOBAL_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function tambah($data)
    {
        return parent::insert_with_status('tb_notifikasi', $data);
    }

    public function lihat_semua()
    {
        return parent::get_array_of_table('tb_notifikasi');
    }

    public function ubah_status($id, $status)
    {
        $data = array('status' => $status);
        return parent::update_table_with_status('tb_notifikasi', 'id', $id, $data);
    }

    public function get_barang_stok_rendah($limit = 10)
    {
        $this->db->where('stok <=', 10);
        return $this->db->get('tb_barang', $limit)->result();
    }

    public function get_pinjaman_menunggu()
    {
        $this->db->where('status', 'Menunggu Persetujuan');
        return $this->db->get('tb_pengajuan')->result();
    }
}
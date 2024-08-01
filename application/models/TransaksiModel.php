<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk menyimpan transaksi utama
    public function insert_transaksi($data)
    {
        $this->db->insert('tb_transaksi', $data);
        return $this->db->insert_id(); // Mengembalikan ID transaksi yang baru disimpan
    }

    // Fungsi untuk menyimpan detail transaksi
    public function insert_transaksi_detail($data)
    {
        $this->db->insert_batch('tb_detransaksi', $data);
    }

    // Fungsi untuk mendapatkan semua transaksi
    public function get_all_transaksi()
    {
        return $this->db->get('tb_transaksi')->result();
    }

    // Fungsi untuk mendapatkan detail transaksi berdasarkan ID transaksi
    public function get_transaksi_detail($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('tb_detransaksi')->result();
    }

    // Fungsi untuk menghapus transaksi dan detailnya
    public function delete_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('tb_transaksi');

        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('tb_detransaksi');
    }
}
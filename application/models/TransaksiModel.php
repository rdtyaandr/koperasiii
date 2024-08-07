<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_transaksi($data)
    {
        $this->db->insert('tb_transaksi', $data);
        return $this->db->insert_id();
    }

    public function insert_transaksi_detail($data)
    {
        $this->db->insert_batch('tb_detransaksi', $data);
    }

    public function get_all_transaksi()
    {
        $this->db->select('t.*, p.username');
        $this->db->from('tb_transaksi t');
        $this->db->join('tb_pengguna p', 't.pengguna_id = p.pengguna_id');
        return $this->db->get()->result(); // Mengembalikan data sebagai objek
    }

    public function get_transaksi_detail($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('tb_detransaksi')->result();
    }

    // Fungsi untuk mendapatkan transaksi berdasarkan ID
    public function get_transaksi_by_id($id_transaksi)
    {
        $this->db->select('t.*, p.nama_lengkap');
        $this->db->from('tb_transaksi t');
        $this->db->join('tb_pengguna p', 't.pengguna_id = p.pengguna_id');
        $this->db->where('t.id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    // Fungsi untuk mendapatkan detail barang berdasarkan ID transaksi
    public function get_detail_barang_by_transaksi_id($id_transaksi)
    {
        $this->db->select('db.*, b.nama_barang');
        $this->db->from('tb_detransaksi db');
        $this->db->join('tb_barang b', 'db.id_barang = b.id_barang');
        $this->db->where('db.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }

    public function update_detail_barang($id_transaksi, $data)
    {
        // Delete old details
        $this->db->delete('tb_detransaksi', ['id_transaksi' => $id_transaksi]);

        // Insert new details
        return $this->db->insert_batch('tb_detransaksi', $data);
    }
    
    // Fungsi untuk memperbarui transaksi
    public function update_transaksi($id_transaksi, $data)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('tb_transaksi', $data);
    }

    // Fungsi untuk menghapus detail transaksi
    public function delete_detail_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('tb_detransaksi');
    }

    public function delete_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('tb_transaksi');

        $this->delete_detail_transaksi($id_transaksi);
    }
    public function check_credit_limit_and_notify()
{
    $limit = 5000000; // Limit kredit
    $this->db->select('t.*, p.username');
    $this->db->from('tb_transaksi t');
    $this->db->join('tb_pengguna p', 't.pengguna_id = p.pengguna_id');
    $this->db->where('t.status', 'Kredit');
    $this->db->having('SUM(t.jumlah) >', $limit);
    $this->db->group_by('t.pengguna_id');
    $query = $this->db->get();
    $transaksi_list = $query->result_array();

    foreach ($transaksi_list as $transaksi) {
        // Menambahkan notifikasi   
        $data = [
            'pengguna_id' => $transaksi['pengguna_id'],
            'pesan' => 'Limit kredit pengguna ' . $transaksi['username'] . ' telah mencapai batas. Harap lakukan tindakan yang diperlukan.',
            'status' => 'belum_dibaca',
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('notifikasi', $data);
    }
}

}
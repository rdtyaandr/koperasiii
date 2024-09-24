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
        $this->db->select('t.*, p.username, t.total as total_harga');
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

    // Fungsi untuk mengambil data transaksi berdasarkan pengguna_id
    public function get_transaksi_by_user_id($pengguna_id)
    {
        $this->db->select('t.*, p.username, t.created_at');
        $this->db->from('tb_transaksi t');
        $this->db->join('tb_pengguna p', 't.pengguna_id = p.pengguna_id');
        $this->db->where('t.pengguna_id', $pengguna_id);
        return $this->db->get()->result(); // Mengembalikan data sebagai objek
    }
}
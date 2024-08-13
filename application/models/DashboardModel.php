<?php
class Dashboardmodel extends GLOBAL_Model {

    public function get_sales_summary() {
        // Mengambil total penjualan per barang
        $this->db->select('b.nama_barang, SUM(d.total) as total_penjualan');
        $this->db->from('tb_detransaksi d');
        $this->db->join('tb_barang b', 'd.id_barang = b.id_barang');
        $this->db->group_by('d.id_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_members()
    {
        return $this->db->count_all('tb_pengguna'); // Ganti 'users' dengan nama tabel Anda
    }
    public function get_total_barang()
    {
        return $this->db->count_all('tb_barang'); // Ganti 'users' dengan nama tabel Anda
    }

    public function get_total_pengajuan()
    {
        return $this->db->count_all('tb_pengajuan'); // Ganti 'users' dengan nama tabel Anda
    }

    public function get_total_transactions() {
        // Mengambil total transaksi
        $this->db->select('SUM(total) as total_transaksi');
        $this->db->from('tb_transaksi');
        $query = $this->db->get();
        return $query->row()->total_transaksi;
    }

    public function get_total_pinjaman() {
        // Mengambil total pinjaman
        $this->db->select('SUM(pinjaman_total) as total_pinjaman');
        $this->db->from('tb_pinjaman');
        $query = $this->db->get();
        return $query->row()->total_pinjaman;
    }

}

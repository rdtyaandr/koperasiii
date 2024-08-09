<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends GLOBAL_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['transaksi_data'] = $this->DashboardModel->getTransaksiData();
        $this->load->view('dashboard/index', $data);
    }

    public function get_user_count()
    {
        return $this->db->count_all('tb_pengguna'); // Ganti 'users' dengan nama tabel Anda
    }

    public function get_order_count()
    {
        return $this->db->count_all('tb_transaksi'); // Ganti 'orders' dengan nama tabel Anda
    }
    // Mengambil total transaksi
    public function get_total_transactions()
    {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tb_transaksi'); // Ganti 'tb_transaksi' sesuai nama tabel Anda
        return $query->row()->total;
    }

    // Mengambil total anggota
    public function get_total_members()
    {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tb_anggota'); // Ganti 'tb_anggota' sesuai nama tabel Anda
        return $query->row()->total;
    }

    // Mengambil total barang
    public function get_total_items()
    {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tb_barang'); // Ganti 'tb_barang' sesuai nama tabel Anda
        return $query->row()->total;
    }


    public function get_monthly_transactions()
    {
        $this->db->select('MONTH(created_at) as month, COUNT(*) as total');
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get('tb_transaksi');
        $result = $query->result_array();

        // Inisialisasi array untuk bulan
        $monthly_data = array_fill(1, 12, 0);

        foreach ($result as $row) {
            $monthly_data[$row['month']] = $row['total'];
        }

        return $monthly_data;
    }


    // Mendapatkan data pinjaman bulanan
    public function get_monthly_loans()
    {
        $this->db->select('DATE_FORMAT(tanggal_pinjam, "%Y-%m") as month, SUM(jumlah_pinjaman) as total'); // Ambil bulan dan total pinjaman
        $this->db->group_by('month');
        $query = $this->db->get('tb_pengajuan');
        return $query->result_array();
    }

    // Tambahkan metode lainnya sesuai kebutuhan
    public function get_total_barang()
    {
        $this->db->select('COUNT(*) as total_barang'); // Menghitung jumlah barang
        $query = $this->db->get('tb_barang'); // Misalnya tabel barang
        return $query->row()->total_barang; // Mengembalikan jumlah barang
    }
    public function get_total_anggota()
    {
        $this->db->select('COUNT(*) as total_anggota'); // Menghitung jumlah anggota
        $query = $this->db->get('tb_anggota'); // Misalnya tabel anggota
        return $query->row()->total_anggota; // Mengembalikan jumlah anggota
    }
    public function get_total_pengajuan()
    {
        $this->db->select('COUNT(*) as total_pengajuan'); // Menghitung jumlah anggota
        $query = $this->db->get('tb_pengajuan'); // Misalnya tabel anggota
        return $query->row()->total_pengajuan; // Mengembalikan jumlah anggota
    }

    public function get_items_by_category()
    {
        $this->db->select('tb_kategori.id_kategori, tb_kategori.nama_kategori, COUNT(tb_barang.id_barang) as total'); // Ambil nama_kategori dari tb_kategori
        $this->db->from('tb_kategori'); // Mulai dari tb_kategori
        $this->db->join('tb_barang', 'tb_barang.id_kategori = tb_kategori.id_kategori', 'left'); // Gunakan left join untuk menampilkan semua kategori
        $this->db->group_by('tb_kategori.id_kategori'); // Group by id_kategori
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Mengambil data barang untuk grafik (misalnya)
    public function get_items_data()
    {
        $this->db->select('nama_barang, COUNT(*) as total'); // Ubah 'nama_barang' sesuai kebutuhan
        $this->db->group_by('nama_barang');
        $query = $this->db->get('tb_barang'); // Ganti 'tb_barang' sesuai nama tabel Anda
        return $query->result_array();
    }

    public function get_all_categories()
    {
        $this->db->select('id_kategori, nama_kategori');
        $query = $this->db->get('tb_kategori'); // Ambil semua kategori
        return $query->result_array();
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_count()
    {
        return $this->db->count_all('tb_pengguna');
    }

    public function get_order_count()
    {
        return $this->db->count_all('tb_transaksi');
    }

    public function get_total_transactions()
    {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tb_transaksi');
        return $query->row()->total;
    }

    public function get_total_members()
    {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tb_pengguna');
        return $query->row()->total;
    }

    public function get_total_items()
    {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tb_barang');
        return $query->row()->total;
    }

    public function get_monthly_transactions()
    {
        $currentYear = date('Y');
        $this->db->select('MONTH(created_at) as month, COUNT(*) as total');
        $this->db->where('YEAR(created_at)', $currentYear);
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get('tb_transaksi');
        $result = $query->result_array();

        $monthly_data = array_fill(1, 12, 0);

        foreach ($result as $row) {
            $monthly_data[$row['month']] = $row['total'];
        }

        return $monthly_data;
    }

    public function get_total_barang()
    {
        $this->db->select('COUNT(*) as total_barang');
        $query = $this->db->get('tb_barang');
        return $query->row()->total_barang;
    }

    public function get_total_anggota()
    {
        $this->db->select('COUNT(*) as total_anggota');
        $query = $this->db->get('tb_pengguna');
        return $query->row()->total_anggota;
    }

    public function get_total_pengajuan()
    {
        $this->db->select('COUNT(*) as total_pengajuan');
        $query = $this->db->get('tb_pengajuan');
        return $query->row()->total_pengajuan;
    }

    public function get_monthly_approved_loans()
    {
        $currentYear = date('Y');
        $this->db->select('MONTH(created_at) as month, COUNT(*) as total');
        $this->db->where('status', 'Telah Disetujui oleh Admin');
        $this->db->where('YEAR(created_at)', $currentYear);
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get('tb_pengajuan');
        $result = $query->result_array();

        $approved_data = array_fill(1, 12, 0);
        foreach ($result as $row) {
            $approved_data[$row['month']] = $row['total'];
        }
        return $approved_data;
    }

    public function get_monthly_pending_loans()
    {
        $currentYear = date('Y');
        $this->db->select('MONTH(created_at) as month, COUNT(*) as total');
        $this->db->where('status', 'Menunggu Persetujuan');
        $this->db->where('YEAR(created_at)', $currentYear);
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get('tb_pengajuan');
        $result = $query->result_array();

        $pending_data = array_fill(1, 12, 0);
        foreach ($result as $row) {
            $pending_data[$row['month']] = $row['total'];
        }
        return $pending_data;
    }

    public function get_monthly_rejected_loans()
    {
        $currentYear = date('Y');
        $this->db->select('MONTH(created_at) as month, COUNT(*) as total');
        $this->db->where('status', 'Dibatalkan oleh Admin');
        $this->db->where('YEAR(created_at)', $currentYear);
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get('tb_pengajuan');
        $result = $query->result_array();

        $rejected_data = array_fill(1, 12, 0);
        foreach ($result as $row) {
            $rejected_data[$row['month']] = $row['total'];
        }
        return $rejected_data;
    }

    public function get_total_stats() {
        $current_month = date('Y-m'); // Format bulan ini
        $last_month = date('Y-m', strtotime('-1 month')); // Format bulan lalu
        
        // Mengambil total barang, transaksi, anggota, dan pinjaman untuk bulan ini
        $this->db->select("
            (SELECT COUNT(*) FROM tb_barang WHERE DATE_FORMAT(created_at, '%Y-%m') = '$current_month') AS total_barang,
            (SELECT COUNT(*) FROM tb_transaksi WHERE DATE_FORMAT(created_at, '%Y-%m') = '$current_month') AS total_transaksi,
            (SELECT COUNT(*) FROM tb_pengguna WHERE DATE_FORMAT(pengguna_date_created, '%Y-%m') = '$current_month') AS total_anggota,
            (SELECT COUNT(*) FROM tb_pengajuan WHERE DATE_FORMAT(created_at, '%Y-%m') = '$current_month') AS total_pengajuan
        ");
        $current_stats = $this->db->get()->row_array();
        
        // Mengambil total barang, transaksi, anggota, dan pinjaman untuk bulan lalu
        $this->db->select("
            (SELECT COUNT(*) FROM tb_barang WHERE DATE_FORMAT(created_at, '%Y-%m') = '$last_month') AS total_barang_last_month,
            (SELECT COUNT(*) FROM tb_transaksi WHERE DATE_FORMAT(created_at, '%Y-%m') = '$last_month') AS total_transaksi_last_month,
            (SELECT COUNT(*) FROM tb_pengguna WHERE DATE_FORMAT(pengguna_date_created, '%Y-%m') = '$last_month') AS total_anggota_last_month,
            (SELECT COUNT(*) FROM tb_pengajuan WHERE DATE_FORMAT(created_at, '%Y-%m') = '$last_month') AS total_pengajuan_last_month
        ");
        $last_month_stats = $this->db->get()->row_array();
        
        // Menghitung perubahan dibandingkan bulan lalu
        $stats = [
            'total_barang' => isset($current_stats['total_barang']) ? $current_stats['total_barang'] : 0,
            'total_transaksi' => isset($current_stats['total_transaksi']) ? $current_stats['total_transaksi'] : 0,
            'total_anggota' => isset($current_stats['total_anggota']) ? $current_stats['total_anggota'] : 0,
            'total_pengajuan' => isset($current_stats['total_pengajuan']) ? $current_stats['total_pengajuan'] : 0,
            'change_barang' => isset($current_stats['total_barang']) && isset($last_month_stats['total_barang_last_month']) 
                                ? $current_stats['total_barang'] - $last_month_stats['total_barang_last_month'] : 0,
            'change_transaksi' => isset($current_stats['total_transaksi']) && isset($last_month_stats['total_transaksi_last_month']) 
                                ? $current_stats['total_transaksi'] - $last_month_stats['total_transaksi_last_month'] : 0,
            'change_anggota' => isset($current_stats['total_anggota']) && isset($last_month_stats['total_anggota_last_month']) 
                                ? $current_stats['total_anggota'] - $last_month_stats['total_anggota_last_month'] : 0,
            'change_pengajuan' => isset($current_stats['total_pengajuan']) && isset($last_month_stats['total_pengajuan_last_month']) 
                                ? $current_stats['total_pengajuan'] - $last_month_stats['total_pengajuan_last_month'] : 0,
        ];
        
        return $stats;
    }    
}

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
        $query = $this->db->get('tb_anggota');
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
        $query = $this->db->get('tb_anggota');
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
}

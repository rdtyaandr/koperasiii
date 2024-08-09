<?php
class DashboardController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel'); // Memuat model DashboardModel
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Analitik';
        $data['user_count'] = $this->DashboardModel->get_user_count();
        $data['order_count'] = $this->DashboardModel->get_order_count();
        $data['total_pengajuan'] = $this->DashboardModel->get_total_pengajuan();
        $data['transaksi'] = $this->DashboardModel->get_total_transactions(); // Ambil data transaksi
        $data['anggota'] = $this->DashboardModel->get_total_members(); // Ambil data anggota
        $data['monthly_transactions'] = $this->DashboardModel->get_monthly_transactions(); // Ambil data transaksi bulanan

        // Menghitung total penjualan dari data transaksi bulanan
        $data['total_penjualan'] = array_sum(array_column($data['monthly_transactions'], 'total')); // Total penjualan dari data transaksi bulanan

        // Menyusun data untuk grafik
        $data['monthly_data'] = array_values($data['monthly_transactions']); // Ambil nilai total transaksi per bulan

        $data['stats'] = [
            'total_barang' => $this->DashboardModel->get_total_barang(),
            'total_anggota' => $this->DashboardModel->get_total_anggota(),
            'total_transaksi' => $this->DashboardModel->get_total_transactions(),
            'total_pengajuan' => $this->DashboardModel->get_total_pengajuan(),
        ];

        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            parent::template('dashboard/user', $data);
        } else {
            parent::template('dashboard/index', $data);
        }
    }
}
<?php
class DashboardController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel'); // Memuat model DashboardModel
        $this->load->model('AnalyticsModel'); // Jika Anda juga menggunakan AnalyticsModel
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
    
        $data['title'] = 'Dashboard Analitik';
            // Mengambil data dari model
            $data['title'] = 'Dashboard Analitik';
            $data['user_count'] = $this->AnalyticsModel->get_user_count();
            $data['order_count'] = $this->AnalyticsModel->get_order_count();
            $data['total_pengajuan'] = $this->DashboardModel->get_total_pengajuan();
            $data['transaksi'] = $this->DashboardModel->get_total_transactions(); // Ambil data transaksi
    
        $data['sales_summary'] = $this->DashboardModel->get_sales_summary();
        $data['total_transactions'] = $this->AnalyticsModel->get_sales_total();
        $data['total_pinjaman'] = $this->DashboardModel->get_total_pinjaman();
        $data['barang'] = $this->AnalyticsModel->get_barang();
            // Mendapatkan data grafik

        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            parent::template('dashboard/user', $data);
        } else {
            parent::template('dashboard/index', $data);
        }

  

    }


    
}

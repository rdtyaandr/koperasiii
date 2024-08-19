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

        $data['approved_loans'] = array_values($this->DashboardModel->get_monthly_approved_loans()); // Ambil data pinjaman disetujui dan ubah ke array numerik
        $data['pending_loans'] = array_values($this->DashboardModel->get_monthly_pending_loans()); // Ambil data pinjaman menunggu dan ubah ke array numerik
        $data['rejected_loans'] = array_values($this->DashboardModel->get_monthly_rejected_loans()); // Ambil data pinjaman ditolak dan ubah ke array numerik

        // Kirim data ke view
        $data['approved_data'] = $data['approved_loans'];
        $data['pending_data'] = $data['pending_loans'];
        $data['rejected_data'] = $data['rejected_loans'];
        
        $data['statss'] = $this->DashboardModel->get_total_stats();

        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            parent::template('dashboard/user', $data);
        } else {
            parent::template('dashboard/index', $data);
        }
    }
}
<?php

class OperatorController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $this->load->model('AnalyticsModel');
    }

    public function index()
    {
        // Ambil data analitik
        $data['total_users'] = $this->AnalyticsModel->get_total_users();
        $data['total_transactions'] = $this->AnalyticsModel->get_total_transactions();
        $data['total_revenue'] = $this->AnalyticsModel->get_total_revenue();
        $data['monthly_data'] = $this->AnalyticsModel->get_monthly_data();
        
        // Set judul halaman
        $data['title'] = 'Dashboard Analitik - Sistem Koperasi Syariah';
        
        // Muat view dashboard
        parent::op_template('dashboard/index', $data);
    }
}
?>
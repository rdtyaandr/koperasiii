<?php

class HistoryController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('KategoriModel');
        $this->load->model('SatuanModel');
        $this->load->model('HistoryModel'); // Load model History
        $this->load->model('NotifikasiModel'); // Load model History
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }

        // Hapus pesan yang lebih dari 30 hari
        $this->HistoryModel->deleteOldMessages();
    }

    public function index()
    {
        $data['title'] = 'History';
        $data['notifikasi_count'] = $this->NotifikasiModel->countUnreadNotifikasi($this->session->userdata('pengguna_id'));
        
        // Ambil role pengguna dari session
        $role = $this->session->userdata('level');

        // Ambil pesan berdasarkan role
        if ($role === 'admin') {
            // Admin bisa melihat semua histori
            $data['messages'] = $this->HistoryModel->getRecentMessages();
        } elseif ($role === 'operator') {
            // Operator hanya bisa melihat histori operator
            $data['messages'] = $this->HistoryModel->getRecentMessagesByRole('operator');
        } else {
            // User tidak bisa melihat histori
            $data['messages'] = []; // Kosongkan histori untuk user
        }
        parent::template('history/index', $data);
    }
}
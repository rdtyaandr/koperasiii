<?php

class HistoryController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('KategoriModel');
        $this->load->model('SatuanModel');
        $this->load->model('HistoryModel'); 
        $this->load->helper('date'); 
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'History';
        
        // Ambil role pengguna dari session
        $role = $this->session->userdata('level');
        $pengguna_id = $this->session->userdata('pengguna_id');
        $username = $this->session->userdata('username');

        // Ambil pesan berdasarkan role
        if ($role === 'admin') {
            $data['messages'] = $this->HistoryModel->getRecentMessagesFiltered($pengguna_id);
        } elseif ($role === 'operator') {
            $data['messages'] = $this->HistoryModel->getRecentMessagesByRole('operator', $pengguna_id);
        } else {
            $data['messages'] = $this->HistoryModel->getRecentMessagesByRoleAndSummary($pengguna_id, $username);
        }
        parent::template('history/index', $data);
    }
}
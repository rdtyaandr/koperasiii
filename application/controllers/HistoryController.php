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
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'History';
        $data['messages'] = $this->HistoryModel->getMessages(); // Ambil pesan dari database

        if ($this->session->userdata('level') == 'admin') {
            parent::template('history/index', $data);
        } elseif ($this->session->userdata('level') == 'operator') {
            parent::op_template('history/index', $data);
        }
    }

    // Fungsi untuk menambahkan pesan
    private function addMessage($text, $summary, $icon)
    {
        $data = [
            'message_text' => $text,
            'message_summary' => $summary,
            'message_icon' => $icon,
            'message_date_time' => date('Y-m-d H:i:s')
        ];
        $this->HistoryModel->addMessage($data);
    }

    // Contoh penggunaan fungsi addMessage
    public function addItem()
    {
        // Logika untuk menambahkan item
        $this->addMessage('Anda menambahkan barang baru', 'Pembelian barang elektronik di toko XYZ', 'add_circle_outline');
    }
}
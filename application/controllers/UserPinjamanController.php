<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPinjamanController extends GLOBAL_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Pinjaman_model');
        $this->load->model('NotifikasiModel');

        // Pastikan user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $user_id = $this->session->userdata('pengguna_id');
        $data['notifikasi_count'] = $this->NotifikasiModel->countUnreadNotifikasi($this->session->userdata('pengguna_id'));
        $data['pengajuan'] = $this->Pinjaman_model->get_pinjaman_by_user($user_id);
        $this->load->view('pinjaman/index', $data);
    }

    public function tambah()
    {
        $this->load->view('pinjaman/tambah');
    }

    public function simpanPinjaman()
    {
        // Logika untuk menyimpan pinjaman oleh user
    }
}

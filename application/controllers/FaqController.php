<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FaqController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!parent::hasLogin()) {
            parent::alert('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'operator') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['title'] = "Panduan Operator";

        $level = $this->session->userdata('level');

        // Periksa apakah peran pengguna adalah 'operator'
        if ($level === 'operator') {
            $this->template('faq/index', $data);  // Memuat tampilan khusus untuk operator
        } else {
            // Arahkan pengguna yang bukan operator ke halaman error atau halaman lain
            $this->load->view('errors/html/error_403', $data);
        }
    }
}

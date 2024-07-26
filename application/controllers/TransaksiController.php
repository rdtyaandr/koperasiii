<?php

class TransaksiController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = 'Data Transaksi';
        parent::template('transaksi/index', $data);
    }
}

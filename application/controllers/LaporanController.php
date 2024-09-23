<?php
class LaporanController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LaporanModel');
    }

    public function index() {
        // Ambil data dari GET request
        $year = $this->input->get('tahun');
        $month = $this->input->get('bulan');
        $day = $this->input->get('tanggal');
        $end_day = $this->input->get('sampai_tanggal');
        $payment_method = $this->input->get('cara_bayar');

        // Validasi input
        if (empty($year)) {
            $data['laporan'] = [];
        } else {
            $data['laporan'] = $this->LaporanModel->get_filtered_data($year, $month, $day, $end_day, $payment_method);
        }

        $data['title'] = 'Laporan';
        parent::template('laporan/index', $data);
    }
}
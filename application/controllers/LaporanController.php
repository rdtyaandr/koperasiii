<?php
class LaporanController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LaporanModel');
    }

    public function index() {
        // Ambil data dari GET request
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        $report_type = $this->input->get('report_type');

        // Ambil data laporan dari model
        $data['laporan'] = $this->LaporanModel->get_laporan_data($month, $year, $report_type);
        $data['title'] = 'Laporan';

        // Kirim data ke view
        parent::template('laporan/laba_rugi', $data);
    }
}
?>

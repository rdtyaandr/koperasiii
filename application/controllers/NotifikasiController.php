<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NotifikasiModel'); // Memuat model NotifikasiModel
    }

    // Menampilkan daftar notifikasi
    public function index() {
        $data['title'] = 'Daftar Notifikasi';
        $data['notifikasi'] = $this->NotifikasiModel->get_notifikasi($this->userID);
        $this->template('notifikasi/index', $data);
    }

    // Menandai notifikasi sebagai dibaca
    public function tandai_dibaca($id) {
        $this->NotifikasiModel->tandai_dibaca($id, $this->userID);
        redirect('notifikasi');
    }
}
?>

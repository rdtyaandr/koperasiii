<?php
class NotifikasiController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Notifikasi_model');
    }

    public function index() {
        $data['notifikasi'] = $this->Notifikasi_model->get_notifikasi_by_user($this->session->userdata('pengguna_id'));
        $this->template('notifikasi/index', $data);
    }

    public function tandai_dibaca($notifikasi_id) {
        $this->Notifikasi_model->tandai_dibaca($notifikasi_id);
        redirect('notifikasi');
    }
}
?>

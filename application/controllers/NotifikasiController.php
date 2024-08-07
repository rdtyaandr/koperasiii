<?php
class NotifikasiController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NotifikasiModel');
    }

    public function index() {
        $data['title'] = 'Notifikasi';
        $data['notifikasi'] = $this->NotifikasiModel->get_notifikasi_by_user($this->session->userdata('pengguna_id'));
        if ($this->session->userdata('level') == 'admin'){
            parent::template('notifikasi/index', $data);
        }elseif ($this->session->userdata('level') == 'operator') {
            parent::op_template('notifikasi/index', $data);
        }elseif ($this->session->userdata('level') == 'user') {
            parent::user_template('notifikasi/index', $data);
        }
    }

    public function tandai_dibaca($notifikasi_id) {
        $this->NotifikasiModel->tandai_dibaca($notifikasi_id);
        redirect('notifikasi');
    }
}
?>

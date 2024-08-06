<?php

class NotifikasiController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NotifikasiModel');
    }

    public function daftar_pengguna_baru($pengguna_id) {
        $pesan = "Pengguna baru dengan ID {$pengguna_id} telah mendaftar.";
        $data = array(
            'pengguna_id' => $pengguna_id,
            'pesan' => $pesan,
        );
        parent::model('NotifikasiModel')->tambah($data);
    }

    public function index() {
        $data['title'] = 'Notifikasi';
        $data['notifikasi'] = parent::model('NotifikasiModel')->lihat_semua();
        
        if ($this->session->userdata('level') == 'admin'){
            parent::template('notifikasi/index', $data);
        }elseif ($this->session->userdata('level') == 'operator') {
            parent::op_template('notifikasi/index', $data);
        }elseif ($this->sesion->userdata('level') == 'user') {
            parent::user_template('notifikasi/index', $data);
        }
    }

    public function tandai_dibaca($id) {
        parent::model('NotifikasiModel')->ubah_status($id, 'dibaca');
        redirect('notifikasi/lihat_notifikasi');
    }
}
?>

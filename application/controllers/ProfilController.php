<?php
class ProfilController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $model = array('ProfilModel','AuthModel');
        $this->load->model($model);
        if (!parent::hasLogin()) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
        }
    }

    public function index($id) {
        $data['profil'] = parent::model('ProfilModel')->getProfilById($id); // Mengambil data profil berdasarkan ID

        // Menentukan template berdasarkan hak akses
        if ($this->session->userdata('pengguna_hak_akses') === 'operator') {
            parent::operator_template('profil/index', $data);  // Memuat view untuk operator
        } elseif ($this->session->userdata('pengguna_hak_akses') === 'user') {
           parent::user_template('profil/index', $data); // Memuat view untuk user
        } elseif ($this->session->userdata('pengguna_hak_akses') === 'ketua') {
            parent::template('profil/index', $data) ; // Memuat view untuk admin
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $this->ProfilModel->updateProfil($id, $this->input->post()); // Memperbarui data profil
            redirect('profil/detail/' . $id); // Redirect ke halaman detail setelah edit
        }
        $data['profil'] = $this->ProfilModel->getProfilById($id); // Mengambil data profil untuk ditampilkan di form
        $this->load->view('profil/edit', $data); // Memuat view edit profil
    }
}
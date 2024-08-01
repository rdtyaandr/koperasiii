<?php
class PenggunaController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $model = array('PenggunaModel');
        $this->load->model($model);
        // Pastikan admin sudah login dan memiliki hak akses yang benar
        if (!parent::hasLogin()) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
        }
    }

    public function index() {
		$data['title'] = 'Daftar Pengguna ';
		$data['Pengguna'] = parent::model('PenggunaModel')->get_users();

		parent::template('pengguna/index', $data);
    }

    public function ubah($id) 
    {
        if (isset($_POST['ubah'])) {
			$data = array(
            'username' => parent::post('username'),
            'email' => parent::post('email'),
            'password' => parent::post('password'),
            'satker' => parent::post('satker'),
            'pengguna_hak_akses' => parent::post('pengguna_hak_akses'),
            );
            $simpan = parent::model('PenggunaModel')->ubah($id, $data);

            if ($simpan > 0) {
                parent::alert('alert', 'sukses_ubah');
                redirect('pengguna');
            } else {
                parent::alert('alert', 'gagal_ubah');
                redirect('pengguna');
            }
        } else {
            $data['title'] = 'Ubah Pengguna';
            $query = array('pengguna_id' => $id);
            $data['Pengguna'] = parent::model('PenggunaModel')->Lihat_Pengguna($query);
            parent::template('pengguna/ubah', $data);
        }
    }

    public function hapus($id)
    {
        $query = array('pengguna_id' => $id);
        $hapus = parent::model('PenggunaModel')->hapus($query);
        if ($hapus > 0) {
            parent::alert('alert', 'sukses_hapus');
            redirect('pengguna');
        } else {
            parent::alert('alert', 'gagal_hapus');
            redirect('pengguna');
        }
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {

			$data = array(
				'nama_lengkap' => parent::post('nama_lengkap'),
				'username' => parent::post('username'),
				'email' => parent::post('email'),
				'satker' => parent::post('satker'),
				'password' => parent::post('password'),
				'pengguna_hak_akses' => parent::post('level')
			);

			$simpan = parent::model('PenggunaModel')->tambah($data);

			if ($simpan > 0) {
				parent::alert('alert', 'sukses_tambah');
				redirect('pengguna');
			} else {
				parent::alert('alert', 'gagal_tambah');
				redirect('pengguna');
			}
		} else {
			$data['title'] = 'tambah pengguna koperasi baru';

			parent::template('pengguna/tambah', $data);
    }
}

}
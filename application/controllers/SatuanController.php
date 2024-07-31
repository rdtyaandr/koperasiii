<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SatuanController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = array('SatuanModel');
        $this->load->model($model);
        if (!parent::hasLogin()) {
            parent::alert('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Data Satuan';
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        parent::template('satuan/index', $data);
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                parent::alert('alert', 'gagal_validasi');
                redirect('satuan');
            } else {
                $data = array(
                    'nama_satuan' => $this->input->post('nama_satuan'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                $simpan = parent::model('SatuanModel')->tambah($data);

                if ($simpan) {
                    parent::alert('alert', 'error-insert');
                } else {
                    parent::alert('alert', 'success-insert');
                }
                redirect('satuan');
            }
        }
    }

    public function ubah($id_satuan)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                parent::alert('alert', 'gagal_validasi');
                redirect('satuan');
            } else {
                $data = array(
                    'nama_satuan' => $this->input->post('nama_satuan'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                $simpan = parent::model('SatuanModel')->ubah($id_satuan, $data);

                if ($simpan) {
                    parent::alert('alert', 'error-update');
                } else {
                    parent::alert('alert', 'success-update');
                }
                redirect('satuan');
            }
        }
    }

    public function hapus($id_satuan)
    {
        $hapus = parent::model('SatuanModel')->hapus($id_satuan);
        if ($hapus) {
            parent::alert('alert', 'success-delete');
        } else {
            parent::alert('alert', 'error-delete-used'); // Bisa tambahkan pesan khusus untuk "sedang digunakan"
        }
        redirect('satuan');
    }
}

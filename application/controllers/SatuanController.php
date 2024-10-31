<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SatuanController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = array('SatuanModel', 'HistoryModel'); // Load model History
        $this->load->model($model);
        if (!parent::hasLogin()) {
            parent::alert('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['title'] = 'Data Satuan';
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        parent::template('satuan/index', $data);
    }

    private function addMessage($text, $summary, $icon)
    {
        $data = [
            'message_text' => $text,
            'message_summary' => $summary,
            'message_icon' => $icon,
            'role' => $this->session->userdata('level'),
            'pengguna_id' => $this->session->userdata('pengguna_id')
        ];
        $this->HistoryModel->addMessage($data);
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                parent::alert('alert', 'validation_failed');
                redirect('satuan');
            } else {
                $nama_satuan = $this->input->post('nama_satuan');
                if (parent::model('SatuanModel')->cek_nama_satuan($nama_satuan)) {
                    parent::alert('alert', 'error-duplicate');
                    redirect('satuan');
                }

                $data = array(
                    'nama_satuan' => $nama_satuan
                );

                $simpan = parent::model('SatuanModel')->tambah($data);

                if ($simpan) {
                    parent::alert('alert', 'error-insert');
                } else {
                    $this->addMessage('Satuan ditambahkan', 'Satuan dengan nama ' . $data['nama_satuan'] . ' telah ditambahkan', 'add_circle_outline');
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
                parent::alert('alert', 'validation_failed');
                redirect('satuan');
            } else {
                $nama_satuan = $this->input->post('nama_satuan');
                if (parent::model('SatuanModel')->cek_nama_satuan($nama_satuan, $id_satuan)) {
                    parent::alert('alert', 'error-duplicate');
                    redirect('satuan');
                }

                $data = array(
                    'nama_satuan' => $nama_satuan
                );

                $simpan = parent::model('SatuanModel')->ubah($id_satuan, $data);

                if ($simpan) {
                    parent::alert('alert', 'error-update');
                } else {
                    $this->addMessage('Satuan diubah', 'Satuan dengan nama ' . $data['nama_satuan'] . ' telah diubah', 'edit');
                    parent::alert('alert', 'success-update');
                }
                redirect('satuan');
            }
        }
    }

    public function hapus($id_satuan)
    {
        $query = array('id_satuan' => $id_satuan);
        $satuan = parent::model('SatuanModel')->lihat_satuan($query); // Ambil data satuan untuk nama
        $hapus = parent::model('SatuanModel')->hapus($id_satuan);
        if ($hapus) {
            $this->addMessage('Satuan dihapus', 'Satuan dengan nama ' . $satuan['nama_satuan'] . ' telah dihapus', 'delete');
            parent::alert('alert', 'success-delete');
        } else {
            parent::alert('alert', 'error-delete-used'); // Bisa tambahkan pesan khusus untuk "sedang digunakan"
        }
        redirect('satuan');
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
        $this->load->model('HistoryModel'); // Load model History
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
        $data['title'] = 'Data Kategori';
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        parent::template('kategori/index', $data);
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
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                parent::alert('alert', 'validation_failed');
                redirect('kategori');
            } else {
                $nama_kategori = $this->input->post('nama_kategori');
                if (parent::model('KategoriModel')->cek_nama_kategori($nama_kategori)) {
                    parent::alert('alert', 'error-duplicate');
                    redirect('kategori');
                }

                $data = array(
                    'nama_kategori' => $nama_kategori
                );

                $simpan = parent::model('KategoriModel')->tambah($data);

                if ($simpan) {
                    parent::alert('alert', 'error-insert');
                } else {
                    $this->addMessage('Kategori ditambahkan', 'Kategori dengan nama ' . $data['nama_kategori'] . ' telah ditambahkan', 'add_circle_outline');
                    parent::alert('alert', 'success-insert');
                }
                redirect('kategori');
            }
        }
    }

    public function ubah($id_kategori)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                parent::alert('alert', 'validation_failed');
                redirect('kategori');
            } else {
                $nama_kategori = $this->input->post('nama_kategori');
                if (parent::model('KategoriModel')->cek_nama_kategori($nama_kategori, $id_kategori)) {
                    parent::alert('alert', 'error-duplicate');
                    redirect('kategori');
                }

                $data = array(
                    'nama_kategori' => $nama_kategori
                );

                $simpan = parent::model('KategoriModel')->ubah($id_kategori, $data);

                if ($simpan) {
                    parent::alert('alert', 'error-update');
                } else {
                    $this->addMessage('Kategori diubah', 'Kategori dengan nama ' . $data['nama_kategori'] . ' telah diubah', 'edit');
                    parent::alert('alert', 'success-update');
                }
                redirect('kategori');
            }
        }
    }

    public function hapus($id)
    {
        // Ambil data kategori untuk nama
        $query = array('id_kategori' => $id);
        $kategori = parent::model('KategoriModel')->lihat_kategori($query);
    
        if ($kategori) { // Pastikan $kategori adalah objek yang valid
            if (parent::model('KategoriModel')->hapus($id)) {
                $this->addMessage('Kategori dihapus', 'Kategori dengan nama ' . $kategori['nama_kategori'] . ' telah dihapus', 'delete');
                parent::alert('alert', 'success-delete');
            } else {
                parent::alert('alert', 'error-delete-used');
            }
        } else {
            parent::alert('alert', 'error-not-found');
        }
        redirect('kategori');
    }
}
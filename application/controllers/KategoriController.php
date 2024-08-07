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
        $this->HistoryModel->deleteOldMessages();
    }

    public function index()
    {
        $data['title'] = 'Data Kategori';
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        if ($this->session->userdata('level') == 'admin'){
            parent::template('kategori/index', $data);
        }elseif ($this->session->userdata('level') == 'operator') {
            parent::op_template('kategori/index', $data);
        }
    }

    // Fungsi untuk menambahkan pesan ke history
    private function addMessage($text, $summary, $icon)
    {
        $data = [
            'message_text' => $text,
            'message_summary' => $summary,
            'message_icon' => $icon,
            'message_date_time' => date('Y-m-d H:i:s')
        ];
        $this->HistoryModel->addMessage($data);
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                parent::alert('alert', 'gagal_validasi');
                redirect('kategori');
            } else {
                $data = array(
                    'nama_kategori' => $this->input->post('nama_kategori'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                $simpan = parent::model('KategoriModel')->tambah($data);

                if ($simpan) {
                    parent::alert('alert', 'error-insert');
                } else {
                    $this->addMessage('Kategori ditambahkan', 'Kategori ' . $data['nama_kategori'] . ' telah ditambahkan', 'add_circle_outline');
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
                parent::alert('alert', 'gagal_validasi');
                redirect('kategori');
            } else {
                $data = array(
                    'nama_kategori' => $this->input->post('nama_kategori'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                $simpan = parent::model('KategoriModel')->ubah($id_kategori, $data);

                if ($simpan) {
                    parent::alert('alert', 'error-update');
                } else {
                    $this->addMessage('Kategori diubah', 'Kategori ' . $data['nama_kategori'] . ' telah diubah', 'update');
                    parent::alert('alert', 'success-update');
                }
                redirect('kategori');
            }
        }
    }

    public function hapus($id)
    {
        // Cek apakah kategori bisa dihapus
        $kategori = parent::model('KategoriModel')->lihat_kategori($id); // Ambil data kategori untuk nama
        if (parent::model('KategoriModel')->hapus($id)) {
            $this->addMessage('Kategori dihapus', 'Kategori ' . $kategori->nama_kategori . ' telah dihapus', 'delete');
            parent::alert('alert', 'success-delete');
        } else {
            parent::alert('alert', 'error-delete-used');
        }
        redirect('kategori');
    }
}
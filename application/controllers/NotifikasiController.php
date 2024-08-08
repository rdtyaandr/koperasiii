<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NotifikasiModel');
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    // Menampilkan semua notifikasi untuk pengguna yang sedang login
    public function index() {
        $pengguna_id = $this->session->userdata('pengguna_id');
        $data['notifikasi'] = $this->NotifikasiModel->get_notifikasi($pengguna_id);
        $data['notifikasi_count'] = $this->NotifikasiModel->countUnreadNotifikasi($this->session->userdata('pengguna_id'));
        $data['title'] = 'Notifikasi';
        $data['notifikasi'] = parent::model('NotifikasiModel')->lihat_semua();
        parent::template('notifikasi/index', $data);
    }

    // Menandai notifikasi sebagai dibaca
    public function tandai_dibaca($id) {
        $pengguna_id = $this->session->userdata('pengguna_id');
        $this->NotifikasiModel->tandai_dibaca($id, $pengguna_id);
        redirect('notifikasi');
    }

    // Fungsi untuk membuat notifikasi stok rendah
    public function cek_stok_rendah($barang_id) {
        $this->load->model('BarangModel');
        $barang = $this->BarangModel->lihat(['id_barang' => $barang_id]);

        if ($barang && $barang->stok < 10 && !$this->NotifikasiModel->cek_notifikasi_stok_rendah($barang_id)) {
            $data = [
                'pengguna_id' => 1, // ID admin atau pengguna yang relevan
                'tipe' => 'stok_rendah',
                'pesan' => 'Stok untuk barang ' . $barang->nama_barang . ' hampir habis.',
                'barang_id' => $barang_id,
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'baru'
            ];
            $this->NotifikasiModel->tambah_notifikasi($data);
        }
    }

    // Fungsi untuk membuat notifikasi limit kredit
    public function cek_limit_kredit($pengguna_id) {
        $this->load->model('TransaksiModel');
        $total_kredit = $this->TransaksiModel->get_total_kredit($pengguna_id);

        if ($total_kredit > 1000000 && !$this->NotifikasiModel->cek_notifikasi_limit_kredit($pengguna_id)) { // Sesuaikan limit kredit
            $data = [
                'pengguna_id' => $pengguna_id,
                'tipe' => 'limit_kredit',
                'pesan' => 'Kredit Anda telah mencapai limit.',
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'baru'
            ];
            $this->NotifikasiModel->tambah_notifikasi($data);
        }
    }
}
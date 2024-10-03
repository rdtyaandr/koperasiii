<?php

use Picqer\Barcode\BarcodeGeneratorPNG;

class KonsinyasiController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KonsinyasiModel');
        $this->load->model('BarangModel');
        $this->load->model('HistoryModel');
        $this->load->library('Ciqrcode');
        $this->load->library('Zend');
        $this->load->helper('url');
        $this->load->database();
        require_once APPPATH . 'third_party/BarcodeGenerator.php';
        require_once APPPATH . 'third_party/BarcodeGeneratorPNG.php';
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            redirect(base_url());
        }
    }

    // Fungsi untuk generate barcode
    public function generate_barcode($kode_barang)
    {
        // Load Barcode Generator
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($kode_barang, $generator::TYPE_CODE_128);

        // Output barcode sebagai image
        header('Content-Type: image/png');
        echo $barcode;
    }

    // Fungsi untuk menambahkan pesan ke history
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

    public function index()
    {
        $data['title'] = 'Data Konsinyasi';
        $data['konsinyasi'] = parent::model('KonsinyasiModel')->lihat_semua();
        parent::template('konsinyasi/index', $data);
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $data = array(
                'nama_barang' => parent::post('nama_konsinyasi'),
                'kode_barang' => parent::post('kode_barang'),
                'detail_barang' => parent::post('detail_konsinyasi'),
                'harga_beli' => parent::post('harga_beli'),
                'harga_jual_pagi' => parent::post('harga_jual_pagi'),
                'harga_jual_sore' => parent::post('harga_jual_sore'),
                'stok' => parent::post('stok')
            );

            $simpan = parent::model('KonsinyasiModel')->tambah($data);

            if ($simpan > 0) {
                $this->addMessage('Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama ' . $data['nama_barang'] . ' telah ditambahkan', 'add_circle_outline');
                parent::alert('alert', 'success-insert');
                redirect('konsinyasi');
            } else {
                parent::alert('alert', 'error-insert');
                redirect('konsinyasi/tambah');
            }
        } else {
            $data['title'] = 'Tambah Konsinyasi';
            parent::template('konsinyasi/tambah', $data);
        }
    }

    public function ubah($id)
    {
        $data['konsinyasi'] = parent::model('KonsinyasiModel')->lihat_konsinyasi($id);
        if (isset($_POST['ubah'])) {
            $dataUpdate = array(
                'nama_barang' => parent::post('nama_barang'),
                'kode_barang' => parent::post('kode_barang'),
                'detail_barang' => parent::post('detail_barang'),
                'harga_beli' => parent::post('harga_beli'),
                'harga_jual_pagi' => parent::post('harga_jual_pagi'),
                'harga_jual_sore' => parent::post('harga_jual_sore'),
                'stok' => parent::post('stok')
            );

            $simpan = parent::model('KonsinyasiModel')->ubah($id, $dataUpdate);

            if ($simpan > 0) {
                $this->addMessage('Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama ' . $dataUpdate['nama_barang'] . ' telah diubah', 'edit');
                parent::alert('alert', 'success-update');
                redirect('konsinyasi');
            } else {
                parent::alert('alert', 'error-update');
                redirect('konsinyasi/ubah/' . $id);
            }
        } else {
            $data['title'] = 'Ubah Konsinyasi';
            parent::template('konsinyasi/ubah', $data);
        }
    }

    public function hapus($id)
    {
        $query = array('id_barang' => $id);
        $konsinyasi = parent::model('KonsinyasiModel')->lihat_konsinyasi($id);
        if ($konsinyasi) { // Pastikan $konsinyasi adalah objek yang valid
            $hapus = parent::model('KonsinyasiModel')->hapus($query);
            if ($hapus > 0) {
                $this->addMessage('Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama ' . htmlspecialchars($konsinyasi->nama_barang) . ' telah dihapus', 'delete');
                parent::alert('alert', 'success-delete');
                redirect('konsinyasi');
            } else {
                parent::alert('alert', 'error-delete');
                redirect('konsinyasi');
            }
        } else {
            parent::alert('alert', 'error-not-found');
            redirect('konsinyasi');
        }
    }

    public function get_barang_konsinyasi()
    {
        $barang_konsinyasi = $this->KonsinyasiModel->lihat_semua(); // Ambil data barang konsinyasi
        echo json_encode($barang_konsinyasi); // Kembalikan data dalam format JSON
    }
}

<?php

class BarangController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('KategoriModel');
        $this->load->model('SatuanModel');
        $this->load->model('HistoryModel'); // Load model History
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
{
    // Memanggil fungsi untuk memeriksa stok dan mengirimkan notifikasi
    $this->load->model('BarangModel');
    $this->BarangModel->check_stock_and_notify();

    // Lanjutkan dengan proses lainnya
    $data['title'] = 'Data Barang';
    $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
    $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
    $data['barang'] = parent::model('BarangModel')->lihat_semua();

    // Menambahkan notifikasi ke data
    $level = $this->session->userdata('level');
    $pengguna_id = $this->session->userdata('pengguna_id');
    $this->load->model('NotifikasiModel');
    $data['notifikasi'] = $this->NotifikasiModel->get_notifikasi($pengguna_id, $level);

    if ($this->session->userdata('level') == 'admin'){
        parent::template('barang/index', $data);
    } elseif ($this->session->userdata('level') == 'operator') {
        parent::op_template('barang/index', $data);
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
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        if (isset($_POST['tambah'])) {
            $data = array(
                'kode_barang' => parent::post('kode_barang'),
                'nama_barang' => parent::post('nama_barang'),
                'detail_barang' => parent::post('detail_barang'),
                'id_satuan' => parent::post('satuan'),
                'id_kategori' => parent::post('kategori'),
                'harga_beli' => parent::post('harga_beli'),
                'harga_jual' => parent::post('harga_jual'),
                'stok' => parent::post('stok'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $simpan = parent::model('BarangModel')->tambah($data);

            if ($simpan > 0) {
                $this->addMessage('Barang baru ditambahkan', 'Barang ' . $data['nama_barang'] . ' telah ditambahkan', 'add_circle_outline');
                parent::alert('alert', 'success-insert');
                redirect('barang');
            } else {
                parent::alert('alert', 'error-insert');
                redirect('barang');
            }
        } else {
            $data['title'] = 'Tambah Barang';

            if ($this->session->userdata('level') == 'admin'){
                parent::template('barang/tambah', $data);
            }elseif ($this->session->userdata('level') == 'operator') {
                parent::op_template('barang/tambah', $data);
            }
        }
    }

    public function ubah($id)
    {
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        if (isset($_POST['ubah'])) {
            $data = array(
                'kode_barang' => parent::post('kode_barang'),
                'nama_barang' => parent::post('nama_barang'),
                'detail_barang' => parent::post('detail_barang'),
                'id_satuan' => parent::post('satuan'),
                'id_kategori' => parent::post('kategori'),
                'harga_beli' => parent::post('harga_beli'),
                'harga_jual' => parent::post('harga_jual'),
                'stok' => parent::post('stok'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $simpan = parent::model('BarangModel')->ubah($id, $data);

            if ($simpan > 0) {
                $this->addMessage('Barang diubah', 'Barang ' . $data['nama_barang'] . ' telah diubah', 'update');
                parent::alert('alert', 'success-update');
                redirect('barang');
            } else {
                parent::alert('alert', 'error-update');
                redirect('barang');
            }
        } else {
            $data['title'] = 'Ubah Barang';
            $query = array('id_barang' => $id);
            $data['barang'] = parent::model('BarangModel')->lihat_barang($query);

            if ($this->session->userdata('level') == 'admin'){
                parent::template('barang/ubah', $data);
            }elseif ($this->session->userdata('level') == 'operator') {
                parent::op_template('barang/ubah', $data);
            }
        }
    }

    public function hapus($id)
    {
        $query = array('id_barang' => $id);
        $barang = parent::model('BarangModel')->lihat_barang($query);
        $hapus = parent::model('BarangModel')->hapus($query);
        if ($hapus > 0) {
            $this->addMessage('Barang dihapus', 'Barang ' . $barang->nama_barang . ' telah dihapus', 'delete');
            parent::alert('alert', 'success-delete');
            redirect('barang');
        } else {
            parent::alert('alert', 'error-update');
            redirect('barang');
        }
    }
}
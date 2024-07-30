<?php

class BarangController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('KategoriModel');
        $this->load->model('SatuanModel');
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        $data['barang'] = parent::model('BarangModel')->lihat_semua();

        parent::template('barang/index', $data);
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
                parent::alert('alert', 'success-insert');
                redirect('barang');
            } else {
                parent::alert('alert', 'error-insert');
                redirect('barang');
            }
        } else {
            $data['title'] = 'Tambah Barang';

            parent::template('barang/tambah', $data);
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

            parent::template('barang/ubah', $data);
        }
    }

    public function hapus($id)
    {
        $query = array('id_barang' => $id);
        $hapus = parent::model('BarangModel')->hapus($query);
        if ($hapus > 0) {
            parent::alert('alert', 'success-delete');
            redirect('barang');
        } else {
            parent::alert('alert', 'error-update');
            redirect('barang');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiModel');
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['transaksi'] = parent::model('TransaksiModel')->lihat_semua();
        
        if ($this->session->userdata('level') == 'admin'){
            parent::template('transaksi/index', $data);
        }elseif ($this->session->userdata('level') == 'operator') {
            parent::op_template('transaksi/index', $data);
        }
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $data = array(
                'nama' => parent::post('nama'),
                'cara_bayar' => parent::post('cara_bayar'),
                'status_bayar' => parent::post('status_bayar'),
                'pengambilan' => parent::post('pengambilan'),
                'tanggal' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $simpan = parent::model('TransaksiModel')->tambah($data);

            if ($simpan > 0) {
                parent::alert('alert', 'success-insert');
                redirect('transaksi');
            } else {
                parent::alert('alert', 'error-insert');
                redirect('transaksi');
            }
        } else {
            $data['title'] = 'Tambah Transaksi';
            if ($this->session->userdata('level') == 'admin'){
                parent::template('transaksi/tambah', $data);
            }elseif ($this->session->userdata('level') == 'operator') {
                parent::op_template('transaksi/tambah', $data);
            }
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['ubah'])) {
            $data = array(
                'nama' => parent::post('nama'),
                'cara_bayar' => parent::post('cara_bayar'),
                'status_bayar' => parent::post('status_bayar'),
                'pengambilan' => parent::post('pengambilan'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $simpan = parent::model('TransaksiModel')->ubah($id, $data);

            if ($simpan > 0) {
                parent::alert('alert', 'success-update');
                redirect('transaksi');
            } else {
                parent::alert('alert', 'error-update');
                redirect('transaksi');
            }
        } else {
            $data['title'] = 'Ubah Transaksi';
            $query = array('id_transaksi' => $id);
            $data['transaksi'] = parent::model('TransaksiModel')->lihat_transaksi($query);
            if ($this->session->userdata('level') == 'admin'){
                parent::template('transaksi/ubah', $data);
            }elseif ($this->session->userdata('level') == 'operator') {
                parent::op_template('transaksi/ubah', $data);
            }
        }
    }

    public function hapus($id)
    {
        $query = array('id_transaksi' => $id);
        $hapus = parent::model('TransaksiModel')->hapus($query);

        if ($hapus > 0) {
            parent::alert('alert', 'success-delete');
            redirect('transaksi');
        } else {
            parent::alert('alert', 'error-delete');
            redirect('transaksi');
        }
    }
}

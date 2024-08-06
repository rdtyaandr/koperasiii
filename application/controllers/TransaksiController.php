<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiModel');
        $this->load->model('PenggunaModel'); // Load the PenggunaModel to fetch pengguna data
        $this->load->model('BarangModel');   // Load the BarangModel to fetch barang data
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
            // Retrieve data from form inputs
            $data = array(
                'pengguna_id' => parent::post('nama'),
                'cara_bayar' => parent::post('cara_bayar'),
                'status_bayar' => parent::post('status_bayar'),
                'status_barang' => parent::post('pengambilan'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            // Insert the main transaction data
            $transaksi_id = parent::model('TransaksiModel')->tambah($data);

            // Retrieve item details from the form
            $barang_ids = $this->input->post('nama_barang');
            $jumlah_beli = $this->input->post('jumlah');
            $total = $this->input->post('total');

            // Process and insert each item associated with the transaction
            for ($i = 0; $i < count($barang_ids); $i++) {
                $item_data = array(
                    'id_transaksi' => $transaksi_id,
                    'id_barang' => $barang_ids[$i],
                    'jumlah_beli' => $jumlah_beli[$i],
                    'total' => $total[$i]
                );
                // Insert item data (implement this in the model)
                parent::model('TransaksiModel')->tambah_item($item_data);
            }

            if ($transaksi_id > 0) {
                parent::alert('alert', 'success-insert');
                redirect('transaksi');
            } else {
                parent::alert('alert', 'error-insert');
                redirect('transaksi');
            }
        } else {
            $data['title'] = 'Tambah Transaksi';
            $data['pengguna'] = $this->PenggunaModel->get_users();
            $data['barang'] = $this->BarangModel->lihat_semua();
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
            // Retrieve data from form inputs
            $data = array(
                'pengguna_id' => parent::post('nama'),
                'cara_bayar' => parent::post('cara_bayar'),
                'status_bayar' => parent::post('status_bayar'),
                'status_barang' => parent::post('pengambilan'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            // Update the main transaction data
            $update = parent::model('TransaksiModel')->ubah($id, $data);

            // Retrieve item details from the form
            $barang_ids = $this->input->post('nama_barang');
            $jumlah_beli = $this->input->post('jumlah');
            $total = $this->input->post('total');

            // Process and update each item associated with the transaction
            // (you may need to implement logic for updating or deleting existing items as needed)
            for ($i = 0; $i < count($barang_ids); $i++) {
                $item_data = array(
                    'id_transaksi' => $id,
                    'id_barang' => $barang_ids[$i],
                    'jumlah_beli' => $jumlah_beli[$i],
                    'total' => $total[$i]
                );
                // Update item data (implement this in the model)
                parent::model('TransaksiModel')->update_item($item_data);
            }

            if ($update > 0) {
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
            $data['pengguna'] = $this->PenggunaModel->get_users();
            $data['barang'] = $this->BarangModel->lihat_semua();
            parent::template('transaksi/ubah', $data);
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

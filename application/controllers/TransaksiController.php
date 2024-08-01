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
        $data['transaksi'] = $this->TransaksiModel->get_all_transaksi();
        parent::template('transaksi/index', $data);
    }

    public function tambah()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Ambil data dari form
            $pengguna_id = $this->input->post('pengguna_id');
            $cara_bayar = $this->input->post('cara_bayar');
            $status_bayar = $this->input->post('status_bayar');
            $status_barang = $this->input->post('status_barang');

            // Total keseluruhan
            $total = array_sum(array_map('floatval', $this->input->post('total')));

            // Data transaksi
            $data_transaksi = array(
                'pengguna_id'   => $pengguna_id,
                'cara_bayar'    => $cara_bayar,
                'status_bayar'  => $status_bayar,
                'status_barang' => $status_barang,
                'total'         => $total,
            );

            // Simpan transaksi
            $id_transaksi = $this->TransaksiModel->insert_transaksi($data_transaksi);

            // Data detail transaksi
            $detail_data = array();
            foreach ($this->input->post('id_barang') as $key => $id_barang) {
                $detail_data[] = array(
                    'id_transaksi' => $id_transaksi,
                    'id_barang'    => $id_barang,
                    'nama_barang'  => $this->input->post('nama_barang')[$key],
                    'harga'        => floatval($this->input->post('harga')[$key]),
                    'jumlah_beli'  => intval($this->input->post('jumlah_beli')[$key]),
                    'total'        => floatval($this->input->post('total')[$key]),
                );
            }

            // Simpan detail transaksi
            $this->TransaksiModel->insert_transaksi_detail($detail_data);

            // Beri notifikasi sukses dan redirect
            $this->session->set_flashdata('success', 'Transaksi berhasil disimpan.');
            redirect('transaksi');
        } else {
            $data['title'] = 'Ubah Transaksi';
            $data['pengguna'] = $this->PenggunaModel->get_users();
            $data['barang'] = $this->BarangModel->lihat_semua();
            parent::template('transaksi/tambah', $data);
        }
    }

    // Fungsi untuk menghapus transaksi
    public function hapus($id_transaksi)
    {
        $this->TransaksiModel->delete_transaksi($id_transaksi);
        $this->session->set_flashdata('success', 'Transaksi berhasil dihapus.');
        redirect('transaksi');
    }
}
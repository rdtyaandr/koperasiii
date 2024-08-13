<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiModel');
        $this->load->model('PenggunaModel');
        $this->load->model('BarangModel');
        $this->load->model('HistoryModel');
        $this->load->helper('date'); 
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            redirect(base_url());
        }
        $this->HistoryModel->deleteOldMessages();
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['transaksi'] = $this->TransaksiModel->get_all_transaksi();
        parent::template('transaksi/index', $data);
    }

    private function addMessage($text, $summary, $icon)
    {
        $data = [
            'message_text' => $text,
            'message_summary' => $summary,
            'message_icon' => $icon,
            'message_date_time' => date('Y-m-d H:i:s'),
            'role' => $this->session->userdata('level')
        ];
        $this->HistoryModel->addMessage($data);
    }

    public function tambah()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $pengguna_id = $this->input->post('nama');
            $cara_bayar = $this->input->post('cara_bayar');
            $detail = $this->input->post('detail'); 

            if (empty($pengguna_id) || empty($cara_bayar)) {
                $this->session->set_flashdata('alert', 'error-insert');
                redirect('transaksi/tambah');
            }

            $total = array_sum(array_map('floatval', $this->input->post('total')));
            $id_barang = $this->input->post('id_barang');
            $jumlah = $this->input->post('jumlah');

            foreach ($id_barang as $key => $barang_id) {
                $barang = $this->BarangModel->get_barang_by_id($barang_id);
                if (!$barang) {
                    $this->session->set_flashdata('alert', 'error-invalid-barang');
                    redirect('transaksi/tambah');
                }

                if ($jumlah[$key] <= 0) {
                    $this->session->set_flashdata('alert', 'error-update-detail');
                    redirect('transaksi/tambah');
                }

                if ($barang->stok < $jumlah[$key]) {
                    $this->session->set_flashdata('alert', 'error-stock');
                    redirect('transaksi/tambah');
                }
            }

            // Tambahkan pengecekan untuk cara bayar Kredit
            if ($cara_bayar == 'Kredit') {
                $user_limit = $this->PenggunaModel->get_user_limit($pengguna_id); // Ambil limit pengguna
                if ($user_limit + $total > 1500000) {
                    $this->session->set_flashdata('alert', 'error-limit'); // Alert jika limit terlampaui
                    redirect('transaksi/tambah');
                }

                // Update limit pengguna
                $new_limit = $user_limit + $total; // Hitung limit baru
                $this->PenggunaModel->update_user_limit($pengguna_id, $new_limit); // Update limit
            }

            $data_transaksi = array(
                'pengguna_id' => $pengguna_id,
                'cara_bayar' => $cara_bayar,
                'total' => $total,
                'detail' => $detail,
            );

            $id_transaksi = $this->TransaksiModel->insert_transaksi($data_transaksi);

            if ($id_transaksi) {
                $detail_data = array();
                foreach ($id_barang as $key => $barang_id) {
                    $detail_data[] = array(
                        'id_transaksi' => $id_transaksi,
                        'id_barang' => $barang_id,
                        'nama_barang' => trim($this->input->post('nama_barang')[$key]),
                        'harga' => floatval($this->input->post('harga')[$key]),
                        'jumlah' => intval($jumlah[$key]),
                        'total' => floatval($this->input->post('total')[$key]),
                    );

                    // Update stok barang
                    $this->BarangModel->update_stok_barang($barang_id, -intval($jumlah[$key]));
                }

                $this->TransaksiModel->insert_transaksi_detail($detail_data);

                // Tambahkan pesan ke history
                $this->addMessage('Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total ' . number_format($total, 0, ',', '.') . ' Rupiah', 'add_circle_outline');

                $this->session->set_flashdata('alert', 'success-insert');
                redirect('transaksi');
            } else {
                $this->session->set_flashdata('alert', 'error-insert');
                redirect('transaksi/tambah');
            }
        } else {
            $data['title'] = 'Tambah Transaksi';
            $data['pengguna'] = $this->PenggunaModel->get_users_filtered();
            $data['barang'] = $this->BarangModel->lihat_semua();
            parent::template('transaksi/tambah', $data);
        }
    }

    public function ubah($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_transaksi = $this->input->post('id_transaksi');
            $pengguna_id = $this->input->post('nama');
            $cara_bayar = $this->input->post('cara_bayar');
            $detail = $this->input->post('detail');
            $total_baru = array_sum(array_map('floatval', $this->input->post('total')));

            // Ambil data transaksi lama
            $transaksi_lama = $this->TransaksiModel->get_transaksi_by_id($id_transaksi);
            $total_lama = floatval($transaksi_lama->total);
            $cara_bayar_lama = $transaksi_lama->cara_bayar;

            // Update data transaksi
            $data_transaksi = [
                'pengguna_id' => $pengguna_id,
                'cara_bayar' => $cara_bayar,
                'detail' => $detail,
                'total' => $total_baru,
            ];

            // Update limit pengguna jika cara bayar Kredit
            if ($cara_bayar == 'Kredit') {
                $user_limit = $this->PenggunaModel->get_user_limit($pengguna_id);

                if ($total_baru > $total_lama) {
                    $selisih = $total_baru - $total_lama;
                    if ($user_limit + $selisih > 1500000) {
                        $this->addMessage('Limit Kredit Terlampaui', 'Pengguna dengan ID ' . $pengguna_id . ' telah melampaui limit kredit', 'error'); // Tambahkan pesan ke history
                        $this->session->set_flashdata('alert', 'error-limit');
                        redirect('transaksi/ubah/' . $id_transaksi);
                    }
                    $new_limit = $user_limit + $selisih;
                } else {
                    $selisih = $total_lama - $total_baru;
                    $new_limit = $user_limit - $selisih;
                }
            }

            $this->TransaksiModel->update_transaksi($id_transaksi, $data_transaksi);

            if ($cara_bayar == 'Kredit') {
                $this->PenggunaModel->update_user_limit($pengguna_id, $new_limit);
            }

            // Tambahkan pesan ke history
            $this->addMessage('Transaksi diubah','Transaksi dengan total ' . number_format($total_lama, 0, ',', '.') . ' Rupiah' . ' telah diubah', 'update');

            $id_barang = $this->input->post('id_barang');
            $harga = $this->input->post('harga');
            $jumlah = $this->input->post('jumlah');
            $nama_barang = $this->input->post('nama_barang');

            if (empty($id_barang) || empty($jumlah) || empty($nama_barang) || empty($harga) || empty($total_baru)) {
                $this->session->set_flashdata('alert', 'error-update-detail');
                redirect('transaksi/ubah/' . $id_transaksi);
            }

            // Ambil detail barang lama
            $detail_lama = $this->TransaksiModel->get_transaksi_detail($id_transaksi);

            // Simpan detail barang baru
            $detail_data = array();
            foreach ($id_barang as $key => $barang_id) {
                $new_jumlah = intval($jumlah[$key]);
                $barang = $this->BarangModel->get_barang_by_id($barang_id);
                if (!$barang) {
                    $this->session->set_flashdata('alert', 'error-invalid-barang');
                    redirect('transaksi/ubah/' . $id_transaksi);
                }

                if ($new_jumlah <= 0) {
                    $this->session->set_flashdata('alert', 'error-update-detail');
                    redirect('transaksi/ubah/' . $id_transaksi);
                }

                $old_jumlah = 0;
                foreach ($detail_lama as $old_detail) {
                    if ($old_detail->id_barang == $barang_id) {
                        $old_jumlah = $old_detail->jumlah;
                        break;
                    }
                }

                // Update stok barang berdasarkan perubahan jumlah
                if ($new_jumlah > $old_jumlah) {
                    $stok_berubah = $new_jumlah - $old_jumlah;
                    if ($barang->stok < $stok_berubah) {
                        $this->session->set_flashdata('alert', 'error-stock');
                        redirect('transaksi/ubah/' . $id_transaksi);
                    }
                    $this->BarangModel->update_stok_barang($barang_id, -$stok_berubah);
                } elseif ($new_jumlah < $old_jumlah) {
                    $stok_berubah = $old_jumlah - $new_jumlah;
                    $this->BarangModel->update_stok_barang($barang_id, $stok_berubah);
                }

                $detail_data[] = array(
                    'id_transaksi' => $id_transaksi,
                    'id_barang' => $barang_id,
                    'nama_barang' => trim($nama_barang[$key]),
                    'harga' => floatval($harga[$key]),
                    'jumlah' => $new_jumlah,
                    'total' => floatval($harga[$key]) * $new_jumlah,
                );
            }

            // Update detail barang
            $this->TransaksiModel->update_detail_barang($id_transaksi, $detail_data);

            $this->session->set_flashdata('alert', 'success-update');
            redirect('transaksi');
        } else {
            $data['pengguna'] = $this->PenggunaModel->get_users_filtered();
            $data['barang'] = $this->BarangModel->lihat_semua();
            $data['transaksi'] = $this->TransaksiModel->get_transaksi_by_id($id);
            $data['detail_barang'] = $this->TransaksiModel->get_detail_barang_by_transaksi_id($id);

            parent::template('transaksi/ubah', $data);
        }
    }
}
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
        $this->load->model('KonsinyasiModel');
        $this->load->helper('date'); 
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            redirect(base_url());
        }
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
            'role' => $this->session->userdata('level'),
            'pengguna_id' => $this->session->userdata('pengguna_id')
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
    
            $jenis_barang = $this->input->post('jenis_barang');
            $nama_barang = $this->input->post('nama_barang');
            $harga_input = $this->input->post('harga');
            $harga_waktu = $this->input->post('harga_jual');
            $jumlah = $this->input->post('jumlah');
            $total = array_sum(array_map('floatval', $this->input->post('total')));
            $pengguna = $this->PenggunaModel->get_user_by_id($pengguna_id);
            $nama_pengguna = $pengguna->username;
    
            foreach ($nama_barang as $key => $barang_id) {
                // Validasi barang
                if ($jumlah[$key] <= 0) {
                    $this->session->set_flashdata('alert', 'error-update-detail');
                    redirect('transaksi/tambah');
                }
    
                $barang = $this->BarangModel->get_barang_by_id($barang_id);
                if (!$barang || $barang->stok < $jumlah[$key]) {
                    $this->session->set_flashdata('alert', 'error-stock');
                    redirect('transaksi/tambah');
                }
    
                // Simpan riwayat harga jika harga berubah
                if ($harga_input[$key] != '') {
                    // Cek jenis barang
                    if ($jenis_barang[$key] == 'konsinyasi') {
                        // Logika konsinyasi untuk pagi dan sore
                        if ($harga_waktu[$key] == 'pagi' && $barang->harga_jual_pagi != floatval($harga_input[$key])) {
                            $riwayat_data = array(
                                'id_barang' => $barang_id,
                                'harga_beli' => $barang->harga_beli,
                                'harga_jual' => floatval($harga_input[$key]),
                                'tanggal_berlaku' => date('Y-m-d')
                            );
                            $this->BarangModel->insert_riwayat_harga($riwayat_data);
                        } elseif ($harga_waktu[$key] == 'sore' && $barang->harga_jual_sore != floatval($harga_input[$key])) {
                            $riwayat_data = array(
                                'id_barang' => $barang_id,
                                'harga_beli' => $barang->harga_beli,
                                'harga_jual' => floatval($harga_input[$key]),
                                'tanggal_berlaku' => date('Y-m-d')
                            );
                            $this->BarangModel->insert_riwayat_harga($riwayat_data);
                        }
                    } elseif ($jenis_barang[$key] == 'toko') {
                        // Cek harga_jual untuk barang toko
                        if ($barang->harga_jual != floatval($harga_input[$key])) {
                            $riwayat_data = array(
                                'id_barang' => $barang_id,
                                'harga_beli' => $barang->harga_beli,
                                'harga_jual' => floatval($harga_input[$key]),
                                'tanggal_berlaku' => date('Y-m-d')
                            );
                            $this->BarangModel->insert_riwayat_harga($riwayat_data);
                        }
                    }
                }
            }
    
            // Tambahkan pengecekan untuk cara bayar Kredit
            if ($cara_bayar == 'Kredit') {
                $user_limit = $this->PenggunaModel->get_user_limit($pengguna_id);
                $limit_total = $this->PenggunaModel->get_limit_total($pengguna_id);
                if ($user_limit + $total > $limit_total) {
                    $this->session->set_flashdata('alert', 'error-limit');
                    redirect('transaksi/tambah');
                }
    
                // Update limit pengguna
                $new_limit = $user_limit + $total;
                $this->PenggunaModel->update_user_limit($pengguna_id, $new_limit);
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
                foreach ($nama_barang as $key => $barang_id) {
                    $detail_data[] = array(
                        'id_transaksi' => $id_transaksi,
                        'id_barang' => $barang_id,
                        'jenis_barang' => $jenis_barang[$key], 
                        'nama_barang' => trim($barang_id),
                        'harga_waktu' => $harga_waktu[$key],
                        'harga' => floatval($harga_input[$key]),
                        'jumlah' => intval($jumlah[$key]),
                        'total' => floatval($this->input->post('total')[$key]),
                    );
    
                    // Update stok barang jika jenisnya adalah toko atau konsinyasi
                    if ($jenis_barang[$key] == 'toko') {
                        $this->BarangModel->update_stok_barang($barang_id, -intval($jumlah[$key]));
                    } elseif ($jenis_barang[$key] == 'konsinyasi') {
                        $this->KonsinyasiModel->update_stok_konsinyasi($barang_id, -intval($jumlah[$key]));
                    }
                }
    
                $this->TransaksiModel->insert_transaksi_detail($detail_data);
    
                // Tambahkan pesan ke history
                $this->addMessage('Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh ' . $nama_pengguna . ' dengan total Rp ' . number_format($total, 0, ',', '.'), 'add_circle_outline');
    
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
            $data['konsinyasi'] = $this->KonsinyasiModel->lihat_semuanya();
            parent::template('transaksi/tambah', $data);
        }
    }
    
    public function ubah($id = null)
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $id_transaksi = $this->input->post('id_transaksi');
            $pengguna_id = $this->input->post('nama');
            $cara_bayar = $this->input->post('cara_bayar');
            $detail = $this->input->post('detail');
            $harga_waktu = $this->input->post('harga_jual');
            $total_baru = array_sum(array_map('floatval', $this->input->post('total')));

            // Ambil data transaksi lama
            $transaksi_lama = $this->TransaksiModel->get_transaksi_by_id($id_transaksi);
            $total_lama = floatval($transaksi_lama->total);
            $cara_bayar_lama = $transaksi_lama->cara_bayar;
            $pengguna = $this->PenggunaModel->get_user_by_id($pengguna_id);
            $nama_pengguna = $pengguna->username;

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
                $limit_total = $this->PenggunaModel->get_limit_total($pengguna_id); // Ambil limit total dari database

                if ($total_baru > $total_lama) {
                    $selisih = $total_baru - $total_lama;
                    if ($user_limit + $selisih > $limit_total) {
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
            $this->addMessage('Transaksi diubah', 'Transaksi telah berhasil diubah yang dibeli oleh ' . $nama_pengguna . ' dengan total Rp ' . number_format($total_baru, 0, ',', '.'), 'edit'); 

            $harga = $this->input->post('harga');
            $jumlah = $this->input->post('jumlah');
            $nama_barang = $this->input->post('nama_barang');
            $jenis_barang = $this->input->post('jenis_barang');

            if (empty($jumlah) || empty($nama_barang) || empty($harga) || empty($total_baru)) {
                $this->session->set_flashdata('alert', 'error-update-detail');
                redirect('transaksi/ubah/' . $id_transaksi);
            }

            // Ambil detail barang lama
            $detail_lama = $this->TransaksiModel->get_transaksi_detail($id_transaksi);

            // Simpan detail barang baru
            $detail_data = array();
            foreach ($nama_barang as $key => $barang_id) {
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
                    'jenis_barang' => $jenis_barang[$key],
                    'nama_barang' => trim($nama_barang[$key]),
                    'harga_waktu' => $harga_waktu[$key],
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
            $data['konsinyasi'] = $this->KonsinyasiModel->lihat_semua();
            $data['title'] = 'Ubah Transaksi';
            parent::template('transaksi/ubah', $data);
        }
    }
}
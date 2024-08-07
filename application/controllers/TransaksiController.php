<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NotifikasiModel'); // Load NotifikasiModel  
        $this->load->model('TransaksiModel');
        $this->load->model('PenggunaModel');
        $this->load->model('BarangModel');
        $this->load->model('HistoryModel'); // Load model History
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $this->HistoryModel->deleteOldMessages(); // Hapus pesan lama
    }

    public function index()
    {
        // Memanggil fungsi untuk memeriksa limit kredit dan mengirimkan notifikasi
        $this->check_credit_limit_and_notify();

        // Lanjutkan dengan proses lainnya
        $data['title'] = 'Transaksi';
        $data['notifikasi_count'] = $this->NotifikasiModel->countUnreadNotifikasi($this->session->userdata('pengguna_id'));
        $data['transaksi'] = $this->TransaksiModel->get_all_transaksi();

        // Menampilkan view berdasarkan level pengguna
        if ($this->session->userdata('level') == 'admin'){
            parent::template('transaksi/index', $data);
        } elseif ($this->session->userdata('level') == 'user') {
            parent::user_template('transaksi/index', $data);
        }
    }

    private function check_credit_limit_and_notify()
    {
        $credit_limit = 100000; // Contoh limit kredit

        // Ambil transaksi dengan total melebihi limit kredit
        $this->db->where('total >', $credit_limit);
        $query = $this->db->get('tb_transaksi');
        $transaksi_list = $query->result_array();

        foreach ($transaksi_list as $transaksi) {
            // Menambahkan notifikasi
            $data = [
                'pengguna_id' => $transaksi['pengguna_id'], // ID pengguna yang relevan
                'pesan' => 'Transaksi ID ' . htmlspecialchars($transaksi['id_transaksi']) . ' mencapai limit kredit. Harap periksa.',
                'status' => 'belum_dibaca',
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->NotifikasiModel->tambah_notifikasi($data);
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
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $pengguna_id = $this->input->post('nama');
            $cara_bayar = $this->input->post('cara_bayar');
            $detail = $this->input->post('detail'); 

            if (empty($pengguna_id) || empty($cara_bayar)) {
                parent::alert('alert', 'error-insert');
                redirect('transaksi/tambah');
            }

            $total = array_sum(array_map('floatval', $this->input->post('total')));
            $id_barang = $this->input->post('id_barang');
            $jumlah = $this->input->post('jumlah');

            foreach ($id_barang as $key => $barang_id) {
                $barang = $this->BarangModel->get_barang_by_id($barang_id);
                if (!$barang) {
                    parent::alert('alert', 'error-invalid-barang');
                    redirect('transaksi/tambah');
                }

                if ($jumlah[$key] <= 0) {
                    parent::alert('alert', 'error-update-detail');
                    redirect('transaksi/tambah');
                }

                if ($barang->stok < $jumlah[$key]) {
                    parent::alert('alert', 'error-stock');
                    redirect('transaksi/tambah');
                }
            }

            // Tambahkan pengecekan untuk cara bayar Kredit
            if ($cara_bayar == 'Kredit') {
                $user_limit = $this->PenggunaModel->get_user_limit($pengguna_id); // Ambil limit pengguna
                if ($user_limit + $total > 1500000) {
                    parent::alert('alert', 'error-limit'); // Alert jika limit terlampaui
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

                parent::alert('alert', 'success-insert');
                redirect('transaksi');
            } else {
                parent::alert('alert', 'error-insert');
                redirect('transaksi/tambah');
            }
        } else {
            $data['title'] = 'Tambah Transaksi';
            $data['pengguna'] = $this->PenggunaModel->get_users();
            $data['barang'] = $this->BarangModel->lihat_semua();
            $data['notifikasi_count'] = $this->NotifikasiModel->countUnreadNotifikasi($this->session->userdata('pengguna_id'));

            if ($this->session->userdata('level') == 'admin') {
                parent::template('transaksi/tambah', $data);
            } elseif ($this->session->userdata('level') == 'operator') {
                parent::op_template('transaksi/tambah', $data);
            }
        }
    }

    public function ubah($id = null)
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
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
                        parent::alert('alert', 'error-limit');
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
            $this->addMessage('Transaksi diubah', 'Transaksi dengan total ' . number_format($total_lama, 0, ',', '.') . ' Rupiah telah diubah', 'update');

            $id_barang = $this->input->post('id_barang');
            $jumlah = $this->input->post('jumlah');
            $barang_dikembalikan = [];

            foreach ($id_barang as $key => $barang_id) {
                $barang = $this->BarangModel->get_barang_by_id($barang_id);
                if (!$barang) {
                    parent::alert('alert', 'error-invalid-barang');
                    redirect('transaksi/ubah/' . $id_transaksi);
                }

                if ($jumlah[$key] <= 0) {
                    parent::alert('alert', 'error-update-detail');
                    redirect('transaksi/ubah/' . $id_transaksi);
                }

                $jumlah_dikembalikan = intval($jumlah[$key]);
                $barang_dikembalikan[] = $barang_id;

                // Kembalikan stok barang
                $this->BarangModel->update_stok_barang($barang_id, $jumlah_dikembalikan);
            }

            $detail_data = [];
            foreach ($barang_dikembalikan as $key => $barang_id) {
                $detail_data[] = array(
                    'id_transaksi' => $id_transaksi,
                    'id_barang' => $barang_id,
                    'nama_barang' => trim($this->input->post('nama_barang')[$key]),
                    'harga' => floatval($this->input->post('harga')[$key]),
                    'jumlah' => intval($jumlah[$key]),
                    'total' => floatval($this->input->post('total')[$key]),
                );
            }

            $this->TransaksiModel->update_transaksi_detail($id_transaksi, $detail_data);

            parent::alert('alert', 'success-update');
            redirect('transaksi');
        } else {
            if (empty($id)) {
                parent::alert('alert', 'error-notfound');
                redirect('transaksi');
            }

            $data['title'] = 'Ubah Transaksi';
            $data['notifikasi_count'] = $this->NotifikasiModel->countUnreadNotifikasi($this->session->userdata('pengguna_id'));
            $data['transaksi'] = $this->TransaksiModel->get_transaksi_by_id($id);
            $data['detail'] = $this->TransaksiModel->get_detail_transaksi_by_id($id);
            $data['pengguna'] = $this->PenggunaModel->get_users();
            $data['barang'] = $this->BarangModel->lihat_semua();

            if ($this->session->userdata('level') == 'admin') {
                parent::template('transaksi/ubah', $data);
            } elseif ($this->session->userdata('level') == 'operator') {
                parent::op_template('transaksi/ubah', $data);
            }
        }
    }

    public function hapus($id = null)
    {
        if (empty($id)) {
            parent::alert('alert', 'error-notfound');
            redirect('transaksi');
        }

        $transaksi = $this->TransaksiModel->get_transaksi_by_id($id);
        $total_transaksi = $transaksi->total;

        $detail_transaksi = $this->TransaksiModel->get_detail_transaksi_by_id($id);
        foreach ($detail_transaksi as $detail) {
            $this->BarangModel->update_stok_barang($detail->id_barang, $detail->jumlah);
        }

        if ($this->TransaksiModel->delete_transaksi($id)) {
            // Tambahkan pesan ke history
            $this->addMessage('Transaksi dihapus', 'Transaksi dengan total ' . number_format($total_transaksi, 0, ',', '.') . ' Rupiah telah dihapus', 'delete');

            parent::alert('alert', 'success-delete');
        } else {
            parent::alert('alert', 'error-delete');
        }

        redirect('transaksi');
    }
}

<?php

class PinjamanController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PinjamanModel');
        $this->load->model('HistoryModel'); 
        $this->load->model('PenggunaModel'); // Tambahkan ini untuk memuat model PenggunaModel
        $this->load->helper('date'); 
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'user') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['title'] = 'Pinjaman';

        if ($this->session->userdata('level') == 'admin') {
            $data['pengajuan'] = $this->PinjamanModel->get_all_pinjaman();
        } else if ($this->session->userdata('level') == 'user') {
            $user_id = $this->session->userdata('pengguna_id'); // Ambil user_id dari sesi
            $data['pengajuan'] = $this->PinjamanModel->get_pinjaman_by_user($user_id);
        }
        parent::template('pinjaman/index', $data);
    }

    public function tambah()
    {
        if ($this->input->post()) {
            // Tentukan user ID berdasarkan level user
            if ($this->session->userdata('level') == 'admin') {
                $user_id = $this->input->post('username');
            } else {
                $user_id = $this->session->userdata('pengguna_id');
            }
    
            // Ambil nilai input mentah
            $jenis_pinjaman = $this->input->post('jenis_pinjaman');
            $tanggal_pinjam = $this->input->post('tanggal_pinjam');
            $jumlah_pinjaman = $this->input->post('jumlah_pinjaman');
            $lama_pinjaman = $this->input->post('lama_pinjaman');
    
            // Hapus format dari jumlah_pinjaman (hapus titik)
            $jumlah_pinjaman = str_replace('.', '', $jumlah_pinjaman);
    
            // Beri nilai default untuk tanggal_pinjam jika tidak ada
            if (empty($tanggal_pinjam)) {
                $tanggal_pinjam = date('Y-m-d');
            }
    
            $data = [
                'jenis_pinjaman' => $jenis_pinjaman,
                'tanggal_pinjam' => $tanggal_pinjam,
                'jumlah_pinjaman' => $jumlah_pinjaman,
                'lama_pinjaman' => $lama_pinjaman,
                'status' => 'Menunggu Persetujuan',
                'user_id' => $user_id
            ];
    
            $this->PinjamanModel->insert_pinjaman($data);
    
            if ($this->db->affected_rows() > 0) {
                // Ambil nama pengguna
                $pengguna = $this->PenggunaModel->get_user_by_id($user_id);
                $nama_pengguna = $pengguna->username;

                $this->addMessage(
                    'Pengajuan pinjaman',
                    'Pinjaman sebesar Rp ' . number_format($data['jumlah_pinjaman'], 0, ',', '.') . ' telah diajukan dengan nama ' . $nama_pengguna,
                    'add_circle_outline'
                );
                parent::alert('alert', 'success-insert'); // Menambahkan alert sukses
                redirect('pinjaman');
            } else {
                $this->session->set_flashdata('alert', 'error-insert'); // Mengubah alert gagal
                redirect('pinjaman/tambah');
            }
        } else {
            $data['title'] = 'Tambah Pinjaman';
    
            // Load users jika user adalah admin
            if ($this->session->userdata('level') == 'admin') {
                $data['users'] = $this->PinjamanModel->get_all_users(); // Ambil semua pengguna untuk dropdown
            }
    
            parent::template('pinjaman/tambah', $data);
        }
    }    

    public function update_status()
    {
        $id_pinjaman = $this->input->post('id_pinjaman');
        $status = $this->input->post('status');

        $newStatus = ($status === 'approved') ? 'Telah Disetujui oleh Admin' : 'Dibatalkan oleh Admin';
        $result = $this->PinjamanModel->update_status($id_pinjaman, $newStatus);

        if ($result) {
            // Ambil user_id dari pinjaman
            $pinjaman = $this->PinjamanModel->get_pinjaman_by_id($id_pinjaman);
            $user_id = $pinjaman->user_id;

            // Ambil nama pengguna
            $pengguna = $this->PenggunaModel->get_user_by_id($user_id);
            $nama_pengguna = $pengguna->username;

            // Tambahkan pesan ke history
            $this->addMessage('Status pinjaman', 'Status pinjaman dengan nama ' . $nama_pengguna . ' telah diubah menjadi: ' . $newStatus, 'update');
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal memperbarui status.']);
        }
    }

    public function approve($id)
    {
        if ($this->PinjamanModel->updateStatus($id, 'Telah Disetujui oleh Admin')) {
            // Ambil user_id dari pinjaman
            $pinjaman = $this->PinjamanModel->get_pinjaman_by_id($id);
            $user_id = $pinjaman->user_id;

            // Ambil nama pengguna
            $pengguna = $this->PenggunaModel->get_user_by_id($user_id);
            $nama_pengguna = $pengguna->username;

            // Tambahkan pesan ke history
            $this->addMessage('Pinjaman disetujui', 'Pinjaman dengan nama ' . $nama_pengguna . ' telah disetujui oleh Admin', 'check_circle'); // Ganti icon dengan 'check_circle'
            parent::alert('alert', 'success-approve'); // Menambahkan alert sukses
        } else {
            parent::alert('alert', 'error-approve'); // Mengubah alert gagal
        }

        redirect('pinjaman');
    }

    // Cancel a loan
    public function cancel($id)
    {
        if ($this->PinjamanModel->updateStatus($id, 'Dibatalkan oleh Admin')) {
            // Ambil user_id dari pinjaman
            $pinjaman = $this->PinjamanModel->get_pinjaman_by_id($id);
            $user_id = $pinjaman->user_id;

            // Ambil nama pengguna
            $pengguna = $this->PenggunaModel->get_user_by_id($user_id);
            $nama_pengguna = $pengguna->username;

            // Tambahkan pesan ke history
            $this->addMessage('Pinjaman dibatalkan', 'Pinjaman dengan nama ' . $nama_pengguna . ' telah dibatalkan oleh Admin', 'cancel'); // Ganti icon dengan 'cancel'
            parent::alert('alert', 'success-cancel'); // Menambahkan alert sukses
        } else {
            parent::alert('alert', 'error-cancel'); // Mengubah alert gagal
        }

        redirect('pinjaman');
    }

    // Delete a loan
    public function delete($id)
    {
        if ($this->PinjamanModel->deleteLoan($id)) {
            // Ambil user_id dari pinjaman
            $pinjaman = $this->PinjamanModel->get_pinjaman_by_id($id);
            $user_id = $pinjaman->user_id;

            // Ambil nama pengguna
            $pengguna = $this->PenggunaModel->get_user_by_id($user_id);
            $nama_pengguna = $pengguna->username;

            // Tambahkan pesan ke history
            $this->addMessage('Pinjaman dihapus', 'Pinjaman dengan nama ' . $nama_pengguna . ' telah dihapus', 'delete');
            parent::alert('alert', 'success-cancel'); // Menambahkan alert sukses
        } else {
            parent::alert('alert', 'error-cancel'); // Mengubah alert gagal
        }

        redirect('pinjaman');
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
}
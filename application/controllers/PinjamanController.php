<?php

class PinjamanController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PinjamanModel');
        $this->load->model('HistoryModel'); 
        $this->load->helper('date'); 
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'user') {
            redirect(base_url());
        }
        $this->HistoryModel->deleteOldMessages();
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
            $username = $this->session->userdata('username');
    
            $this->PinjamanModel->insert_pinjaman($data);
    
            if ($this->db->affected_rows() > 0) {
                $this->addMessage(
                    'Pengajuan pinjaman',
                    'Pengguna dengan ID ' . $user_id . ' telah mengajukan pinjaman sebesar ' . number_format($data['jumlah_pinjaman'], 0, ',', '.'),
                    'add_circle_outline'
                );
                redirect('pinjaman');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan pengajuan pinjaman.');
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
        $name = $this->input->post('username');
        $status = $this->input->post('status');

        $newStatus = ($status === 'approved') ? 'Telah Disetujui oleh Admin' : 'Dibatalkan oleh Admin';
        $result = $this->PinjamanModel->update_status($name, $newStatus);

        if ($result) {
            // Tambahkan pesan ke history
            $this->addMessage('Status pinjaman', 'Status pinjaman dengan nama ' . $name . ' telah diubah menjadi: ' . $newStatus, 'update');
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal memperbarui status.']);
        }
    }

    public function approve($id)
    {
        $username = $this->session->userdata('username');
        if ($this->PinjamanModel->updateStatus($id, 'Telah Disetujui oleh Admin')) {
            // Tambahkan pesan ke history
            $this->addMessage('Pinjaman disetujui', 'Pinjaman dengan ID ' . $username . ' telah disetujui oleh Admin', 'update');
            $this->session->set_flashdata('message', 'Pinjaman berhasil disetujui.');
        } else {
            $this->session->set_flashdata('message', 'Gagal menyetujui pinjaman.');
        }

        redirect('pinjaman');
    }

    // Cancel a loan
    public function cancel($id)
    {
        $username = $this->session->userdata('username');
        if ($this->PinjamanModel->updateStatus($id, 'Dibatalkan oleh Admin')) {
            // Tambahkan pesan ke history
            $this->addMessage('Pinjaman dibatalkan', 'Pinjaman dengan Nama ' . $username . ' telah dibatalkan oleh Admin', 'delete');
            $this->session->set_flashdata('message', 'Pinjaman berhasil dibatalkan.');
        } else {
            $this->session->set_flashdata('message', 'Gagal membatalkan pinjaman.');
        }

        redirect('pinjaman');
    }

    // Delete a loan
    public function delete($id)
    {
        if ($this->PinjamanModel->deleteLoan($id)) {
            // Tambahkan pesan ke history
            $this->addMessage('Pinjaman dihapus', 'Pinjaman dengan ID ' . $id . ' telah dihapus', 'delete');
            $this->session->set_flashdata('message', 'Pinjaman berhasil dihapus.');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus pinjaman.');
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
            'role' => $this->session->userdata('level')
        ];
        $this->HistoryModel->addMessage($data);
    }
}
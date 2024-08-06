<?php

class PinjamanController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PinjamanModel');
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Pinjaman';

        if ($this->session->userdata('level') == 'admin') {
            $data['pengajuan'] = $this->PinjamanModel->get_all_pinjaman();
        } else if ($this->session->userdata('level') == 'user') {
            $user_id = $this->session->userdata('user_id'); // Ambil user_id dari sesi
            $data['pengajuan'] = $this->PinjamanModel->get_pinjaman_by_user($user_id);
        }

        if ($this->session->userdata('level') == 'user') {
            parent::user_template('pinjaman/index', $data);
        } elseif ($this->session->userdata('level') == 'admin') {
            parent::template('pinjaman/index', $data);
        }
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id'); // Ambil user_id dari sesi
            $data = [
                'jenis_pinjaman' => $this->input->post('jenis_pinjaman'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'jumlah_pinjaman' => $this->input->post('jumlah_pinjaman'),
                'lama_pinjaman' => $this->input->post('lama_pinjaman'),
                'waktu_pengajuan' => date('Y-m-d H:i:s'),
                'status' => 'Menunggu Persetujuan',
                'user_id' => $user_id // Tambahkan user_id ke data
            ];

            $this->PinjamanModel->insert_pinjaman($data);

            if ($this->db->affected_rows() > 0) {
                redirect('pinjaman');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan pengajuan pinjaman.');
                redirect('pinjaman/tambah');
            }
        } else {
            $data['title'] = 'Tambah Pengajuan';
            if ($this->session->userdata('level') == 'admin')
                parent::template('pinjaman/tambah', $data);
            elseif ($this->session->userdata('level') == 'user')
                parent::user_template('pinjaman/tambah', $data);
        }
    }

    public function update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $newStatus = ($status === 'approved') ? 'Telah Disetujui oleh Admin' : 'Dibatalkan oleh Admin';
        $result = $this->PinjamanModel->update_status($id, $newStatus);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal memperbarui status.']);
        }
    }

    public function approve($id)
    {
        $this->load->model('PinjamanModel');

        if ($this->PinjamanModel->updateStatus($id, 'Telah Disetujui oleh Admin')) {
            $this->session->set_flashdata('message', 'Pinjaman berhasil disetujui.');
        } else {
            $this->session->set_flashdata('message', 'Gagal menyetujui pinjaman.');
        }

        redirect('pinjaman');
    }

    // Cancel a loan
    public function cancel($id)
    {
        $this->load->model('PinjamanModel');

        if ($this->PinjamanModel->updateStatus($id, 'Dibatalkan oleh Admin')) {
            $this->session->set_flashdata('message', 'Pinjaman berhasil dibatalkan.');
        } else {
            $this->session->set_flashdata('message', 'Gagal membatalkan pinjaman.');
        }

        redirect('pinjaman');
    }

    // Delete a loan
    public function delete($id)
    {
        $this->load->model('PinjamanModel');

        if ($this->PinjamanModel->deleteLoan($id)) {
            $this->session->set_flashdata('message', 'Pinjaman berhasil dihapus.');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus pinjaman.');
        }

        redirect('pinjaman');
    }
}

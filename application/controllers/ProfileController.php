<?php

class ProfileController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->model('HistoryModel');
        $this->load->model('PenggunaModel');
        $this->load->helper('date');

        if (!parent::hasLogin()) {
            redirect('login');
        }
        $this->HistoryModel->deleteOldMessages();
        $this->ProfileModel->cleanupUnusedProfilePictures();
    }

    public function index()
    {
        // Ambil ID pengguna dari sesi
        $penggunaID = $this->session->userdata('pengguna_id');

        // Ambil data pengguna dari model
        $data['pengguna'] = $this->ProfileModel->get_profile_by_id($penggunaID);
        $data['sisa'] = $this->PenggunaModel->get_sisa_limit($penggunaID);
        $data['title'] = 'Profil Pengguna';

        // Tampilkan view profil
        parent::template('profile/index', $data);
    }

    public function upload_picture()
    {
        // Set path untuk menyimpan gambar
        $upload_path = './assets/upload/profile_picture/';

        // Konfigurasi upload
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|heic';
        $config['max_size'] = 2048; // Ukuran maksimum dalam kilobyte (2MB)
        $config['file_name'] = uniqid(); // Berikan nama unik pada file yang diupload

        // Load library upload
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // Jika upload berhasil
        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();

            // Dapatkan nama file yang telah diupload
            $file_name = $file_data['file_name'];

            // Dapatkan ID pengguna dari session
            $pengguna_id = $this->session->userdata('pengguna_id');

            // Ambil nama file gambar profil yang sebelumnya
            $current_picture = $this->session->userdata('profile_picture');

            // Hapus gambar sebelumnya jika bukan 'default.png'
            if ($current_picture && $current_picture !== 'default.png') {
                $current_picture_path = $upload_path . $current_picture;
                if (file_exists($current_picture_path)) {
                    unlink($current_picture_path);
                }
            }

            // Update nama file di database melalui model
            $update_status = $this->ProfileModel->update_profile_picture($pengguna_id, $file_name);

            // Cek apakah update berhasil
            if ($update_status) {
                $this->session->set_userdata('profile_picture', $file_name);
                // Tambahkan pesan ke history
                $this->addMessage('Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'update');
                // Tampilkan pesan sukses hanya jika request via AJAX
                if ($this->input->is_ajax_request()) {
                    echo json_encode(['status' => 'success', 'message' => 'Foto profil berhasil diperbarui']);
                } else {
                    // Redirect ke halaman profil jika bukan AJAX
                    redirect('profile');
                }
            } else {
                // Tampilkan pesan error jika update di database gagal
                if ($this->input->is_ajax_request()) {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui foto profil di database']);
                } else {
                    // Tampilkan pesan error di halaman profil
                    $this->session->set_flashdata('error', 'Gagal memperbarui foto profil di database');
                    redirect('profile');
                }
            }
        } else {
            // Jika upload gagal, tampilkan pesan error
            $error = $this->upload->display_errors();
            if ($this->input->is_ajax_request()) {
                echo json_encode(['status' => 'error', 'message' => $error]);
            } else {
                $this->session->set_flashdata('error', $error);
                redirect('profile');
            }
        }
    }

    public function delete_picture()
    {
        // Dapatkan ID pengguna dari session
        $pengguna_id = $this->session->userdata('pengguna_id');

        // Update nama file di database menjadi 'default.png'
        $update_status = $this->ProfileModel->update_profile_picture($pengguna_id, 'default.png');

        // Tampilkan respons JSON
        if ($update_status) {
            $this->session->set_userdata('profile_picture', 'default.png');
            // Tambahkan pesan ke history
            $this->addMessage('Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'delete');
            echo json_encode(['status' => 'success', 'message' => 'Foto profil berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus foto profil']);
        }
    }

    public function update()
    {
        // Ambil ID pengguna dari sesi
        $penggunaID = $this->session->userdata('pengguna_id');

        // Ambil data pengguna dari model untuk mendapatkan password lama
        $current_user = $this->ProfileModel->get_profile_by_id($penggunaID);

        // Data yang akan diperbarui
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
        );

        // Ambil input password baru
        $new_password = $this->input->post('password');

        // Jika password baru diisi, hash password baru, jika tidak, hapus dari array data
        if (!empty($new_password)) {
            $data['password'] = md5($new_password); // Hash password baru
        }

        // Update data profil di database
        if ($this->ProfileModel->update_profile($penggunaID, $data)) {
            // Tambahkan pesan ke history
            $this->addMessage('Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'update');

            $this->session->set_userdata('name', $data['nama_lengkap']);
            $this->session->set_userdata('email', $data['email']);

            // Tampilkan pesan sukses
            parent::alert('alert', 'profile-updated');
        } else {
            // Tampilkan pesan error jika update gagal
            parent::alert('alert', 'update-error');
        }

        redirect('profile');
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
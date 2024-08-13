<?php

class ProfileController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->model('HistoryModel'); // Load HistoryModel
        $this->load->helper('url');
        
        if (!parent::hasLogin()) {
            redirect('login');
        }
        $this->HistoryModel->deleteOldMessages();
    }

    public function index()
    {
        // Ambil ID pengguna dari sesi
        $penggunaID = $this->session->userdata('pengguna_id');

        // Ambil data pengguna dari model
        $data['pengguna'] = $this->ProfileModel->get_profile_by_id($penggunaID);
        $data['title'] = 'Profil Pengguna';

        // Tampilkan view profil
        parent::template('profile/index', $data);
    }

    public function upload_picture()
    {
        // Ambil ID pengguna dari sesi
        $penggunaID = $this->session->userdata('pengguna_id');

        // Konfigurasi upload
        $config['upload_path'] = './assets/upload/dokumen/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_picture')) {
            $uploadData = $this->upload->data();
            $fileName = $uploadData['file_name'];

            // Update nama file di database
            $this->ProfileModel->update_profile_picture($penggunaID, $fileName);

            // Tambahkan pesan ke history
            $this->addMessage('Gambar profil diupload', 'Pengguna dengan ID ' . $penggunaID . ' telah mengubah gambar profil.', 'update');

            // Tampilkan pesan sukses
            parent::alert('alert', 'profile-picture-updated');
            redirect('profile');
        } else {
            // Tampilkan pesan error
            parent::alert('alert', 'upload-error');
            redirect('profile');
        }
    }

    public function update()
    {
        // Ambil ID pengguna dari sesi
        $penggunaID = $this->session->userdata('pengguna_id');

        // Data yang akan diperbarui
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'satker' => $this->input->post('satker'),
            'pengguna_date_update' => date('Y-m-d H:i:s') // Menambahkan data waktu sekarang
        );

        // Cek apakah foto profil diupload
        if (!empty($_FILES['profile_picture']['name'])) {
            // Konfigurasi upload
            $config['upload_path'] = './assets/upload/dokumen/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile_picture')) {
                $uploadData = $this->upload->data();
                $fileName = $uploadData['file_name'];
                $data['pengguna_picture'] = $fileName;
            } else {
                // Tampilkan pesan error jika upload gagal
                parent::alert('alert', 'upload-error');
                redirect('profile');
            }
        }

        // Update data profil di database
        if ($this->ProfileModel->update_profile($penggunaID, $data)) {
            // Tambahkan pesan ke history
            $this->addMessage('Profil diupdate', 'Pengguna dengan ID ' . $penggunaID . ' telah memperbarui profil.', 'update');

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
            'message_date_time' => date('Y-m-d H:i:s'),
            'role' => $this->session->userdata('level')
        ];
        $this->HistoryModel->addMessage($data);
    }
}
<?php

class ProfileController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->helper('url');
        
        if (!parent::hasLogin()) {
            redirect('login');
        }
    }

    public function index()
    {
        // Ambil ID pengguna dari sesi
        $penggunaID = $this->session->userdata('pengguna_id');

        // Ambil data pengguna dari model
        $data['pengguna'] = $this->ProfileModel->get_profile_by_id($penggunaID);
        $data['title'] = 'Profil Pengguna';

        // Tampilkan view profil
        if ($this->session->userdata('level') == 'admin'){
            parent::template('profile/index', $data);
        }elseif ($this->session->userdata('level') == 'operator') {
            parent::op_template('profile/index', $data);
        }elseif ($this->session->userdata('level') == 'user') {
            parent::user_template('profile/index', $data);
        }
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
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'satker' => $this->input->post('satker')
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
            // Tampilkan pesan sukses
            parent::alert('alert', 'succes-edit');
        } else {
            // Tampilkan pesan error jika update gagal
            parent::alert('alert', 'error-edit');
        }

        redirect('profile');
    }
}
?>

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
        $userID = $this->session->userdata('pengguna_id');

        // Ambil data pengguna dari model
        $data['pengguna'] = $this->ProfileModel->get_profile_by_id($userID);
        $data['title'] = 'Profil Pengguna';

        // Tampilkan view profil
        parent::template('profile/index', $data);
    }

    public function upload_picture()
    {
        // Ambil ID pengguna dari sesi
        $userID = $this->session->userdata('pengguna_id');

        // Konfigurasi upload
        $config['upload_path'] = './assets/upload/dokumen/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_picture')) {
            $uploadData = $this->upload->data();
            $fileName = $uploadData['file_name'];

            // Update nama file di database
            $this->ProfileModel->update_profile_picture($userID, $fileName);

            // Tampilkan pesan sukses
            parent::alert('alert', 'profile-picture-updated');
            redirect('profile');
        } else {
            // Tampilkan pesan error
            parent::alert('alert', 'upload-error');
            redirect('profile');
        }
    }

    public function update() {
        // Dapatkan data dari form
        $nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $satker = $this->input->post('satker');
        
        // Proses update ke database
        $data = array(
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'email' => $email,
            'satker' => $satker,
        );
        
        $this->db->where('pengguna_id', $this->session->userdata('pengguna_id'));
        $update = $this->db->update('tb_pengguna', $data);
        $userID = $this->session->userdata('pengguna_id');
        
        if($update) {
            // Perbarui session
            $this->session->set_userdata('name', $nama_lengkap);
            $this->NotificationController->add_profile_change_notification($userID);
            
            // Redirect ke halaman profil dengan pesan sukses
            $this->session->set_flashdata('alert', 'sukses_ubah');
            redirect('profile');
        } else {
            // Redirect ke halaman profil dengan pesan error
            $this->session->set_flashdata('alert', 'gagal_ubah');
            redirect('profile');
        }
    }
    
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends GLOBAL_Controller {
    
    // Konstruktor kelas Profile
    public function __construct()
    {
        parent::__construct();
        
        // Mengecek apakah user sudah login
        if (!$this->hasLogin()) {
            redirect('login'); // Mengarahkan ke halaman login jika belum login
        }
        
        // Memuat model User
        $this->load->model('ProfilModel');
    }
    
    // Menentukan template berdasarkan hak akses pengguna
    private function loadTemplate($content, $data)
    {
        switch ($this->userLevel) {
            case 'user':
                $this->user_template($content, $data);
                break;
            case 'operator':
                $this->op_template($content, $data);
                break;
            case 'admin':
                $this->template($content, $data);
                break;
            default:
                show_error('Hak akses tidak dikenal.', 403);
                break;
        }
    }
    
    // Metode untuk menampilkan profil pengguna
    public function index()
    {
        $data['user'] = $this->ProfilModel->getUserById($this->userId);
        $this->loadTemplate('profile/view', $data);
    }
    
    // Metode untuk menampilkan form ubah profil
    public function edit()
    {
        $data['user'] = $this->ProfilModel->getUserById($this->userId);
        $this->loadTemplate('profile/edit', $data);
    }
    
    // Metode untuk memproses perubahan profil
    public function update()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() === FALSE) {
            $this->edit();
        } else {
            $userData = array(
                'username' => $this->post('username'),
                'email' => $this->post('email'),
                'level' => $this->post('pengguna_hak_akses')
            );
            
            $this->ProfilModel->updateUser($this->userId, $userData);
            $this->alert('success', 'Profil berhasil diperbarui');
            redirect('profile');
        }
    }
}
?>

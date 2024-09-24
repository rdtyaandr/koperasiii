<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

class AuthController extends GLOBAL_Controller
{
    // Konstruktor untuk memuat model AuthModel
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
         // Memuat NotifikasiModel
    }
    
    
    /*
     * login, register, logout
     * autentikasi pengguna sales, adminSales, adminGudang dan Superadmin
     *
     **/
    // Fungsi untuk login pengguna
    // Fungsi untuk login pengguna
public function login()
{
    // Cek apakah pengguna sudah login
    if (parent::hasLogin()){
        redirect(base_url());
    } else {
        // Jika form login disubmit
        if (isset($_POST['login'])){
            $username = parent::post('username');
            $password = (parent::post('password'));
            
            // Ambil data pengguna dari database
            $dataPengguna = $this->AuthModel->get_pengguna($username, md5($password));
            
            // Jika data pengguna ditemukan
            if ($dataPengguna->num_rows() > 0){
                $pengguna = $dataPengguna->row_array();
                
                // Set data sesi pengguna
                $sessionData = array(
                    'pengguna_id' => $pengguna['pengguna_id'],
                    'username' => $pengguna['username'],
                    'name' => $pengguna['nama_lengkap'],
                    'level' => $pengguna['pengguna_hak_akses'],
                    'profile_picture' => $pengguna['profile_picture'], // Tambahkan foto profil ke sesi
                    'login' => true
                );
                $this->session->set_userdata($sessionData);
                parent::alert('alert','user-welcome');
                redirect(base_url());

            } else {
                parent::alert('alert','error-login');
            }
        }
        
        // Set judul halaman dan tampilkan halaman login
        $data['title'] = 'Masuk - Sistem Koperasi BPS';
        parent::authPage('auth/login', $data);
    }
}

    
    // Fungsi untuk logout pengguna
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}

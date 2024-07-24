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
		}
		
		/*
		 * login, register, logout
		 * autentikasi pengguna sales, adminSales, adminGudang dan Superadmin
		 *
		 * **/
		// Fungsi untuk login pengguna
		public function login()
		{
			// Cek apakah pengguna sudah login
			if (parent::hasLogin()){
				redirect(base_url());
			}else{
				// Jika form login disubmit
				if (isset($_POST['login'])){
					$username = parent::post('username');
					$password = parent::post('password');
					
					// Ambil data pengguna dari database
					$dataPengguna = parent::model('AuthModel')->get_pengguna($username,md5($password));
					
					// Jika data pengguna ditemukan
					if ($dataPengguna->num_rows() > 0){
						$pengguna = $dataPengguna->row_array();
						
						// Set data sesi pengguna
						$sessionData = array(
							'user_id' => $pengguna['pengguna_id'],
							'username' => $pengguna['pengguna_username'],
							'name' => $pengguna['pengguna_nama'],
							'level' => $pengguna['pengguna_hak_akses'],
							'login' => true
						);
						
						$this->session->set_userdata($sessionData);

						// Tampilkan pesan selamat datang dan redirect ke halaman utama
						parent::alert('alert','user-welcome');
						redirect(base_url());
					}else{
						// Tampilkan pesan error jika login gagal
						parent::alert('alert','error-login');
					}
				}
				
				// Set judul halaman dan tampilkan halaman login
				$data['title'] = 'Masuk - Sistem Koperasi Syariah';
				parent::authPage('auth/login',$data);
				
			}
		}
		
		// Fungsi untuk logout pengguna
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}

		// Fungsi untuk register pengguna baru
		public function register()
		{
			// Jika form register disubmit
			if (isset($_POST['register'])){
				$username = parent::post('username');
				$password = parent::post('password');
				$nama = parent::post('nama');
				$hakAkses = parent::post('hak_akses');
				
				// Data pengguna baru
				$dataPengguna = array(
					'pengguna_username' => $username,
					'pengguna_password' => md5($password),
					'pengguna_nama' => $nama,
					'pengguna_hak_akses' => $hakAkses
				);
				
				// Simpan data pengguna baru ke database
				$insert = parent::model('AuthModel')->insert_pengguna($dataPengguna);
				
				// Jika penyimpanan berhasil
				if ($insert){
					parent::alert('alert','register-success');
					redirect('login');
				}else{
					parent::alert('alert','register-failed');
				}
			}
			
			// Set judul halaman dan tampilkan halaman register
			$data['title'] = 'Daftar - Sistem Koperasi Syariah';
			parent::authPage('auth/register',$data);
		}
	}
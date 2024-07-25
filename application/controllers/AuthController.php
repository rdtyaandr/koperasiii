<?php
	/**
	 * Created by PhpStorm.
	 * User: ibag
	 * Date: 7/13/2019
	 * Time: 2:02 PM
	 */

	class AuthController extends GLOBAL_Controller
	{
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
		public function login()
		{
			if (parent::hasLogin()){
				redirect(base_url());
			}else{
				if (isset($_POST['login'])){
					$username = parent::post('username');
					$password = parent::post('password');
					
					$dataPengguna = parent::model('AuthModel')->get_pengguna($username,md5($password));
					
					if ($dataPengguna->num_rows() > 0){
						$pengguna = $dataPengguna->row_array();
						
						$sessionData = array(
							'user_id' => $pengguna['pengguna_id'],
							'username' => $pengguna['pengguna_username'],
							'name' => $pengguna['pengguna_nama'],
							'level' => $pengguna['pengguna_hak_akses'],
							'login' => true
						);
						
						$this->session->set_userdata($sessionData);

							parent::alert('alert','user-welcome');
							redirect(base_url());
					}else{
						parent::alert('alert','error-login');
					}
				}
				
				$data['title'] = 'Masuk - Sistem Koperasi Syariah';
				parent::authPage('auth/login',$data);
				
			}
		}
		
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}

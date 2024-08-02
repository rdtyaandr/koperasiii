<?php

	class UserController extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$model = array('loanModel');
			$this->load->model($model);
			if (!parent::hasLogin()) {
				$this->session->set_flashdata('alert', 'belum_login');
				redirect(base_url('login'));
			}

		}
		

		public function index()
		{
			$data['title'] = 'Halaman Utama';
			$data['loan'] = parent::model('loanModel')->get_loan_data();;

			parent::user_template('user/home',$data);
		}
		

	}

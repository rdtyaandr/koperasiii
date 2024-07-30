<?php

class PinjamanController extends GLOBAL_Controller
{

	public function __construct()
	{
		parent::__construct();
		$model = array('PinjamanModel');
		$this->load->model($model);
		if (!parent::hasLogin()) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	/*
	 * get modul
	 * */
	public function pinjamanPengajuan()
	{
		$data['title'] = 'Pinjaman Pengajuan';
		$data['mudharabah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/pengajuan', $data);
	}

	public function pinjamanMurabahah()
	{
		$data['title'] = 'Pinjaman Murabahah';
		$data['murabahah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/murabahah', $data);
	}

	public function pinjamanMusyarakah()
	{
		$data['title'] = 'Pinjaman Musyarakah';
		$data['musyarakah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/musyarakah', $data);
	}

	public function pinjamanIjarah()
	{
		$data['title'] = 'Pinjaman Ijarah';
		$data['ijarah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/ijarah', $data);
	}

	/*
	 * insert modul
	 * */
	public function pinjamanMutasi()
	{
		$data['title'] = 'Pinjaman Mutasi';
		$data['mudharabah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/mutasi', $data);
	}
	public function setuju($id)
	{
		$data = array(
			'pinjaman_status' => 'setuju',
		);

		$update = parent::model('PinjamanModel')->ubah($id, $data);

		if ($update > 0) {
			parent::alert('alert', 'sukses_setuju');
			redirect(base_url());
		} else {
			parent::alert('alert', 'gagal_setuju');
			redirect(base_url());
		}
	}

	public function tolak($id)
	{
		$data = array(
			'pinjaman_status' => 'tolak',
		);

		$update = parent::model('PinjamanModel')->ubah($id, $data);

		if ($update > 0) {
			parent::alert('alert', 'sukses_tolak');
			redirect(base_url());
		} else {
			parent::alert('alert', 'gagal_tolak');
			redirect(base_url());
		}
	}
}

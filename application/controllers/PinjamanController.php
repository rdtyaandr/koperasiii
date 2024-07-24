<?php

class PinjamanController extends GLOBAL_Controller{

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
    public function pinjamanMudharabah()
    {
        $data['title'] = 'Pinjaman Mudharabah';
		$data['mudharabah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

        parent::template('pinjaman/mudharabah',$data);
    }

    public function pinjamanMurabahah()
    {
        $data['title'] = 'Pinjaman Murabahah';
        $data['murabahah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

        parent::template('pinjaman/murabahah',$data);
    }

    public function pinjamanMusyarakah()
    {
        $data['title'] = 'Pinjaman Musyarakah';
        $data['musyarakah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

        parent::template('pinjaman/musyarakah',$data);
    }

    public function pinjamanIjarah()
    {
        $data['title'] = 'Pinjaman Ijarah';
        $data['ijarah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

        parent::template('pinjaman/ijarah',$data);
    }

    /*
     * insert modul
     * */
    public function tambahMudharabah()
    {
    	if (isset($_POST['tambah'])){
			$data = array(
				'pinjaman_anggota_id' => parent::post('anggota'),
				'pinjaman_jenis' => 'mudharobah',
				'pinjaman_total' => parent::post('total-pinjam'),
				'pinjaman_tenggat' => parent::post('tenggat-pinjam'),
				'pinjaman_keterangan' => 'PINJAMAN MUDHARABAH : Mudharobah adalah akad kerjasama usaha antara pemilik dana sebagai pihak yang menyediakan modal dengan pihak pengelola modal (koperasi), untuk diusahakan dengan bagi hasil (nisbah) sesuai dengan kesepakatan dimuka dari kedua belah pihak. Dalam hal ini Koperasi akan memberikan 100% permodalan kepada pengusaha yang telah memiliki tenaga kerja dan keterampilan tetapi belum memiliki modal sama sekali.'
			);

			$simpan = parent::model('PinjamanModel')->tambah($data);

			if ($simpan > 0 ){
				parent::alert('alert','sukses_tambah');
				redirect('pinjaman-mudharabah');
			} else {
				parent::alert('alert','gagal_tambah');
				redirect('pinjaman-mudharabah');
			}

		} else {
			$data['title'] = 'Tambah data pinjaman mudharabah';

			parent::template('pinjaman/tambahMudharabah',$data);
		}
    }

	public function setuju($id){
		$data = array(
			'pinjaman_status' => 'setuju',
		);

		$update = parent::model('PinjamanModel')->ubah($id,$data);

		if ($update > 0 ){
			parent::alert('alert','sukses_setuju');
			redirect(base_url());
		} else {
			parent::alert('alert','gagal_setuju');
			redirect(base_url());
		}
	}

	public function tolak($id){
		$data = array(
			'pinjaman_status' => 'tolak',
		);

		$update = parent::model('PinjamanModel')->ubah($id,$data);

		if ($update > 0 ){
			parent::alert('alert','sukses_tolak');
			redirect(base_url());
		} else {
			parent::alert('alert','gagal_tolak');
			redirect(base_url());
		}
	}
}

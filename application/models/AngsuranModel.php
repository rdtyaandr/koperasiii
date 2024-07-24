<?php

class AngsuranModel extends GLOBAL_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function lihat_semua()
	{
		$this->db->select('*');
		$this->db->from('simkopsis_angsuran');
		$this->db->join('simkopsis_pinjaman', 'simkopsis_pinjaman.pinjaman_id = simkopsis_angsuran.angsuran_pinjaman_id');
		$this->db->join('simkopsis_anggota', 'simkopsis_anggota.anggota_id = simkopsis_pinjaman.pinjaman_anggota_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah($data)
	{
		return parent::insert_with_status('simkopsis_angsuran', $data);
	}

}

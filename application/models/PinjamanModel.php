<?php

class PinjamanModel extends GLOBAL_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function lihat_semua(){
		$sourceTable = array('name'=>'simkopsis_pinjaman',
			array('pinjaman_anggota_id'));//array unique or id source
		$destinationTable = array(
			'table'=>array('simkopsis_anggota'), //array table
			'id'=>array('anggota_id'));//array unique or id destination
		return parent::get_join_table($sourceTable,$destinationTable);
	}

	public function tambah($data){
		return parent::insert_with_status('simkopsis_pinjaman',$data);
	}

	public function ubah($id,$data){
		return parent::update_table_with_status('simkopsis_pinjaman','pinjaman_id',$id,$data);
	}

	public function lihat($query){
		return parent::get_array_of_row('simkopsis_pinjaman',$query);
	}
}

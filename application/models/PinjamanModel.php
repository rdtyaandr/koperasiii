<?php

class PinjamanModel extends GLOBAL_Model
{
	public function __construct()
	{
		parent::__construct(); // Memanggil konstruktor dari kelas induk
	}

	public function lihat_semua(){
		$sourceTable = array('name'=>'simkopsis_pinjaman',
			array('pinjaman_anggota_id')); // Mendefinisikan tabel sumber
		$destinationTable = array(
			'table'=>array('simkopsis_anggota'), // Mendefinisikan tabel tujuan
			'id'=>array('anggota_id')); // Mendefinisikan ID unik untuk tabel tujuan
		return parent::get_join_table($sourceTable,$destinationTable); // Mengambil data dari tabel yang bergabung
	}

	public function tambah($data){
		return parent::insert_with_status('simkopsis_pinjaman',$data); // Menambahkan data ke tabel pinjaman
	}

	public function ubah($id,$data){
		return parent::update_table_with_status('simkopsis_pinjaman','pinjaman_id',$id,$data); // Mengubah data berdasarkan ID
	}

	public function lihat($query){
		return parent::get_array_of_row('simkopsis_pinjaman',$query); // Mengambil data berdasarkan query
	}
}
<?php

class PinjamanModel extends GLOBAL_Model
{
	public function __construct()
	{
		parent::__construct(); // Memanggil konstruktor dari kelas induk
	}

	public function lihat_semua()
	{
		$sourceTable = array(
			'name' => 'simkopsis_pinjaman',
			array('pinjaman_anggota_id')
		); // Mendefinisikan tabel sumber
		$destinationTable = array(
			'table' => array('simkopsis_anggota'), // Mendefinisikan tabel tujuan
			'id' => array('anggota_id')
		); // Mendefinisikan ID unik untuk tabel tujuan
		return parent::get_join_table($sourceTable, $destinationTable); // Mengambil data dari tabel yang bergabung
	}

	public function tambah($data)
	{
		return parent::insert_with_status('tb_pengajuan', $data);
	}

	public function ubah($id, $data)
	{
		return parent::update_table_with_status('simkopsis_pinjaman', 'pinjaman_id', $id, $data); // Mengubah data berdasarkan ID
	}

	public function lihat($query)
	{
		return parent::get_array_of_row('simkopsis_pinjaman', $query); // Mengambil data berdasarkan query
	}
	public function get_pinjaman()
	{
		$query = $this->db->get('tb_pengajuan');
		return $query->result_array();
	}

	public function get_pinjaman_list()
	{
		$query = $this->db->get('pinjaman');
		return $query->result_array();
	}


	// Metode untuk memasukkan data pinjaman ke dalam tabel
	public function insert_pinjaman($data)
	{
		return $this->db->insert('tb_pengajuan', $data);
	}
	public function get_all_pinjaman()
	{
		return $this->db->get('tb_pengajuan')->result_array();
	}
	public function get_pinjaman_by_user($user_id)
	{
		return $this->db->get_where('tb_pengajuan', ['user_id' => $user_id])->result_array();
	}


    public function update_status($id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        return $this->db->update('tb_pengajuan');
    }

	public function delete($id)
	{
		$this->db->where('id_pinjaman', $id);
		$this->db->delete('tb_pengajuan');
	}

	// Update the status of a loan
	public function updateStatus($id, $status)
	{
		$this->db->where('id', $id);
		return $this->db->update('tb_pengajuan', ['status' => $status]);
	}

	// Delete a loan
	public function deleteLoan($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tb_pengajuan');
	}

	public function delete_pinjaman($id)
    {
        return $this->db->delete('tb_pengajuan', ['id' => $id]);
    }
}

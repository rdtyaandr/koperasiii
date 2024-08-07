<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PinjamanModel extends GLOBAL_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function lihat_semua()
	{
		$sourceTable = [
			'name' => 'simkopsis_pinjaman',
			'join' => ['pinjaman_anggota_id']
		];
		$destinationTable = [
			'table' => ['simkopsis_anggota'],
			'id' => ['anggota_id']
		];
		return parent::get_join_table($sourceTable, $destinationTable);
	}

	public function tambah($data)
	{
		return $this->db->insert('tb_pengajuan', $data);
	}

	public function ubah($id, $data)
	{
		return $this->db->update('simkopsis_pinjaman', $data, ['pinjaman_id' => $id]);
	}

	public function lihat($query)
	{
		return parent::get_array_of_row('simkopsis_pinjaman', $query);
	}

	public function get_pinjaman()
	{
		return $this->db->get('tb_pengajuan')->result_array();
	}

	public function get_pinjaman_list()
	{
		return $this->db->get('pinjaman')->result_array();
	}

	public function insert_pinjaman($data)
	{
		return $this->db->insert('tb_pengajuan', $data);
	}

	public function get_all_pinjaman()
    {
        $this->db->select('tb_pengajuan.*, tb_pengguna.username'); // Select all fields from tb_pengajuan and username from tb_pengguna
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_pengguna', 'tb_pengajuan.pengguna_id= tb_pengguna.pengguna_id'); // Join with tb_pengguna based on user_id
        return $this->db->get()->result_array();
    }

    public function get_pinjaman_by_user($user_id)
    {
        $this->db->select('tb_pengajuan.*, tb_pengguna.username'); // Select all fields from tb_pengajuan and username from tb_pengguna
        $this->db->from('tb_pengajuan');
        $this->db->join('tb_pengguna', 'tb_pengajuan.pengguna_id = tb_pengguna.pengguna_id'); // Join with tb_pengguna based on user_id
        $this->db->where('tb_pengajuan.pengguna_id', $user_id); // Only fetch records matching the user_id
        return $this->db->get()->result_array();
    }

	
	public function update_status($id, $status)
	{
		$this->db->where('id_pinjaman', $id);
		$this->db->update('tb_pengajuan', ['status' => $status]);
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

	    // Tambahkan metode ini jika belum ada
		public function update_pinjaman($id, $data) {
			$this->db->where('id', $id);
			return $this->db->update('tb_pinjaman', $data);
		}
}

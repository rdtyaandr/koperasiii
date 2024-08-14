<?php
class PenggunaModel extends GLOBAL_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_users() {
        return parent::get_array_of_table('tb_pengguna');
    }

    public function ubah($id, $data)
    {
        return parent::update_table_with_status('tb_pengguna', 'pengguna_id', $id, $data);
    }

    // Menambahkan method baru untuk mendapatkan pengguna berdasarkan ID
    public function Lihat_Pengguna($query)
    {
        return parent::get_array_of_row('tb_pengguna', $query);
    }

    public function hapus($query)
    {
        return parent::delete_row_with_status('tb_pengguna', $query);
    }
    public function tambah($data){
		return parent::insert_with_status('tb_pengguna',$data);
	}

    // Fungsi untuk mendapatkan limit pengguna berdasarkan pengguna_id
    public function get_user_limit($pengguna_id)
    {
        $this->db->select('limit');
        $this->db->from('tb_pengguna');
        $this->db->where('pengguna_id', $pengguna_id);
        return $this->db->get()->row()->limit; // Mengembalikan limit pengguna
    }

    // Fungsi untuk memperbarui limit pengguna
    public function update_user_limit($pengguna_id, $new_limit)
    {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->update('tb_pengguna', ['limit' => $new_limit]); // Update limit
    }

    public function get_users_filtered() {
        $this->db->where('role', 'user'); // Menambahkan filter
        return parent::get_array_of_table('tb_pengguna');
    }
}
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
    public function Lihat_Pengguna($query) {
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

    public function get_limit_total($pengguna_id) {
        $this->db->select('limit_total');
        $this->db->from('tb_pengguna'); 
        $this->db->where('pengguna_id', $pengguna_id);
        return $this->db->get()->row()->limit_total; // Mengembalikan limit total
    }

    public function get_users_filtered() {
        $this->db->where('pengguna_hak_akses', 'user'); // Menambahkan filter
        return parent::get_array_of_table('tb_pengguna');
    }

    public function get_sisa_limit($pengguna_id) {
        $user_limit = $this->get_user_limit($pengguna_id);
        $limit_total = $this->get_limit_total($pengguna_id);
        return $limit_total - $user_limit; // Mengembalikan sisa limit
    }

    public function save_total_limit($pengguna_id, $total_limit) {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->update('tb_pengguna', ['limit_total' => $total_limit]);
    }

    public function reset_limit($pengguna_id) {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->update('tb_pengguna', ['limit' => 0]);
    }

    public function reduce_user_limit($pengguna_id, $amount)
    {
        // Ambil limit pengguna saat ini
        $current_limit = $this->get_user_limit($pengguna_id);
        
        // Hitung limit baru setelah pengurangan
        $new_limit = $current_limit - $amount;
        // Update limit pengguna di database
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->update('tb_pengguna', ['limit' => $new_limit]);
    }

    public function get_user_by_id($pengguna_id)
    {
        $this->db->where('pengguna_id', $pengguna_id);
        return $this->db->get('tb_pengguna')->row();
    }
    

}
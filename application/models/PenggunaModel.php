<?php
class PenggunaModel extends GLOBAL_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_users() {
        return parent::get_array_of_table('simkopsis_pengguna');
    }

    public function ubah($id, $data)
    {
        return parent::update_table_with_status('simkopsis_pengguna', 'pengguna_id', $id, $data);
    }

    // Menambahkan method baru untuk mendapatkan pengguna berdasarkan ID
    public function Lihat_Pengguna($query)
    {
        return parent::get_array_of_row('simkopsis_pengguna', $query);
    }

    public function hapus($query)
    {
        return parent::delete_row_with_status('simkopsis_pengguna', $query);
    }
}
<?php

// Mendefinisikan kelas AuthModel yang merupakan turunan dari GLOBAL_Model
class AuthModel extends GLOBAL_Model {

    // Konstruktor kelas AuthModel
    public function __construct()
    {
        parent::__construct();
    }

    // Metode untuk mendapatkan pengguna berdasarkan username dan password
    public function get_pengguna($username, $password)
    {
        $user = array(
            'username' => $username,
            'password' => $password
        );
        
        return parent::get_object_of_row('simkopsis_pengguna', $user);
    }

    // Metode untuk mendapatkan data pengguna berdasarkan ID pengguna yang tidak dihapus
    public function get_data_pengguna($id)
    {
        $query = array(
            'pengguna_id' => $id,
            'pengguna_isDelete' => 0
        );
        return parent::get_array_of_row('simkopsis_pengguna', $query);
    }

    // Metode untuk mendapatkan semua pengguna yang tidak dihapus
    public function get_penggunas()
    {
        $query = array(
            'pengguna_isDelete' => 0
        );
        return parent::get_object_of_row('simkopsis_pengguna', $query)->result_array();
    }

    // Metode untuk menambah pengguna baru
    public function tambah_pengguna($pengguna)
    {
        return parent::insert_with_status('simkopsis_pengguna', $pengguna);
    }

    // Metode untuk mengubah data pengguna berdasarkan ID
    public function ubah_pengguna($id, $pengguna)
    {
        return parent::update_table_with_status(
            'simkopsis_pengguna',
            'pengguna_id',
            $id,
            $pengguna
        );
    }

    // Metode untuk menghapus pengguna dengan mengubah status isDelete menjadi 1
    public function hapus_pengguna($id)
    {
        $query = array(
            'pengguna_isDelete' => 1
        );
        return parent::update_table_with_status('simkopsis_pengguna', 'pengguna_id', $id, $query);
    }

    // Metode untuk mendapatkan arsip pengguna yang telah dihapus
    public function get_arsip_pengguna()
    {
        $query = array('pengguna_isDelete' => 1);
        return parent::get_object_of_row('simkopsis_pengguna', $query)->result_array();
    }

    // Metode untuk mengembalikan pengguna dari arsip (mengubah status isDelete menjadi 0)
    public function restore_pengguna($penggunaID)
    {
        $query = array('pengguna_isDelete' => 0);
        return parent::update_table_with_status('simkopsis_pengguna', 'pengguna_id', $penggunaID, $query);
    }

    // Metode untuk memasukkan pengguna baru dengan status
    public function insert_pengguna($data)
    {
        return parent::insert_with_status('simkopsis_pengguna', $data);
    }
}
?>

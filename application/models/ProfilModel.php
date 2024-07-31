<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilModel extends GLOBAL_Model {
    
    // Konstruktor kelas User_model
    public function __construct()
    {
        parent::__construct();
    }
    
    // Mengambil data pengguna berdasarkan ID
    public function getUserById($userId)
    {
        return $this->get_array_of_row('simkopsis_pengguna', array('pengguna_id' => $userId));
    }
    
    // Memperbarui data pengguna berdasarkan ID
    public function updateUser($userId, $userData)
    {
        return $this->update_table_with_status('simkopsis_pengguna', 'pengguna_id', $userId, $userData);
    }
}
?>

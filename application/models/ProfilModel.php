<?php
class ProfilModel extends CI_Model {

    public function getProfilById($id) {
        return $this->db->get_where('profil', ['id' => $id])->row_array(); // Mengambil data profil berdasarkan ID
    }

    public function updateProfil($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('profil', $data); // Memperbarui data profil
    }
}
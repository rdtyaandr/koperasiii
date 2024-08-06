<?php

class ProfileModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Mengambil data profil pengguna berdasarkan ID pengguna.
     *
     * @param int $userID ID pengguna
     * @return array Data profil pengguna
     */
    public function get_profile_by_id($userID)
    {
        // Query untuk mengambil data profil dari tabel tb_pengguna
        $query = $this->db->get_where('tb_pengguna', array('pengguna_id' => $userID));
        return $query->row_array();
    }

    /**
     * Memperbarui foto profil pengguna di database.
     *
     * @param int $userID ID pengguna
     * @param string $fileName Nama file foto profil
     * @return bool Status operasi
     */
    public function update_profile_picture($userID, $fileName)
    {
        // Data untuk diperbarui
        $data = array(
            'pengguna_picture' => $fileName
        );

        // Melakukan update foto profil di database
        $this->db->where('pengguna_id', $userID);
        return $this->db->update('tb_pengguna', $data);
    }

    /**
     * Memperbarui data profil pengguna di database.
     *
     * @param int $userID ID pengguna
     * @param array $data Data profil pengguna yang akan diperbarui
     * @return bool Status operasi
     */
    public function update_profile($penggunaID, $data)
    {
        $data['pengguna_date_update'] = date('Y-m-d H:i:s'); // Mengatur tanggal dan waktu sekarang
        $this->db->where('pengguna_id', $penggunaID);
        return $this->db->update('tb_pengguna', $data);
    }
}

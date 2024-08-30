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
     * @param int $penggunaID ID pengguna
     * @return array Data profil pengguna
     */
    public function get_profile_by_id($penggunaID)
    {
        // Query untuk mengambil data profil dari tabel tb_pengguna
        $query = $this->db->get_where('tb_pengguna', array('pengguna_id' => $penggunaID));
        return $query->row_array();
    }

    /**
     * Memperbarui foto profil pengguna di database.
     *
     * @param int $penggunaID ID pengguna
     * @param string $fileName Nama file foto profil
     * @return bool Status operasi
     */
    public function update_profile_picture($penggunaID, $fileName)
    {
        // Data untuk diperbarui
        $data = array(
            'pengguna_picture' => $fileName
        );

        // Melakukan update foto profil di database
        $this->db->where('pengguna_id', $penggunaID);
        return $this->db->update('tb_pengguna', $data);
    }

    /**
     * Memperbarui data profil pengguna di database.
     *
     * @param int $penggunaID ID pengguna
     * @param array $data Data profil pengguna yang akan diperbarui
     * @return bool Status operasi
     */
    public function update_profile($penggunaID, $data)
    {
        // Melakukan update data profil di database
        $this->db->where('pengguna_id', $penggunaID);
        $this->db->update('tb_pengguna', $data);
        return $this->db->affected_rows() > 0;
    }

    public function cleanupUnusedProfilePictures() {
        $this->load->database();
    
        // Ambil semua nama file gambar dari kolom 'pengguna_picture' di database
        $this->db->select('pengguna_picture');
        $query = $this->db->get('tb_pengguna'); // Ganti 'tb_pengguna' dengan nama tabel yang sesuai
        $profile_pictures_in_db = array_map(function($row) {
            return $row['pengguna_picture'];
        }, $query->result_array());
    
        // Tambahkan 'default.png' ke dalam array agar tidak terhapus
        $profile_pictures_in_db[] = 'default.png';
    
        // Path ke folder yang berisi file profile picture
        $upload_dir = FCPATH . 'assets/upload/profile_picture/';
    
        // Dapatkan semua file di folder tersebut
        $files_in_directory = array_diff(scandir($upload_dir), array('.', '..'));
    
        // Bandingkan file di folder dengan yang ada di database
        $files_to_delete = array_diff($files_in_directory, $profile_pictures_in_db);
    
        // Hapus file yang tidak tercatat di database
        foreach ($files_to_delete as $file) {
            $file_path = $upload_dir . $file;
            if (is_file($file_path)) {
                unlink($file_path);
                // echo "File {$file} telah dihapus.\n"; // Opsional: echo ini hanya untuk debugging
            }
        }
    
        // echo "Cleanup selesai."; // Opsional: echo ini hanya untuk debugging
    }
    
}

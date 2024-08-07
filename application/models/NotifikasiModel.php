<?php
class NotifikasiModel extends GLOBAL_Model {

    public function get_notifikasi_by_user($pengguna_id) {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->order_by('waktu_dibuat', 'DESC');
        $query = $this->db->get('notifikasi');
        return $query->result_array();
    }

    public function buat_notifikasi($data) {
        return $this->insert_with_status('notifikasi', $data);
    }

    public function tandai_dibaca($notifikasi_id) {
        $this->update_table_with_status('notifikasi', 'id', $notifikasi_id, ['dibaca' => TRUE]);
    }
    public function addMessage($data)
{
    $this->db->insert('notifikasi', $data);
}
public function get_notifikasi($pengguna_id, $level)
{
    $this->db->where('pengguna_id', $pengguna_id);
    $this->db->where('level', $level);
    $this->db->order_by('waktu_dibuat', 'DESC');
    $query = $this->db->get('notifikasi');
    return $query->result_array();
}


}
?>

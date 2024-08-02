
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasimodel extends GLOBAL_model { // Mengubah dari CI_Model ke GLOBAL_model

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_notification($user_id, $message) {
        $data = array(
            'pengguna_id' => $user_id,
            'message' => $message,
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('notifications', $data);
    }

    public function get_notifications($user_id) {
        $this->db->where('pengguna_id', $user_id);
        $this->db->where('is_read', 0);
        $query = $this->db->get('notifications');
        return $query->result();
    }

    public function mark_as_read($notification_id) {
        $this->db->where('id', $notification_id);
        $this->db->update('notifications', array('is_read' => 1));
    }
}
?>
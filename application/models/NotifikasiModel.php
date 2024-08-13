<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationModel extends GLOBAL_Model {

    public function __construct() {
        parent::__construct();
    }

    // Function to get notifications based on user role
    public function get_notifications_by_role($role) {
        // Example query; adjust according to your database structure
        $this->db->where('role', $role);
        $query = $this->db->get('tb_notifikasi');
        return $query->result_array();
    }
}

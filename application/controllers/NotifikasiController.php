<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationController extends GLOBAL_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NotificationModel');
    }

    // Function to get notifications based on user role
    public function get_notifications() {
        $role = $this->session->userdata('level'); // Get user role from session
        $notifications = $this->NotificationModel->get_notifications_by_role($role);
        echo json_encode($notifications); // Return notifications as JSON
    }
}

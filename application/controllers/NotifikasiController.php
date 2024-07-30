<?php

class NotificationController extends GLOBAL_Controller
{
    public function __construct() {
        parent::__construct();
        $model = array('NotifikasiModel','PenggunaModel');
        $this->load->model($model);
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index() {
        $user_id = $this->session->userdata('pengguna_id');
        $data['notifications'] = $this->Notifikasimodel-->get_notifications($user_id);
        $this->load->view('notifications/index', $data);
    }

    public function mark_as_read($id) {
        $this->Notifikasimodel-->mark_as_read($id);
        redirect('notifications');
    }
}
?>

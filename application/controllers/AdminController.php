<?php

class AdminController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        if ($this->session->userdata('level') == 'admin'){
            parent::template('admin/dashboard', $data);
        }elseif ($this->session->userdata('level') == 'operator') {
            parent::op_template('admin/dashboard', $data);
        }
    }


}
?>

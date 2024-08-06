<?php
class AdminController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AnalyticsModel');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Analitik';
        $data['user_count'] = $this->AnalyticsModel->get_user_count();
        $data['order_count'] = $this->AnalyticsModel->get_order_count();
        //$data['sales_total'] = $this->AnalyticsModel->get_sales_total();
        //$data['issue_count'] = $this->AnalyticsModel->get_issue_count();

        //$data['sales_data'] = $this->AnalyticsModel->get_sales_data();
        //$data['user_growth_data'] = $this->AnalyticsModel->get_user_growth_data();
        //$data['revenue_data'] = $this->AnalyticsModel->get_revenue_data();

        parent::template('admin/dashboard', $data);
    }
}
?>

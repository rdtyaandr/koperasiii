<?php

class HistoryModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addMessage($data)
    {
        $this->db->insert('tb_histori', $data);
    }

    public function deleteOldMessages()
    {
        $this->db->where('message_date_time <', date('Y-m-d H:i:s', strtotime('-30 days')));
        $this->db->delete('tb_histori');
    }

    public function getRecentMessages()
    {
        $this->db->where('message_date_time >=', date('Y-m-d H:i:s', strtotime('-30 days')));
        return $this->db->get('tb_histori')->result();
    }
}
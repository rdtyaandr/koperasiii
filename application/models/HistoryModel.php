<?php

class HistoryModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addMessage($data)
    {
        return $this->db->insert('messages', $data);
    }

    public function getMessages()
    {
        return $this->db->get('messages')->result();
    }
}
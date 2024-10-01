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

    public function getRecentMessagesByRole($role, $pengguna_id)
    {
        $this->db->where('role', $role);
        $messages = $this->db->get('tb_histori')->result(); // Mengambil semua pesan berdasarkan role tanpa filter tanggal

        // Filter pesan berdasarkan pengguna_id untuk pesan tertentu
        $filtered_messages = array_filter($messages, function($message) use ($pengguna_id) {
            $specific_messages = ['Profil diperbarui', 'Foto profil dihapus', 'Foto profil diperbarui'];
            if (in_array($message->message_text, $specific_messages)) {
                return $message->pengguna_id == $pengguna_id;
            }
            return true;
        });

        return $filtered_messages;
    }

    public function getRecentMessagesFiltered($pengguna_id)
    {
        $messages = $this->db->get('tb_histori')->result(); // Mengambil semua pesan tanpa filter tanggal

        // Filter pesan berdasarkan pengguna_id untuk pesan tertentu
        $filtered_messages = array_filter($messages, function($message) use ($pengguna_id) {
            $specific_messages = ['Profil diperbarui', 'Foto profil dihapus', 'Foto profil diperbarui'];
            if (in_array($message->message_text, $specific_messages)) {
                return $message->pengguna_id == $pengguna_id;
            }
            return true;
        });

        return $filtered_messages;
    }

    public function getMessagesByUserId($pengguna_id)
    {
        $this->db->where('pengguna_id', $pengguna_id);
        return $this->db->get('tb_histori')->result(); // Mengambil semua pesan berdasarkan pengguna_id
    }

    public function getRecentMessagesByRoleAndSummary($pengguna_id, $username)
    {
        $messages = $this->db->get('tb_histori')->result(); // Mengambil semua pesan tanpa filter role

        // Filter pesan berdasarkan pengguna_id dan username untuk pesan tertentu
        $filtered_messages = array_filter($messages, function($message) use ($pengguna_id, $username) {
            $specific_messages = ['Pengajuan pinjaman', 'Pinjaman disetujui', 'Pinjaman dibatalkan'];
            if (in_array($message->message_text, $specific_messages)) {
                // Untuk pesan pinjaman, filter berdasarkan username
                return strpos($message->message_summary, 'nama ' . $username) !== false;
            }
            // Kembalikan semua pesan yang tidak termasuk dalam specific_messages
            return $message->pengguna_id == $pengguna_id;
        });

        return $filtered_messages;
    }
}
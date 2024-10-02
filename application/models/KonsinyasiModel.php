<?php
class KonsinyasiModel extends GLOBAL_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function lihat_semua()
    {
        $today = date('Y-m-d');
        $this->db->where('DATE(created_at)', $today);
        return parent::get_array_of_table('tb_konsinyasi');
    }

    public function tambah($data)
    {
        return parent::insert_with_status('tb_konsinyasi', $data);
    }

    public function lihat_konsinyasi($id)
    {
        return parent::get_array_of_row('tb_konsinyasi', array('id_barang' => $id));
    }

    public function ubah($id, $data)
    {
        return parent::update_table_with_status('tb_konsinyasi', 'id_barang', $id, $data);
    }

    public function hapus($query)
    {
        return parent::delete_row_with_status('tb_konsinyasi', $query);
    }
}

// Start Generation Here

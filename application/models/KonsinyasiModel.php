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

    public function get_konsinyasi_by_id($id)
    {
        $this->db->where('id_konsinyasi', $id);
        return $this->db->get('tb_konsinyasi')->row();
    }

    public function tambah($data)
    {
        return parent::insert_with_status('tb_konsinyasi', $data);
    }

    public function lihat_konsinyasi($id)
    {
        $today = date('Y-m-d');
        $this->db->where('id_barang', $id);
        $this->db->where('DATE(created_at)', $today);
        return $this->db->get('tb_konsinyasi')->row();
    }

    public function update_stok_konsinyasi($id_barang, $jumlah)
    {
        $this->db->set('stok', 'stok + ' . intval($jumlah), FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_konsinyasi');
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

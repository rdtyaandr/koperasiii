<?php

class BarangModel extends GLOBAL_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function lihat_semua()
    {
        $this->db->where('jenis_barang', 'toko');
        return parent::get_array_of_table('tb_barang');
    }

    public function tambah($data)
    {
        return parent::insert_with_status('tb_barang', $data);
    }

    public function lihat_barang($query)
    {
        return parent::get_array_of_row('tb_barang', $query);
    }

    public function ubah($id, $data)
    {
        return parent::update_table_with_status('tb_barang', 'id_barang', $id, $data);
    }

    public function hapus($query)
    {
        return parent::delete_row_with_status('tb_barang', $query);
    }

    // Fungsi untuk mengurangi stok
    public function kurangi_stok($id_barang, $jumlah)
    {
        $this->db->set('stok', 'stok - ' . (int)$jumlah, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
    }

    // Fungsi untuk menambah stok (jika perlu untuk rollback)
    public function tambah_stok($id_barang, $jumlah)
    {
        $this->db->set('stok', 'stok + ' . (int)$jumlah, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
    }

    public function update_stok_barang($id_barang, $jumlah)
    {
        $this->db->set('stok', 'stok + ' . intval($jumlah), FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
    }

    public function get_barang_by_id($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('tb_barang')->row();
    }

    public function insert_riwayat_harga($data)
    {
        $this->db->insert('tb_riwayat_harga', $data);
    }

    public function update_harga_barang($id_barang, $harga_baru)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang', array('harga_jual' => $harga_baru));
    }

    public function cek_nama_barang($nama_barang, $id_barang = null)
    {
        $this->db->where('nama_barang', $nama_barang);
        if ($id_barang) {
            $this->db->where('id_barang !=', $id_barang);
        }
        return $this->db->get('tb_barang')->num_rows() > 0;
    }
}
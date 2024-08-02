<?php

class BarangModel extends GLOBAL_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function lihat_semua()
    {
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
}

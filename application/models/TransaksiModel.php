<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lihat_semua()
    {
        return parent::get_array_of_table('tb_transaksi');
    }

    public function tambah($data)
    {
        return parent::insert_data('tb_transaksi', $data);
    }

    public function lihat_transaksi($query)
    {
        return parent::get_array_of_row('tb_transaksi', $query);
    }

    public function ubah($id_transaksi, $data)
    {
        return parent::update_table('tb_transaksi', 'id_transaksi', $id_transaksi, $data);
    }

    public function hapus($query)
    {
        return parent::delete_row('tb_transaksi', $query);
    }
}

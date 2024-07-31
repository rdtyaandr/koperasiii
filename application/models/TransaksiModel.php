<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk menambah transaksi baru
    public function tambah($data)
    {
        return parent::insert_with_status('tb_transaksi', $data);
    }

    // Fungsi untuk mengubah data transaksi berdasarkan ID
    public function ubah($id, $data)
    {
        return parent::update_table_with_status('tb_transaksi', 'id_transaksi', $id, $data);
    }

    // Fungsi untuk menghapus data transaksi berdasarkan ID
    public function hapus($id)
    {
        return parent::delete_row_with_status('tb_transaksi', array('id_transaksi' => $id));
    }

    // Fungsi untuk mengambil semua data transaksi
    public function lihat_semua()
    {
        return parent::get_array_of_table('tb_transaksi');
    }

    // Fungsi untuk mengambil data transaksi berdasarkan query tertentu
    public function lihat_transaksi($query)
    {
        return parent::get_array_of_row('tb_transaksi', $query);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lihat_semua()
    {
        return parent::get_array_of_table('tb_kategori');
    }

    public function tambah($data)
    {
        return parent::insert_data('tb_kategori', $data);
    }

    public function lihat_kategori($query)
    {
        return parent::get_array_of_row('tb_kategori', $query);
    }

    public function ubah($id_kategori, $data)
    {
        return parent::update_table('tb_kategori', 'id_kategori', $id_kategori, $data);
    }

    public function hapus($id_kategori)
    {
        // Cek apakah kategori masih digunakan
        if ($this->is_used('tb_barang', 'id_kategori', $id_kategori)) {
            return false; // Tidak dapat dihapus karena masih digunakan
        }

        // Hapus kategori jika tidak digunakan
        return parent::delete_row_with_status('tb_kategori', array('id_kategori' => $id_kategori));
    }
}

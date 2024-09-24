<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SatuanModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lihat_semua()
    {
        return parent::get_array_of_table('tb_satuan');
    }

    public function tambah($data)
    {
        return parent::insert_data('tb_satuan', $data);
    }

    public function lihat_satuan($query)
    {
        return parent::get_array_of_row('tb_satuan', $query);
    }

    public function ubah($id_satuan, $data)
    {
        return parent::update_table('tb_satuan', 'id_satuan', $id_satuan, $data);
    }

    public function hapus($id_satuan)
    {
        // Cek apakah satuan sedang digunakan di tb_barang
        if (parent::is_used('tb_barang', 'id_satuan', $id_satuan)) {
            return false; // Tidak dapat dihapus karena sedang digunakan
        }    

        // Hapus kategori jika tidak digunakan
        return parent::delete_row_with_status('tb_satuan', array('id_satuan' => $id_satuan));
    }

    public function cek_nama_satuan($nama_satuan, $id_satuan = null)
    {
        $this->db->where('nama_satuan', $nama_satuan);
        if ($id_satuan) {
            $this->db->where('id_satuan !=', $id_satuan);
        }
        return $this->db->get('tb_satuan')->num_rows() > 0;
    }
}

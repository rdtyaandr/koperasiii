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

    public function check_stock_and_notify()
{
    $threshold = 10; // Batas stok minimum
    $this->db->where('stok <', $threshold);
    $query = $this->db->get('tb_barang');
    $barang_list = $query->result_array();

    foreach ($barang_list as $barang) {
        // Menambahkan notifikasi
        $data = [
            'pengguna_id' => 1, // ID admin atau pengguna yang relevan
            'pesan' => 'Stok barang ' . $barang['nama_barang'] . ' tinggal sedikit. Harap tambahkan stok.',
            'status' => 'belum_dibaca',
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('notifikasi', $data);
    }
}

}

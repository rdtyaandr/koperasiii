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
        // Ambil barang dari hari ini
        $this->db->where('DATE(created_at)', $today);
        $this->db->where('jenis_barang', 'konsinyasi');
        $konsinyasiHariIni = parent::get_array_of_table('tb_barang');

        // Ambil barang dari hari sebelumnya yang stoknya lebih dari 0
        $this->db->where('DATE(created_at) <', $today);
        $this->db->where('stok >', 0);
        $this->db->where('jenis_barang', 'konsinyasi');
        $konsinyasiSebelumnya = parent::get_array_of_table('tb_barang');

        // Gabungkan hasil
        return [
            'hari_ini' => $konsinyasiHariIni,
            'sebelumnya' => $konsinyasiSebelumnya
        ];
    }

    public function lihat_semuanya()
    {
        $this->db->where('jenis_barang', 'konsinyasi');
        return parent::get_array_of_table('tb_barang');
    }

    public function tambah($data)
    {
        return parent::insert_with_status('tb_barang', $data);
    }

    public function lihat_konsinyasi($id)
    {
        $today = date('Y-m-d');
        $this->db->where('id_barang', $id);
        
        // Cek stok untuk hari ini
        $this->db->where('DATE(created_at)', $today);
        $konsinyasiHariIni = $this->db->get('tb_barang')->row();

        // Jika tidak ada, cek stok di hari sebelumnya
        if (!$konsinyasiHariIni) {
            $this->db->where('id_barang', $id);
            $this->db->where('DATE(created_at) <', $today);
            $this->db->where('stok >', 0);
            return $this->db->get('tb_barang')->row();
        }

        return $konsinyasiHariIni;
    }

    public function update_stok_konsinyasi($id_barang, $jumlah)
    {
        $this->db->set('stok', 'stok + ' . intval($jumlah), FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
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

// Start Generation Here

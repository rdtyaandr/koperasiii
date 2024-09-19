<?php
class LaporanModel extends GLOBAL_Model
{

    public function get_laporan_data($month, $year, $report_type)
    {
        // Pastikan bulan dan tahun ada
        if (empty($month) || empty($year)) {
            return [];
        }

        // Query berdasarkan jenis laporan
        if ($report_type === 'potensi_laba') {
            // Query untuk potensi laba
            $this->db->select('b.nama_barang, rh.harga_beli, rh.harga_jual, (rh.harga_jual - rh.harga_beli) as potensi_laba');
            $this->db->from('tb_riwayat_harga rh');
            $this->db->join('tb_barang b', 'rh.id_barang = b.id_barang');
            $this->db->where('MONTH(rh.tanggal_berlaku)', $month);
            $this->db->where('YEAR(rh.tanggal_berlaku)', $year);
            $query = $this->db->get();
        } elseif ($report_type === 'laba_rugi') {
            // Query untuk laba rugi
            $this->db->select('b.nama_barang, rh.harga_beli, rh.harga_jual, (rh.harga_jual - rh.harga_beli) as laba_rugi');
            $this->db->from('tb_riwayat_harga rh');
            $this->db->join('tb_barang b', 'rh.id_barang = b.id_barang');
            $this->db->where('MONTH(rh.tanggal_berlaku)', $month);
            $this->db->where('YEAR(rh.tanggal_berlaku)', $year);
            $query = $this->db->get();
        } else {
            return [];
        }

        return $query->result_array();
    }
    public function get_filtered_data($month, $year, $report_type) {
        // Memilih kolom yang diperlukan
        $this->db->select('b.nama_barang, b.harga_beli, b.harga_jual, r.harga_beli AS harga_riwayat, t.total, t.created_at');
        $this->db->from('tb_transaksi t');
        $this->db->join('tb_barang b', 'b.id_barang = t.id_transaksi', 'inner');
        $this->db->join('tb_riwayat_harga r', 'r.id_barang = b.id_barang AND DATE(t.created_at) = r.tanggal_berlaku', 'left');
        $this->db->where('MONTH(t.created_at)', $month);
        $this->db->where('YEAR(t.created_at)', $year);
    
        if ($report_type == 'laba_rugi') {
            // Menghitung laba rugi menggunakan total
            $this->db->select('(t.total - b.harga_beli) AS laba_untung');
        } else {
            // Menghitung potensi laba
            $this->db->select('(b.harga_jual - b.harga_beli) AS potensi_laba');
        }
    
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
?>
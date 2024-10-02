<?php
class LaporanModel extends GLOBAL_Model
{
    public function get_filtered_data($year, $month = null, $day = null, $end_day = null, $payment_method = null) {
        $this->db->select('b.nama_barang, b.harga_beli, dt.harga as harga_jual, SUM(dt.jumlah) as jumlah, SUM((dt.harga * dt.jumlah) - (b.harga_beli * dt.jumlah)) as total_pendapatan, t.cara_bayar');
        $this->db->from('tb_detransaksi dt');
        $this->db->join('tb_barang b', 'dt.id_barang = b.id_barang');
        $this->db->join('tb_transaksi t', 'dt.id_transaksi = t.id_transaksi');
        $this->db->where('YEAR(t.created_at)', $year);

        if (!empty($month)) {
            $this->db->where('MONTH(t.created_at)', $month);
        }

        if (!empty($day) && !empty($end_day)) {
            $this->db->where('DAY(t.created_at) >=', $day);
            $this->db->where('DAY(t.created_at) <=', $end_day);
        } elseif (!empty($day)) {
            $this->db->where('DAY(t.created_at)', $day);
        }

        if (!empty($payment_method)) {
            $this->db->where('t.cara_bayar', $payment_method);
        }

        $this->db->group_by('b.nama_barang, b.harga_beli, dt.harga, t.cara_bayar');
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
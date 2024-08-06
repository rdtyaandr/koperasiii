<?php
class AnalyticsModel extends GLOBAL_Model
{
    public function get_user_count()
    {
        return $this->db->count_all('tb_pengguna'); // Ganti 'users' dengan nama tabel Anda
    }

    public function get_order_count()
    {
        return $this->db->count_all('tb_transaksi'); // Ganti 'orders' dengan nama tabel Anda
    }

   /// public function get_sales_total()
   /// {
      ///  $this->db->select_sum('amount'); // Ganti 'amount' dengan nama kolom yang menyimpan jumlah penjualan
        //$query = $this->db->get('sales'); // Ganti 'sales' dengan nama tabel Anda
       // return $query->row()->amount;
    //}

    //public function get_issue_count()
   // {
     //   return $this->db->count_all('issues'); // Ganti 'issues' dengan nama tabel Anda
    //}

    public function get_sales_data()
    {
        // Contoh data statis, ganti dengan data dari database
        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            'series' => [
                [12, 9, 7, 8, 5, 6, 10],
                [2, 1, 3.5, 7, 3, 4, 6]
            ]
        ];
    }

    public function get_user_growth_data()
    {
        // Contoh data statis, ganti dengan data dari database
        return [
            'labels' => ['Q1', 'Q2', 'Q3', 'Q4'],
            'series' => [
                [800, 1200, 1400, 1300],
                [200, 400, 500, 300]
            ]
        ];
    }

    public function get_revenue_data()
    {
        // Contoh data statis, ganti dengan data dari database
        return [
            'series' => [20, 10, 30, 40],
            'labels' => ['Q1', 'Q2', 'Q3', 'Q4']
        ];
    }
}
?>

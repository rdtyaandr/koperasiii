<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoanModel extends GLOBAL_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan data pinjaman
    public function get_loan_data() {
        // Contoh data yang akan dikembalikan
        $loan_data = array(
            'saldo_pinjaman' => 5000000, // misalnya 5 juta
            'batas_pinjaman' => 10000000 // misalnya 10 juta
        );

        return $loan_data;
    }
}

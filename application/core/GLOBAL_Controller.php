<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Mendefinisikan kelas GLOBAL_Controller yang merupakan turunan dari CI_Controller
class GLOBAL_Controller extends CI_Controller {
    private $userID;
    private $userLevel;
    private $userName;
    
    // Konstruktor kelas GLOBAL_Controller
    public function __construct()
    {
        {
            parent::__construct();
            $this->load->model('NotifikasiModel');
            if ($this->session->has_userdata('pengguna_id')) {
                $this->userID = $this->session->userdata('pengguna_id');
                $this->userName = $this->session->userdata('username');
                $this->userLevel = $this->session->userdata('level');
            }
            $this->stok_rendah = $this->NotifikasiModel->get_barang_stok_rendah(); // Ambil stok rendah
            $this->pinjaman_menunggu = $this->NotifikasiModel->get_pinjaman_menunggu(); // Ambil pinjaman menunggu persetujuan
        }
    }
    
    /*
     * Helper sistem ini ada di sini
     * Termasuk helper templating, debugging & error helper, core helper
     */

    // Helper sistem

    // Metode untuk mengakses model
    public function model($model)
    {
        return $this->$model;
    }

    // Metode untuk mengambil data POST
    public function post($value)
    {
        return $this->input->post($value);
    }

    // Metode untuk mengambil data GET
    public function get($value)
    {
        return $this->input->get($value);
    }

    // Metode untuk mencetak dan menghentikan eksekusi array
    public function array_dump($arr)
    {
        echo "<pre>";
        print_r($arr);
        exit;
    }

    // Metode untuk mencetak tipe dan menghentikan eksekusi variabel
    public function type_dump($var)
    {
        echo "<pre>";
        var_dump($var);
        exit;
    }

    // Metode untuk mengecek apakah user sudah login
    public function hasLogin()
    {
        return $this->session->userdata('login') === true;
    }

    // Metode untuk memuat template dengan konten dan data yang diberikan
    public function template($content, $data)
    {
        $data['stok_rendah'] = $this->stok_rendah;
        $data['pinjaman_menunggu'] = $this->pinjaman_menunggu; 
        $this->load->view('templates/header', $data);
        $this->load->view($content, $data);
        $this->load->view('templates/footer', $data);
    }
    // Metode untuk memuat halaman autentikasi
    public function authPage($content, $data)
    {
        $this->load->view($content, $data);
    }

    // Metode untuk mengatur flashdata sesi
    public function alert($name, $value)
    {
        $this->session->set_flashdata($name, $value);
    }
}
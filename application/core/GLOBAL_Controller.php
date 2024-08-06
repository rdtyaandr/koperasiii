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
            if ($this->session->has_userdata('pengguna_id')) {
                $this->userID = $this->session->userdata('pengguna_id');
                $this->userName = $this->session->userdata('username');
                $this->userLevel = $this->session->userdata('level');
            }
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
    
    // Helper templating

    // Metode untuk memuat template dengan konten dan data yang diberikan
    public function template($content, $data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view($content, $data);
        $this->load->view('templates/footer', $data);
    }

    // Metode untuk memuat template user dengan konten dan data yang diberikan
    public function user_template($content, $data)
    {
        $this->load->view('templates/user/header', $data);
        $this->load->view($content, $data);
        $this->load->view('templates/user/footer', $data);
    }

    // Metode untuk memuat template operator dengan konten dan data yang diberikan
    public function op_template($content,$data)
    {
               $this->load->view('templates/operator/header', $data);
        $this->load->view($content, $data);
        $this->load->view('templates/operator/footer', $data); 
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
?>

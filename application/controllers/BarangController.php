<?php
use Picqer\Barcode\BarcodeGeneratorPNG;
class BarangController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('KategoriModel');
        $this->load->model('SatuanModel');
        $this->load->model('HistoryModel'); // Load model History
        $this->load->library('Ciqrcode');
        $this->load->library('Zend');
        $this->load->helper('url');
        $this->load->database();
        require_once APPPATH . 'third_party/BarcodeGenerator.php';
        require_once APPPATH . 'third_party/BarcodeGeneratorPNG.php'; 
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level != 'admin' && $level != 'operator') {
            redirect(base_url());
        }
        $this->HistoryModel->deleteOldMessages();
    }

    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        $data['barang'] = parent::model('BarangModel')->lihat_semua();
        $data['data']  = $this->db->get('tb_barang')->result();

    
        parent::template('barang/index', $data);
    }
    
    public function QRcode($kodenya)
  {
    //render  qr code dengan format gambar PNG
    QRcode::png(
      $kodenya,
      $outfile = false,
      $level = QR_ECLEVEL_H,
      $size  = 6,
      $margin = 2
    );
  }

   // Fungsi untuk generate barcode
   public function generate_barcode($kode_barang)
   {
       // Load Barcode Generator
       $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
       $barcode = $generator->getBarcode($kode_barang, $generator::TYPE_CODE_128);

       // Output barcode sebagai image
       header('Content-Type: image/png');
       echo $barcode;
   }
    
    
    

    // Fungsi untuk menambahkan pesan ke history
    private function addMessage($text, $summary, $icon)
    {
        $data = [
            'message_text' => $text,
            'message_summary' => $summary,
            'message_icon' => $icon,
            'role' => $this->session->userdata('level')
        ];
        $this->HistoryModel->addMessage($data);
    }
    
    public function tambah()
    {
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        if (isset($_POST['tambah'])) {
            $data = array(
                'kode_barang' => parent::post('kode_barang'),
                'nama_barang' => parent::post('nama_barang'),
                'detail_barang' => parent::post('detail_barang'),
                'id_satuan' => parent::post('satuan'),
                'id_kategori' => parent::post('kategori'),
                'harga_beli' => parent::post('harga_beli'),
                'harga_jual' => parent::post('harga_jual'),
                'stok' => parent::post('stok')
            );

            $simpan = parent::model('BarangModel')->tambah($data);

            if ($simpan > 0) {
                $this->addMessage('Barang baru ditambahkan', 'Barang ' . $data['nama_barang'] . ' telah ditambahkan', 'add_circle_outline');
                parent::alert('alert', 'success-insert');
                redirect('barang');
            } else {
                parent::alert('alert', 'error-insert');
                redirect('barang');
            }
        } else {
            $data['title'] = 'Tambah Barang';
            parent::template('barang/tambah', $data);
        }
    }

    public function ubah($id)
    {
        $data['kategori'] = parent::model('KategoriModel')->lihat_semua();
        $data['satuan'] = parent::model('SatuanModel')->lihat_semua();
        if (isset($_POST['ubah'])) {
            $data = array(
                'kode_barang' => parent::post('kode_barang'),
                'nama_barang' => parent::post('nama_barang'),
                'detail_barang' => parent::post('detail_barang'),
                'id_satuan' => parent::post('satuan'),
                'id_kategori' => parent::post('kategori'),
                'harga_beli' => parent::post('harga_beli'),
                'harga_jual' => parent::post('harga_jual'),
                'stok' => parent::post('stok')
            );

            $simpan = parent::model('BarangModel')->ubah($id, $data);

            if ($simpan > 0) {
                $this->addMessage('Barang diubah', 'Barang ' . $data['nama_barang'] . ' telah diubah', 'update');
                parent::alert('alert', 'success-update');
                redirect('barang');
            } else {
                parent::alert('alert', 'error-update');
                redirect('barang');
            }
        } else {
            $data['title'] = 'Ubah Barang';
            $query = array('id_barang' => $id);
            $data['barang'] = parent::model('BarangModel')->lihat_barang($query);
            parent::template('barang/ubah', $data);
        }
    }

    public function hapus($id)
    {
        $query = array('id_barang' => $id);
        $barang = parent::model('BarangModel')->lihat_barang($query);
        $hapus = parent::model('BarangModel')->hapus($query);
        if ($hapus > 0) {
            $this->addMessage('Barang dihapus', 'Barang ' . $barang->nama_barang . ' telah dihapus', 'delete');
            parent::alert('alert', 'success-delete');
            redirect('barang');
        } else {
            parent::alert('alert', 'error-update');
            redirect('barang');
        }
    }
}
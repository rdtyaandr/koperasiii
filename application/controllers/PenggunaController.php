<?php
class PenggunaController extends GLOBAL_Controller
{

    public function __construct()
    {
        parent::__construct();
        $model = array('PenggunaModel', 'HistoryModel', 'TransaksiModel', 'PinjamanModel'); // Tambahkan TransaksiModel
        $this->load->model($model);
        $this->load->helper('date'); // Tambahkan helper date
        // Pastikan admin sudah login dan memiliki hak akses yang benar
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
        $level = $this->session->userdata('level');
        if ($level == 'user') {
            redirect(base_url());
        }
        $this->HistoryModel->deleteOldMessages();
    }

    public function index()
    {
        $data['title'] = 'Daftar Pengguna ';
        $data['Pengguna'] = parent::model('PenggunaModel')->get_users();

        parent::template('pengguna/index', $data);
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

    public function ubah($id)
    {
        if (isset($_POST['ubah'])) {
            $data = array(
                'nama_lengkap' => parent::post('nama_lengkap'),
                'username' => parent::post('username'),
                'email' => parent::post('email'),
                'satker' => parent::post('satker'),
                'pengguna_hak_akses' => parent::post('pengguna_hak_akses'),
            );

            // Ambil input password baru
            $new_password = parent::post('password');

            // Jika password baru diisi, hash password baru, jika tidak, hapus dari array data
            if (!empty($new_password)) {
                $data['password'] = md5($new_password); // Hash password baru
            }

            $simpan = parent::model('PenggunaModel')->ubah($id, $data);

            // Ambil nama pengguna untuk pesan
            $nama_pengguna = parent::post('username');

            if ($simpan > 0) {
                $this->addMessage('Pengguna diubah', 'Pengguna dengan nama ' . $nama_pengguna . ' telah diubah', 'edit');
                parent::alert('alert', 'sukses_ubah');
                redirect('pengguna');
            } else {
                parent::alert('alert', 'gagal_ubah');
                redirect('pengguna');
            }
        } else {
            $data['title'] = 'Ubah Pengguna';
            $query = array('pengguna_id' => $id);
            $data['Pengguna'] = parent::model('PenggunaModel')->Lihat_Pengguna($query);
            parent::template('pengguna/ubah', $data);
        }
    }

    public function hapus($id)
    {
        $query = array('pengguna_id' => $id);
        $pengguna = parent::model('PenggunaModel')->Lihat_Pengguna($query); // Ambil nama pengguna
        $hapus = parent::model('PenggunaModel')->hapus($query);
        if ($hapus > 0) {
            $this->addMessage('Pengguna dihapus', 'Pengguna dengan nama ' . $pengguna['username'] . ' telah dihapus', 'delete');
            parent::alert('alert', 'sukses_hapus');
            redirect('pengguna');
        } else {
            parent::alert('alert', 'gagal_hapus');
            redirect('pengguna');
        }
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $data = array(
                'nama_lengkap' => parent::post('nama_lengkap'),
                'username' => parent::post('username'),
                'email' => parent::post('email'),
                'satker' => parent::post('satker'),
                'limit' => 0,
                'limit_total' => 1500000,
                'password' => md5(parent::post('password')),
                'pengguna_hak_akses' => parent::post('level')
            );

            $simpan = parent::model('PenggunaModel')->tambah($data);

            // Ambil nama pengguna untuk pesan
            $nama_pengguna = $data['username'];

            if ($simpan > 0) {
                $this->addMessage('Pengguna ditambahkan', 'Pengguna dengan nama ' . $nama_pengguna . ' telah ditambahkan', 'add_circle_outline');
                parent::alert('alert', 'sukses_tambah');
                redirect('pengguna');
            } else {
                parent::alert('alert', 'gagal_tambah');
                redirect('pengguna');
            }
        } else {
            $data['title'] = 'Tambah Pengguna';
            parent::template('pengguna/tambah', $data);
        }
    }

    public function profile($userID)
    {
        // Mengecek apakah user sudah login
        if (!$this->hasLogin()) {
            redirect('login'); // Redirect ke halaman login jika belum login
        }

        // Mengambil data profil user berdasarkan session user_id
        $data['user'] = $this->ProfileModel->get_user_by_id($userID);

        // Memuat template dan mengirim data ke view
        $this->template('profile/index', $data);
    }

    public function limit()
    {
        $data['title'] = 'Limit Pengguna Koperasi Baru';
        $data['Pengguna'] = parent::model('PenggunaModel')->get_users();

        parent::template('limit/index', $data);
    }

    public function save_limit_total($id)
    {
        if (isset($_POST['save_limit_total'])) {
            $total_limit = parent::post('limit_total');
            parent::model('PenggunaModel')->save_total_limit($id, $total_limit);

            // Ambil nama pengguna
            $pengguna = parent::model('PenggunaModel')->get_user_by_id($id);
            $nama_pengguna = $pengguna->username;

            // Menampilkan total limit dengan penjelasan yang jelas
            $this->addMessage('Limit diperbarui', 'Total limit untuk pengguna dengan nama ' . $nama_pengguna . ' telah berhasil diperbarui menjadi Rp ' . number_format($total_limit, 0, ',', '.'), 'save'); // Ganti icon dengan 'save'
            parent::alert('alert', 'sukses_ubah');
            redirect('limit');
        }
    }

    public function reset_limit($id)
    {
        parent::model('PenggunaModel')->reset_limit($id);

        // Ambil nama pengguna
        $pengguna = parent::model('PenggunaModel')->get_user_by_id($id);
        $nama_pengguna = $pengguna->username;

        $this->addMessage('Limit direset', 'Limit untuk pengguna dengan nama ' . $nama_pengguna . ' telah direset', 'refresh'); // Ganti icon dengan 'refresh'
        parent::alert('alert', 'sukses_reset');
        redirect('limit');
    }

    public function reduce_limit($id)
    {
        if (isset($_POST['amount'])) {
            $amount = parent::post('amount');

            // Validasi jumlah yang dimasukkan
            if ($amount <= 0) {
                parent::alert('alert', 'error-insert');
                redirect('limit');
            }

            // Ambil limit pengguna saat ini
            $current_limit = parent::model('PenggunaModel')->get_user_limit($id);

            // Cek apakah limit cukup untuk dikurangi
            if ($current_limit < $amount) {
                parent::alert('alert', 'error-insert');
                redirect('limit');
            }

            // Kurangi limit pengguna
            parent::model('PenggunaModel')->reduce_user_limit($id, $amount);

            // Ambil nama pengguna
            $pengguna = parent::model('PenggunaModel')->get_user_by_id($id);
            $nama_pengguna = $pengguna->username;

            // Tambahkan pesan ke history
            $this->addMessage('Limit dibayar', 'Limit untuk pengguna dengan nama ' . $nama_pengguna . ' telah dibayar sebesar Rp ' . number_format($amount, 0, ',', '.'), 'payment'); 
            parent::alert('alert', 'success-insert');
            redirect('limit');
        } else {
            redirect('limit');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengguna';
        $query = array('pengguna_id' => $id);
        $data['Pengguna'] = parent::model('PenggunaModel')->Lihat_Pengguna($query);

        // Ambil data transaksi pengguna
        $data['transaksi'] = $this->TransaksiModel->get_transaksi_by_user_id($id);

        // Ambil data pinjaman pengguna
        $data['pinjaman'] = $this->PinjamanModel->get_pinjaman_for_user($id);

        parent::template('pengguna/detail', $data);
    }
}

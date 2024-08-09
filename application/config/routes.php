<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
* login dan register routes modul
* */
$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';
$route['register'] = 'AuthController/register';

/*
* history routes modul
* */
$route['history'] = 'HistoryController';

/*
* angsuran routes modul
* */
$route['angsuran-mudharabah'] = 'AngsuranController/angsuranMudharabah';
$route['angsuran-murabahah'] = 'AngsuranController/angsuranMurabahah';
$route['angsuran-musyarakah'] = 'AngsuranController/angsuranMusyarakah';
$route['angsuran-ijarah'] = 'AngsuranController/angsuranIjarah';

/*
* pinjaman routes modul
* */

// view
$route['pinjaman'] = 'PinjamanController';
$route['pinjaman/tambah'] = 'PinjamanController/tambah';
$route['pinjaman/simpanPinjaman'] = 'PinjamanController/simpanPinjaman';
//disposisi
$route['pinjaman/approve/(:any)'] = 'PinjamanController/approve/$1';
$route['pinjaman/cancel/(:any)'] = 'PinjamanController/cancel/$1';
$route['pinjaman/delete/(:any)'] = 'PinjamanController/delete/$1';
$route['pinjaman/save_pinjaman'] = 'pinjamanController/save_pinjaman';

/*
* simpanan routes modul
* */
$route['simpanan-amanah'] = 'SimpananController/simpananAmanah';
$route['simpanan-qurban-aqikah'] = 'SimpananController/simpananQurbanAqikah';
$route['simpanan-umrah'] = 'SimpananController/simpananUmrah';
$route['simpanan-idul-fitri'] = 'SimpananController/simpananIdulFitri';
$route['simpanan-wadiah'] = 'SimpananController/simpananWadiah';

/*
* anggota modul routes
* */
$route['anggota'] = 'AnggotaController';
$route['anggota/tambah'] = 'AnggotaController/tambah';
$route['anggota/ubah/(:any)'] = 'AnggotaController/ubah/$1';
$route['anggota/hapus/(:any)'] = 'AnggotaController/hapus/$1';
$route['anggota/(:any)'] = 'AnggotaController/detail/$1';

/*
* barang modul routes
* */
$route['barang'] = 'BarangController';
$route['barang/tambah'] = 'BarangController/tambah';
$route['barang/ubah/(:any)'] = 'BarangController/ubah/$1';
$route['barang/hapus/(:any)'] = 'BarangController/hapus/$1';
$route['barang/(:any)'] = 'BarangController/detail/$1';

/*
* kategori modul routes
* */
$route['kategori'] = 'KategoriController';
$route['kategori/tambah'] = 'KategoriController/tambah';
$route['kategori/ubah/(:any)'] = 'KategoriController/ubah/$1';
$route['kategori/hapus/(:any)'] = 'KategoriController/hapus/$1';
$route['kategori/(:any)'] = 'KategoriController/detail/$1';

/*
* satuan modul routes
* */
$route['satuan'] = 'SatuanController';
$route['satuan/tambah'] = 'SatuanController/tambah';
$route['satuan/ubah/(:any)'] = 'SatuanController/ubah/$1';
$route['satuan/hapus/(:any)'] = 'SatuanController/hapus/$1';
$route['satuan/(:any)'] = 'SatuanController/detail/$1';

/*
* transaksi modul routes
* */
$route['transaksi'] = 'TransaksiController';
$route['transaksi/tambah'] = 'TransaksiController/tambah';
$route['transaksi/ubah/(:any)'] = 'TransaksiController/ubah/$1';
$route['transaksi/hapus/(:any)'] = 'TransaksiController/hapus/$1';
$route['transaksi/(:any)'] = 'TransaksiController/detail/$1';

/*
* pengguna modul routes
* */
$route['pengguna'] = 'PenggunaController/index';
$route['pengguna/tambah'] = 'PenggunaController/tambah';
$route['pengguna/ubah/(:any)'] = 'PenggunaController/ubah/$1';
$route['pengguna/hapus/(:any)'] = 'PenggunaController/hapus/$1';
/*
* akun modul routes
* */
$route['profile'] = 'ProfileController/index';
$route['profile/edit/(:any)'] = 'ProfilController/edit';
$route['profile/update'] = 'ProfileController/update';

$route['notifikasi'] = 'NotifikasiController';
$route['faq'] = 'FaqController';
$route['pengaturan'] = 'PengaturanController';

// Tambahkan di routes.php
$route['notification/account_change'] = 'notification/account_change';
$route['notification/out_of_stock'] = 'notification/out_of_stock';

$route['dashboard'] = 'DashboardController/user';

$route['default_controller'] = 'DashboardController';
$route['error'] = '';
$route['404_override'] = 'DashboardController';
$route['translate_uri_dashes'] = FALSE;
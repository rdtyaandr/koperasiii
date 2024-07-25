<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
* login dan register routes modul
* */
$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';
$route['register'] = 'AuthController/register';

//Untuk Rute User
/*
* laporan routes user
* */
$route['home'] = 'usercontroller';


//Untuk Admin
/*
* laporan routes modul
* */
$route['laporan-anggota'] = 'LaporanController/anggota';
$route['laporan-simpanan'] = 'LaporanController/simpananAnggota';
$route['laporan-pinjaman'] = 'LaporanController/pinjamanAnggota';
$route['laporan-tagihan-koperasi'] = 'LaporanController/tagihanKoperasi';

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
$route['pinjaman-mudharabah'] = 'PinjamanController/pinjamanMudharabah';
$route['pinjaman-murabahah'] = 'PinjamanController/pinjamanMurabahah';
$route['pinjaman-musyarakah'] = 'PinjamanController/pinjamanMusyarakah';
$route['pinjaman-ijarah'] = 'PinjamanController/pinjamanIjarah';

// insert
$route['pinjaman-mudharabah/tambah'] = 'PinjamanController/tambahMudharabah';

//disposisi
$route['pinjaman/setuju/(:any)'] = 'PinjamanController/setuju/$1';
$route['pinjaman/tolak/(:any)'] = 'PinjamanController/tolak/$1';

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
* gudang modul routes
* */
$route['gudang'] = 'GudangController';
$route['gudang/tambah'] = 'GudangController/tambah';
$route['gudang/ubah/(:any)'] = 'GudangController/ubah/$1';
$route['gudang/hapus/(:any)'] = 'GudangController/hapus/$1';
$route['gudang/(:any)'] = 'GudangController/detail/$1';

/*
* transaksi modul routes
* */
$route['transaksi'] = 'TransaksiController';
$route['transaksi/tambah'] = 'TransaksiController/tambah';
$route['transaksi/ubah/(:any)'] = 'TransaksiController/ubah/$1';
$route['transaksi/hapus/(:any)'] = 'TransaksiController/hapus/$1';
$route['transaksi/(:any)'] = 'TransaksiController/detail/$1';

/*
* akun modul routes
* */
$route['profil'] = 'ProfilController';
$route['pesan'] = 'PesanController';
$route['bantuan'] = 'BantuanController';
$route['pengaturan'] = 'PengaturanController';


$route['default_controller'] = 'AdminController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
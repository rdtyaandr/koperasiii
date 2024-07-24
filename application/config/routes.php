<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
	
	$route['login'] = 'AuthController/login';
	$route['logout'] = 'AuthController/logout';
	$route['register'] = 'AuthController/register';


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

	$route['default_controller'] = 'AdminController';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;


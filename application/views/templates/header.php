<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?> - Koperasi</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Favicons and Meta Tags -->
    <link rel="icon" href="<?= base_url('assets/images/favicon/icon.png') ?>" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/images/favicon/icon.png') ?>">
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/icon.png">

    <!-- CORE CSS-->
    <link href="<?= base_url('assets/css/materialize.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/style.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/plugins/animate.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/easy-autocomplete/easy-autocomplete.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/easy-autocomplete/easy-autocomplete.themes.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- Custome CSS-->
    <link href="<?= base_url('assets/css/custom/custom-style.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?= base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/jvectormap/jquery-jvectormap.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/chartist-js/chartist.min.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- dataTables css plugins-->
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/material.min.css') ?>" type="text/css" media="screen,projection">
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.material.min.css') ?>" type="text/css" media="screen,projection">
</head>


<body>

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <div class="navbar-fixed">
            <nav class="navbar-color blue darken-2" style="position: relative;">
                <div class="nav-wrapper" style="display: flex; align-items: center; height: 64px;"> <!-- Pastikan tinggi tetap -->
                    <ul class="left" style="display: flex; align-items: center;"> <!-- Tambahkan display flex di sini -->
                        <li>
                            <h1 class="logo-wrapper" style="display: flex; align-items: center;"> <!-- Tambahkan display flex di sini -->
                                <a href="<?= base_url() ?>" class="brand-logo darken-1" style="display: flex; align-items: center;"> <!-- Tambahkan display flex di sini -->
                                    <img src="<?= base_url('assets/images/favicon/icon.png') ?>" alt="bps logo" class="responsive-img hide-on-med-and-down" style="width: 9%; height: auto;">
                                    <span class="brand-logo" style="font-size: 1.5rem; line-height: 1; display: inline-block; letter-spacing: 0.03em; margin-left: 30px;">KOPERASI BPS</span>
                                </a>
                            </h1>
                        </li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down"> <!-- Tambahkan margin-left: auto untuk memindahkan ke kanan -->
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Cari di Aplikasi" />
                    </div>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating hide-on-large-only blue darken-2" style="position: absolute; left: 10px; top: 10px; box-shadow: 0px 0px 0px transparent !important;">
                        <i class="mdi-navigation-menu"></i>
                    </a>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <!--user profile -->
                    <li class="user-details">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?= base_url('assets/images/admin.png') ?>" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat  waves-effect waves-light white-text profile-btn" href="#">
                                    <?= $this->session->userdata('name') ?>
                                </a>
                                <p class="user-roal"><?= $this->session->userdata('level'); ?></p>
                            </div>
                        </div>
                    </li>
                    <!-- end user profile -->

                    <!-- main menu -->
                    <li class="li-hover">
                        <p class="ultra-small margin more-text">Menu Utama</p>
                    </li>
                    <li class="bold active">
                        <a href="<?= base_url() ?>"><i class="mdi-action-trending-up"></i> Dashboard</a>
                    </li>

                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold">
                                <a class="collapsible-header">
                                    <i class="mdi-action-account-balance-wallet"></i> Master Data
                                </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url('barang') ?>">Barang</a>
                                        </li>
                                        <li><a href="<?= base_url('kategori') ?>">Kategori</a>
                                        </li>
                                        <li><a href="<?= base_url('satuan') ?>">Satuan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="bold">
                        <a href="<?= base_url('transaksi') ?>">
                            <i class="mdi-action-swap-vert"></i> Data Transaksi
                        </a>
                    </li>

                    <li class="bold">
                        <a href="<?= base_url('anggota') ?>">
                            <i class="mdi-social-group"></i> Data Anggota
                        </a>
                    </li>

                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold">
                                <a class="collapsible-header">
                                    <i class="mdi-action-account-balance-wallet"></i> Simpanan
                                </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url('simpanan-amanah') ?>">Amanah</a>
                                        </li>
                                        <li><a href="<?= base_url('simpanan-qurban-aqikah') ?>">Qurban/Aqikah</a>
                                        </li>
                                        <li><a href="<?= base_url('simpanan-umrah') ?>">Umrah</a>
                                        </li>
                                        <li><a href="<?= base_url('simpanan-idul-fitri') ?>">Idul Fitri</a>
                                        </li>
                                        <li><a href="<?= base_url('simpanan-wadiah') ?>">Wadi'ah</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold">
                                <a class="collapsible-header">
                                    <i class="mdi-action-credit-card"></i> Pinjaman
                                </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url('pinjaman-mudharabah') ?>">Mudharabah</a>
                                        </li>
                                        <li><a href="<?= base_url('pinjaman-murabahah') ?>">Murabhahah</a>
                                        </li>
                                        <li><a href="<?= base_url('pinjaman-musyarakah') ?>">Musyarakah</a>
                                        </li>
                                        <li><a href="<?= base_url('pinjaman-ijarah') ?>">Ijarah</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold">
                                <a class="collapsible-header">
                                    <i class="mdi-editor-border-color"></i> Angsuran
                                </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url('angsuran-mudharabah') ?>">Mudharabah</a>
                                        </li>
                                        <li><a href="<?= base_url('angsuran-murabahah') ?>">Murabhahah</a>
                                        </li>
                                        <li><a href="<?= base_url('angsuran-musyarakah') ?>">Musyarakah</a>
                                        </li>
                                        <li><a href="<?= base_url('angsuran-ijarah') ?>">Ijarah</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold">
                                <a class="collapsible-header">
                                    <i class="mdi-action-history"></i> Histori
                                </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url('histori-barang') ?>">Barang</a>
                                        </li>
                                        <li><a href="<?= base_url('histori-transaksi') ?>">Transaksi</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="li-hover">
                        <div class="divider"></div>
                    </li>

                    <li class="li-hover">
                        <p class="ultra-small margin more-text">Akun</p>
                    </li>
                    <li>
                        <a href="<?= base_url('profil') ?>"><i class="mdi-action-account-circle"></i> Profil</a>
                    </li>
                    <li>
                        <a href="<?= base_url('pesan') ?>"><i class="mdi-communication-message"></i> Pesan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('bantuan') ?>"><i class="mdi-action-help"></i> Bantuan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('pengaturan') ?>"><i class="mdi-action-settings"></i> Pengaturan</a>
                    </li>
                    <li>
                        <a href="#logoutModal" class="modal-trigger"><i class="mdi-action-exit-to-app"></i> Keluar</a>
                    </li>
                    <!-- end main menu -->
                </ul>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- logout modal -->
            <div id="logoutModal" class="modal">
                <div class="modal-content">
                    <h5 class="light">Keluar dari aplikasi ?</h5>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('logout') ?>" class="modal-close waves-effect waves-green btn-flat">Lanjutkan</a>
                    <a href="#!" class="modal-close waves-effect waves-red btn-flat ">Batalkan</a>
                </div>
            </div>
            <!-- end logout modal -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <?php
                    switch ($this->session->flashdata('alert')) {
                        case 'success-insert': ?>
                            <div id="card-alert" class="card green lighten-5 animated slideInDown">
                                <div class="card-content green-text">
                                    <p>BERHASIL : Data telah ditambahkan.</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'error-insert': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Kesalahan saat menambahkan data</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'success-delete': ?>
                            <div id="card-alert" class="card green lighten-5 animated slideInDown">
                                <div class="card-content green-text">
                                    <p>BERHASIL : Data telah dihapus.</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'error-delete': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Kesalahan saat menghapus data</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'error-delete-used': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Data ini tidak dapat dihapus karena masih digunakan.</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'success-update': ?>
                            <div id="card-alert" class="card green lighten-5 animated slideInDown">
                                <div class="card-content green-text">
                                    <p>BERHASIL : Data telah diubah.</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'error-update': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Kesalahan saat mengubah data</p>
                                </div>
                            </div>
                    <?php
                            break;
                    }
                    ?>
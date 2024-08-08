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
    <link href="<?= base_url('assets/css/dropdown.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection">
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
            <nav class="navbar-color blue darken-2" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
                <div class="nav-wrapper" style="display: flex; align-items: center; height: 64px;"> <!-- Pastikan tinggi tetap -->
                    <ul class="left" style="display: flex; align-items: center;"> <!-- Tambahkan display flex di sini -->
                        <li>
                            <h1 class="logo-wrapper" style="display: flex; align-items: center;">
                                <a href="<?= base_url() ?>" class="brand-logo darken-1" style="display: flex; align-items: center;">
                                    <img src="<?= base_url('assets/images/favicon/icon.png') ?>" alt="bps logo" class="responsive-img hide-on-med-and-down" style="width: 9%; height: auto;">
                                    <span class="brand-logo" style="font-size: 1.6rem; line-height: 1; font-weight: 500; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.3); margin-left: 30px; letter-spacing: 0.03em;">KOPERASI BPS</span> <!-- Perubahan pada gaya teks -->
                                </a>
                            </h1>
                        </li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down" style="margin: auto 270px;">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Cari di Aplikasi" />
                    </div>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating hide-on-large-only blue darken-2" style="position: absolute; left: 10px; top: 10px; box-shadow: 0px 0px 0px transparent !important;">
                        <i class="mdi-navigation-menu"></i>
                    </a>
                    <ul class="right">
    <!-- Item notifikasi -->
    <li>
        <a href="<?= base_url('pesan') ?>" class="waves-effect waves-light">
            <i class="material-icons">notifications</i>
            <?php if ($notifikasi_count > 0) : ?>
        <span class="badge"><?= $notifikasi_count ?></span>
    <?php endif; ?>
        </a>
    </li>
</ul>
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
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?= base_url('assets/images/admin.png') ?>" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat  waves-effect waves-light white-text profile-btn" href="<?= base_url('profile') ?>">
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


                    <?php if ($this->session->userdata('level') == 'admin') : ?>
                        <li class="bold active">
                            <a href="<?= base_url() ?>"><i class="mdi-action-trending-up"></i> Dashboard</a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'operator') : ?>
                        <li class="bold active">
                            <a href="<?= base_url() ?>"><i class="mdi-action-trending-up"></i> Dashboard</a>
                        </li>
                        <?php elseif ($this->session->userdata('level') == 'user') : ?>
                            <li class="bold active">
                                <a href="<?= base_url('dashboard/user') ?>"><i class="mdi-action-trending-up"></i> Dashboard</a>
                            </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') == 'admin') : ?>
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
                    <?php elseif ($this->session->userdata('level') == 'operator') : ?>
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
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') == 'admin') : ?>
                        <li class="bold">
                            <a href="<?= base_url('transaksi') ?>">
                                <i class="mdi-action-swap-vert"></i> Data Transaksi
                            </a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'operator') : ?>
                        <li class="bold">
                            <a href="<?= base_url('transaksi') ?>">
                                <i class="mdi-action-swap-vert"></i> Data Transaksi
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') == 'admin') : ?>
                        <li class="bold">
                            <a href="<?= base_url('pengguna') ?>" class="waves-effect waves-cyan">
                                <i class="material-icons">person</i> Data pengguna
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') == 'admin') : ?>
                        <li class="bold">
                            <a href="<?= base_url('pinjaman') ?>" class="waves-effect waves-cyan">
                                <i class="material-icons">account_balance</i> Pengajuan Pinjaman
                            </a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'user') : ?>
                        <li class="bold">
                            <a href="<?= base_url('pinjaman') ?>" class="waves-effect waves-cyan">
                                <i class="material-icons">account_balance</i> Pengajuan Pinjaman
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') == 'admin') : ?>
                        <li class="bold">
                            <a href="<?= base_url('history') ?>">
                                <i class="mdi-action-history"></i> Histori
                            </a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'operator') : ?>
                        <li class="bold">
                            <a href="<?= base_url('history') ?>">
                                <i class="mdi-action-history"></i> Histori
                            </a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'user') : ?>
                        <li class="bold">
                            <a href="<?= base_url('history') ?>">
                                <i class="mdi-action-history"></i> Histori
                            </a>
                        </li>
                    <?php endif; ?>


                    <li class="li-hover">
                        <div class="divider"></div>
                    </li>

                    <li class="li-hover">
                        <p class="ultra-small margin more-text">Akun</p>
                    </li>
                    <li>
                        <a href="<?= base_url('profile') ?>"><i class="material-icons">person</i> Profil</a>
                    </li>
                    <li>
                        <a href="<?= base_url('bantuan') ?>"><i class="material-icons">help</i> Bantuan</a>
                    </li>
                    <li>
                        <a href="#" id="logoutButton"><i class="mdi-action-exit-to-app"></i> Keluar</a>
                    </li>
                    <!-- end main menu -->
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only blue darken-2" style="box-shadow: 0px 0px 0px transparent !important;">
                    <i class="material-icons">menu</i>
                </a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <script>
                document.getElementById('logoutButton').addEventListener('click', function() {
                    Swal.fire({
                        title: 'Keluar dari aplikasi?',
                        text: "Anda akan keluar dari akun ini.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Lanjutkan',
                        cancelButtonText: 'Batalkan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= base_url('logout') ?>';
                        }
                    });
                });
            </script>

           <!-- START CONTENT -->
<section id="content">

<!--start container-->
<div class="container">
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <?php if (!empty($notifikasi)) : ?>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h5>Notifikasi</h5>
                        <ul class="collection">
                            <?php foreach ($notifikasi as $item) : ?>
                                <li class="collection-item">
                                    <?= $item['pesan'] ?>
                                    <a href="<?= base_url('notifikasi/baca/' . $item['id']) ?>" class="secondary-content"><i class="material-icons">done</i></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <p>Belum ada notifikasi.</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<!--end container-->

</section>
<!-- END CONTENT -->


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
                        case 'error-stock': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Stok barang tidak mencukupi.</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'error-update-detail': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Detail barang tidak lengkap atau salah.</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'error-invalid-barang': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Barang tidak valid.</p>
                                </div>
                            </div>
                        <?php
                            break;
                        case 'error-limit': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Telah mencapai batas limit.</p>
                                </div>
                            </div>
                    <?php
                            break;
                        case 'success-edit': ?>
                            <div id="card-alert" class="card green lighten-5 animated slideInDown">
                                <div class="card-content green-text">
                                    <p>BERHASIL : Data Profil telah diubah.</p>
                                </div>
                            </div>
                            <?php
                            break;
                        case 'error-edit': ?>
                            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                                <div class="card-content red-text">
                                    <p>GAGAL : Kesalahan saat mengubah data profile</p>
                                </div>
                            </div>
                            <?php
                            break;
                    }
                    ?>

                    <style>
                        /* .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
        }
        .alert.success {background-color: #4CAF50;}
        .alert.info {background-color: #2196F3;}
        .alert.warning {background-color: #ff9800;}
        .alert.danger {background-color: #f44336;}
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        .closebtn:hover {
            color: black;
        } */
                    </style>
                    </head>

                    <body>

                        <!-- <?php if ($this->session->flashdata('alert')) : ?>
    <div class="alert <?php echo $this->session->flashdata('alert'); ?>">
        <?php
                                    // switch ($this->session->flashdata('alert')) {
                                    //     case 'belum_login':
                                    //         echo "Anda belum login. Silakan login terlebih dahulu.";
                                    //         break;
                                    //     case 'sukses_tambah':
                                    //         echo "Pengguna berhasil ditambahkan.";
                                    //         break;
                                    //     case 'gagal_tambah':
                                    //         echo "Pengguna gagal ditambahkan.";
                                    //         break;
                                    //     case 'sukses_ubah':
                                    //         echo "Pengguna berhasil diubah.";
                                    //         break;
                                    //     case 'gagal_ubah':
                                    //         echo "Pengguna gagal diubah.";
                                    //         break;
                                    //     case 'sukses_hapus':
                                    //         echo "Pengguna berhasil dihapus.";
                                    //         break;
                                    //     case 'gagal_hapus':
                                    //         echo "Pengguna gagal dihapus.";
                                    //         break;
                                    //     default:
                                    //         echo "Terjadi kesalahan.";
                                    //         break;
                                    // }
        ?>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif; ?> -->
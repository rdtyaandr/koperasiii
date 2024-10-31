<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description"
        content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords"
        content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
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
    <link href="<?= base_url('assets/css/materialize.css') ?>" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="<?= base_url('assets/css/style.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/plugins/animate.css') ?>" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/easy-autocomplete/easy-autocomplete.css') ?>" type="text/css"
        rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/easy-autocomplete/easy-autocomplete.themes.css') ?>" type="text/css"
        rel="stylesheet" media="screen,projection">

    <!-- Custome CSS-->
    <link href="<?= base_url('assets/css/dropdown.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/custom/custom-style.css') ?>" type="text/css" rel="stylesheet"
        media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?= base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css') ?>" type="text/css"
        rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/jvectormap/jquery-jvectormap.css') ?>" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/chartist-js/chartist.min.css') ?>" type="text/css" rel="stylesheet"
        media="screen,projection">
    <!-- dataTables css plugins-->
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/material.min.css') ?>" type="text/css"
        media="screen,projection">
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.material.min.css') ?>" type="text/css"
        media="screen,projection">
</head>
<style>
    /* Sembunyikan scrollbar tetapi tetap memungkinkan pengguliran */
    html {
        overflow: auto;
        /* Pastikan elemen tetap bisa di-scroll */
        scrollbar-width: none;
        /* Untuk Firefox */
        -ms-overflow-style: none;
        /* Untuk Internet Explorer dan Edge */
    }

    html::-webkit-scrollbar {
        display: none;
        /* Untuk browser berbasis WebKit seperti Chrome dan Safari */
    }

    .user-profile-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        padding: 10px;
        min-width: 200px;
        z-index: 1000;
        animation: fadeInnn 0.3s;
    }

    @keyframes fadeInnn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .user-profile-trigger:hover .user-profile-content {
        display: block;
    }

    @media (max-width: 992px) {
        .user-profile-dropdown .name-span {
            display: none !important;
        }

        .user-profile-trigger img {
            margin-right: 0px !important;
        }

        #brand-logo-kop {
            margin-left: 0px !important;
        }
    }

    #custom-card-alert {
        position: fixed;
        bottom: 20px;
        /* Pindah ke bawah */
        right: 20px;
        z-index: 1000;
        width: 270px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        opacity: 1;
        border-radius: 20px;
        font-family: 'Arial', sans-serif;
        background-color: #ffffff;
        /* Warna latar belakang putih */
        border: 1px solid #e0e0e0;
        /* Border abu-abu */
    }

    .custom-card {
        border-radius: 20px;
        /* Meningkatkan border-radius */
    }

    .custom-card-content {
        border-radius: 20px;
        /* Meningkatkan border-radius */
        position: relative;
        /* Untuk posisi tombol close */
        text-align: center;
        /* Menyelaraskan teks ke tengah */
    }

    .animated {
        animation-duration: 0.5s;
        /* Durasi animasi */
    }

    .slideInUp {
        animation-name: slideInUp;
        /* Nama animasi */
    }

    @keyframes slideInUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .fadeOut {
        animation-name: fadeOut;
        /* Nama animasi untuk menghilang */
        animation-duration: 0.5s;
        /* Durasi animasi */
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(20px);
            /* Animasi turun ke bawah */
        }
    }

    .alert-text {
        font-size: 1.1rem;
        /* Ukuran font */
        line-height: 1.5;
        /* Jarak antar baris */
        margin-top: 20px;
        /* Jarak atas untuk menurunkan teks */
    }

    .close-btn {
        position: absolute;
        top: -10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #555;
        /* Warna tombol close */
        background-color: transparent !important;
        /* Menghapus background color tombol close */
    }

    .close-btn:hover {
        color: #333;
        /* Warna teks saat hover */
    }
</style>

<body>

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <div class="navbar-fixed">
            <nav class="navbar-color blue darken-2" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
                <div class="nav-wrapper" style="display: flex; align-items: center; height: 64px;">
                    <!-- Pastikan tinggi tetap -->
                    <ul class="left" style="display: flex; align-items: center;">
                        <!-- Tambahkan display flex di sini -->
                        <li>
                            <h1 class="logo-wrapper" style="display: flex; align-items: center; margin-left: 15px;">
                                <a href="<?= base_url() ?>" class="brand-logo darken-1"
                                    style="display: flex; align-items: center;">
                                    <img src="<?= base_url('assets/images/favicon/icon.png') ?>" alt="bps logo"
                                        class="responsive-img hide-on-med-and-down" style="width: 9%; height: auto;">
                                    <span class="brand-logo" id="brand-logo-kop"
                                        style="font-size: 1.6rem; line-height: 1; font-weight: 500; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.3); margin-left: 30px; letter-spacing: 0.03em;">KOPERASI
                                        BPS</span> <!-- Perubahan pada gaya teks -->
                                </a>
                            </h1>
                        </li>
                    </ul>

                    <div style="margin-left: auto;">
                        <?php if ($this->session->userdata('level') !== 'user'): ?>
                            <a class='dropdown-button btn blue lighten-2' data-activates='dropdown1'
                                style="position: relative; z-index: 10; border-radius: 50%; width:auto; height:auto;">
                                <?php if ($this->session->userdata('level') != 'operator'): ?>
                                    <i class="material-icons"
                                        style="line-height: 0; position: absolute; left: <?php echo (!empty($stok_rendah) || !empty($pinjaman_menunggu)) ? '6.5px' : '65px'; ?>;">notifications</i>
                                <?php elseif ($this->session->userdata('level') == 'operator'): ?>
                                    <i class="material-icons"
                                        style="line-height: 0; position: absolute; left: <?= (empty($stok_rendah) && !empty($pinjaman_menunggu)) ? '65px' : (empty($stok_rendah) && empty($pinjaman_menunggu) ? '65px' : '6.5px'); ?>;">notifications</i>
                                <?php endif; ?>
                                <?php if (($this->session->userdata('level') === 'admin' && (!empty($stok_rendah) || !empty($pinjaman_menunggu))) || ($this->session->userdata('level') === 'operator' && !empty($stok_rendah))): ?>
                                    <span class="newbadge"
                                        style="position: absolute; left: 24px; bottom: 4px; width: 10px; height: 10px; background-color: red; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;"></span>
                                    <!-- Badge untuk jumlah item -->
                            </a>
                            <ul id='dropdown1' class='dropdown-content'
                                style="margin-top: 36px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); background-color: white; padding: 10px; min-width: 200px;">
                                <?php if (in_array($this->session->userdata('level'), ['admin', 'operator']) && !empty($stok_rendah)): ?>
                                    <li><strong style="color: #616161;">Stok <br>Rendah :</strong></li>
                                    <?php foreach ($stok_rendah as $barang): ?>
                                        <li><a href="<?php echo base_url(($barang->jenis_barang == 'toko' ? 'barang' : 'konsinyasi')); ?>" class="red-text"
                                                style="text-decoration: none; color: #d32f2f;"><?php echo $barang->nama_barang; ?>
                                                (Sisa: <?php echo $barang->stok; ?>)</a></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if ($this->session->userdata('level') === 'admin' && !empty($pinjaman_menunggu)): ?>
                                    <li><strong style="color: #616161;">Menunggu <br>Persetujuan :</strong></li>
                                    <?php foreach ($pinjaman_menunggu as $pinjaman): ?>
                                        <li><a href="<?php echo base_url('pinjaman'); ?>" class="red-text"
                                                style="text-decoration: none; color: #1976d2;"><?php echo $pinjaman->username; ?>
                                                (Jumlah: <?php echo 'Rp ' . number_format($pinjaman->jumlah_pinjaman, 0, ',', '.'); ?>)</a></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>

                    <!-- Tambahkan ini -->
                    <?php if ($this->session->userdata('level') == 'admin'): ?>
                        <div class="user-profile-dropdown" style="position: relative; display: inline-block; margin-right: 20px; margin-bottom: <?= (!empty($stok_rendah) || !empty($pinjaman_menunggu)) ? '0px' : '65px'; ?>;">
                        <?php elseif ($this->session->userdata('level') == 'operator'): ?>
                            <div class="user-profile-dropdown" style="position: relative; display: inline-block; margin-right: 20px; margin-bottom: <?= (empty($stok_rendah) && !empty($pinjaman_menunggu)) ? '65px' : (empty($stok_rendah) && empty($pinjaman_menunggu) ? '65px' : '0px'); ?>;">
                            <?php elseif ($this->session->userdata('level') == 'user'): ?>
                                <div class="user-profile-dropdown" style="position: relative; display: inline-block; margin-right: 20px; margin-bottom: 0px">
                                <?php endif; ?>
                                <a class="user-profile-trigger" style="display: flex; align-items: center; cursor: pointer;">
                                    <img src="<?= base_url('assets/upload/profile_picture/' . ($this->session->userdata('profile_picture') ? $this->session->userdata('profile_picture') : 'default.png')); ?>" alt="Profile Picture" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                                    <span style="color: white; display: inline;" class="name-span"><?= $this->session->userdata('name'); ?></span>
                                    <i class="material-icons" style="margin-left: 5px;">arrow_drop_down</i>
                                </a>
                                <div class="user-profile-content" style="display: none; position: absolute; right: 0; background-color: white; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); border-radius: 5px; padding: 10px; min-width: 200px; z-index: 1000; animation: fadeIn 0.3s;">
                                    <div style="display: flex; align-items: center; padding: 15px; border-bottom: 1px solid #e0e0e0; background-color: #f9f9f9; border-radius: 5px; transition: background-color 0.3s;">
                                        <?php $profile_picture = $this->session->userdata('profile_picture') ? $this->session->userdata('profile_picture') : 'default.png'; ?>
                                        <img src="<?= base_url('assets/upload/profile_picture/' . $profile_picture); ?>" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                                        <div>
                                            <p style="font-weight: bold; color: #343a40; font-size: 1.2rem; margin-bottom: 0px; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"><?= $this->session->userdata('username'); ?></p>
                                            <p style="color: #6c757d; margin-bottom: 0px; font-style: italic;"><?= $this->session->userdata('satker'); ?></p>
                                            <p style="color: #6c757d; margin-bottom: 0;"><?= $this->session->userdata('email'); ?></p>
                                        </div>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <a href="<?= base_url('profile'); ?>" class="btn-flat" style="width: 100%; text-align: left; padding: 10px; display: flex; align-items: center; margin-top: 6px; text-transform: capitalize; transition: background-color 0.3s; border-radius: 5px; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(0, 0, 0, 0.1)'" onmouseout="this.style.backgroundColor='transparent'">
                                            <i class="material-icons" style="margin-right: 10px; font-size: 18px;">account_box</i> profil
                                        </a>
                                        <a href="#" id="logout-button" class="btn-flat" style="width: 100%; text-align: left; padding: 10px; display: flex; align-items: center; color: #dc3545; text-transform: capitalize; transition: background-color 0.3s; border-radius: 5px; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(220, 53, 69, 0.1)'" onmouseout="this.style.backgroundColor='transparent'">
                                            <i class="material-icons" style="margin-right: 10px; font-size: 18px;">exit_to_app</i> keluar
                                        </a>
                                    </div>
                                </div>
                                </div>
                                <!-- Akhir dari tambahan -->

                                <a data-activates="slide-out"
                                    class="sidebar-collapse btn-floating hide-on-large-only blue darken-2"
                                    style="position: absolute; left: 10px; top: 10px; box-shadow: 0px 0px 0px transparent !important;">
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
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <?php
                                $profile_picture = $this->session->userdata('profile_picture');
                                if (empty($profile_picture)) {
                                    $profile_picture = 'default.png';
                                }
                                ?>
                                <img src="<?php echo base_url('assets/upload/profile_picture/' . $profile_picture); ?>"
                                    style="width: 55px; height: 55px; object-fit: cover; border-radius: 50%;">
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat  waves-effect waves-light white-text profile-btn"
                                    href="<?= base_url('profile') ?>">
                                    <?= $this->session->userdata('username') ?>
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


                    <?php if ($this->session->userdata('level') == 'admin'): ?>
                        <li class="bold">
                            <a href="<?= base_url('dashboard') ?>"><i class="material-icons">equalizer</i> Dashboard</a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'operator'): ?>
                        <li class="bold">
                            <a href="<?= base_url('dashboard') ?>"><i class="material-icons">equalizer</i> Dashboard</a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'user'): ?>
                        <li class="bold">
                            <a href="<?= base_url('dashboard/user') ?>"><i class="material-icons">equalizer</i>
                                Dashboard</a>
                        </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') != 'user'): ?>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li class="bold">
                                    <a class="collapsible-header">
                                        <i class="material-icons">store</i> Master Data
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="<?= base_url('barang') ?>">Barang</a>
                                            </li>
                                            <li><a href="<?= base_url('kategori') ?>">Kategori</a>
                                            </li>
                                            <li><a href="<?= base_url('satuan') ?>">Satuan</a>
                                            </li>
                                            <li style="display: none;"><a href="<?= base_url('konsinyasi') ?>">Konsinyasi</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') != 'user'): ?>
                        <li class="bold">
                            <a href="<?= base_url('transaksi') ?>">
                                <i class="material-icons">shopping_cart</i> Transaksi
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') != 'user'): ?>
                        <li class="bold">
                            <a href="<?= base_url('pengguna') ?>" class="waves-effect waves-cyan">
                                <i class="material-icons">group_add</i> Pengguna
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php if ($this->session->userdata('level') != 'operator'): ?>
                        <li class="bold">
                            <a href="<?= base_url('pinjaman') ?>" class="waves-effect waves-cyan">
                                <i class="material-icons">local_atm</i> Pinjaman
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('level') != 'user'): ?>
                        <li class="bold">
                            <a href="<?= base_url('laporan') ?>">
                                <i class="material-icons">bar_chart</i> Laporan
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('level') == 'admin'): ?>
                        <li class="bold">
                            <a href="<?= base_url('history') ?>">
                                <i class="mdi-action-history"></i> Histori
                            </a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'operator'): ?>
                        <li class="bold">
                            <a href="<?= base_url('history') ?>">
                                <i class="mdi-action-history"></i> Histori
                            </a>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'user'): ?>
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
                    <li class="bold">
                        <a href="<?= base_url('profile') ?>"><i class="material-icons">portrait</i> Profil</a>
                    </li>
                    <?php if ($this->session->userdata('level') == 'operator'): ?>
                        <li class="bold">
                            <a href="<?= base_url('faq') ?>"><i class="material-icons">help</i> Bantuan</a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a id="logoutButton"><i class="mdi-action-exit-to-app"></i> Keluar</a>
                    </li>
                    <!-- end main menu -->
                </ul>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <script>
                document.getElementById('logoutButton').addEventListener('click', function() {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan keluar dari akun ini.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, keluar!',
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

                    <?php
                    switch ($this->session->flashdata('alert')) {
                        case 'belum_login': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Anda belum login.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'success-reture': ?>
                            <div id="custom-card-alert" class="custom-card green lighten-4 animated slideInUp">
                                <div class="custom-card-content green-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>BERHASIL:</strong><br>Barang telah berhasil direture.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'success-insert': ?>
                            <div id="custom-card-alert" class="custom-card green lighten-4 animated slideInUp">
                                <div class="custom-card-content green-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>BERHASIL:</strong><br>Data telah ditambahkan.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-insert': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Kesalahan saat menambahkan data</p>
                                </div>
                            </div>
                        <?php break;
                        case 'success-delete': ?>
                            <div id="custom-card-alert" class="custom-card green lighten-4 animated slideInUp">
                                <div class="custom-card-content green-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>BERHASIL:</strong><br>Data telah dihapus.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-delete': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Kesalahan saat menghapus data</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-delete-used': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Data ini tidak dapat dihapus karena masih digunakan.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-not-found': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Data ini tidak dapat ditemukan.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'success-update': ?>
                            <div id="custom-card-alert" class="custom-card green lighten-4 animated slideInUp">
                                <div class="custom-card-content green-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>BERHASIL:</strong><br>Data telah diubah.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-update': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Kesalahan saat mengubah data</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-stock': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Stok barang tidak mencukupi.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-update-detail': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Detail barang tidak lengkap atau salah.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-invalid-barang': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Barang tidak valid.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'validation_failed': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Validasi gagal tolong ulangi lagi.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-duplicate': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Nama yang dipilih sudah tersedia.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'success-save': ?>
                            <div id="custom-card-alert" class="custom-card green lighten-4 animated slideInUp">
                                <div class="custom-card-content green-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>BERHASIL:</strong><br>Limit telah berhasil diperbarui.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'success-reset': ?>
                            <div id="custom-card-alert" class="custom-card green lighten-4 animated slideInUp">
                                <div class="custom-card-content green-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>BERHASIL:</strong><br>Limit telah berhasil direset.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'success-reduce': ?>
                            <div id="custom-card-alert" class="custom-card green lighten-4 animated slideInUp">
                                <div class="custom-card-content green-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>BERHASIL:</strong><br>Limit telah berhasil dibayar.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-reduce': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Telah terjadi kesalahan.</p>
                                </div>
                            </div>
                        <?php break;
                        case 'error-limit': ?>
                            <div id="custom-card-alert" class="custom-card red lighten-4 animated slideInUp">
                                <div class="custom-card-content red-text">
                                    <button class="close-btn" onclick="closeAlert(this);">&times;</button>
                                    <p class="alert-text"><strong>GAGAL:</strong><br>Telah mencapai batas limit.</p>
                                </div>
                            </div>
                    <?php break;
                    }
                    ?>
                    <script>
                        function closeAlert(button) {
                            const alert = button.parentElement.parentElement;
                            alert.classList.add('fadeOut');
                            setTimeout(() => alert.style.display = 'none', 500); // Menghilangkan setelah animasi
                        }

                        // Menghilangkan alert setelah 5 detik
                        setTimeout(function() {
                            const alert = document.getElementById('custom-card-alert');
                            if (alert) {
                                alert.classList.add('fadeOut');
                                setTimeout(() => alert.style.display = 'none', 500); // Menghilangkan setelah animasi
                            }
                        }, 5000); // 5 detik
                    </script>

                    <script type="text/javascript">
                        document.addEventListener('DOMContentLoaded', function() {
                            const menuItems = document.querySelectorAll('.side-nav.fixed.leftside-navigation li.bold');
                            const dropdownItems = document.querySelectorAll('.collapsible-body li a');
                            const currentUrl = window.location.href;
                            const baseUrl = '<?= base_url() ?>';

                            function setActiveMenu() {
                                menuItems.forEach(item => {
                                    const link = item.querySelector('a');
                                    if (link && currentUrl.includes(link.getAttribute('href'))) {
                                        item.classList.add('active');
                                    } else {
                                        item.classList.remove('active');
                                    }
                                });

                                dropdownItems.forEach(dropdownItem => {
                                    if (currentUrl.includes(dropdownItem.getAttribute('href'))) {
                                        const parentLi = dropdownItem.closest('li.bold');
                                        if (parentLi) {
                                            parentLi.classList.add('active');
                                            parentLi.querySelector('.collapsible-header').classList.add('active');
                                            parentLi.querySelector('.collapsible-body').style.display = 'block';
                                        }
                                    }
                                });

                                if (currentUrl === baseUrl || currentUrl.includes(baseUrl + 'dashboard')) {
                                    const dashboardItem = document.querySelector('a[href*="dashboard"]').closest('li.bold');
                                    if (dashboardItem) {
                                        dashboardItem.classList.add('active');
                                    }
                                }

                                if (currentUrl.includes(baseUrl + 'limit')) {
                                    const penggunaItem = document.querySelector('a[href*="pengguna"]').closest('li.bold');
                                    if (penggunaItem) {
                                        penggunaItem.classList.add('active');
                                    }
                                }
                            }

                            setActiveMenu();

                            menuItems.forEach(item => {
                                item.addEventListener('click', function() {
                                    menuItems.forEach(i => i.classList.remove('active'));
                                    this.classList.add('active');
                                });
                            });

                            dropdownItems.forEach(item => {
                                item.addEventListener('click', function() {
                                    menuItems.forEach(i => i.classList.remove('active'));
                                    const parentLi = this.closest('li.bold');
                                    if (parentLi) {
                                        parentLi.classList.add('active');
                                        parentLi.querySelector('.collapsible-header').classList.add('active');
                                    }
                                });
                            });
                        });
                    </script>
                    <script type="text/javascript">
                        document.getElementById('notification-button').addEventListener('click', function(event) {
                            event.preventDefault(); // Prevent default action
                            const modal = document.getElementById('notification-modal');
                            modal.style.display = 'block'; // Show modal
                            setTimeout(() => {
                                modal.style.transform = 'translateX(0)'; // Slide in animation
                            }, 10); // Small delay to ensure animation works

                            // Fetch notifications from the server
                            fetch('<?= base_url('NotificationController/get_notifications') ?>')
                                .then(response => response.json())
                                .then(notifications => {
                                    // Display notifications in the modal
                                    const notificationList = document.getElementById('notification-list');
                                    notificationList.innerHTML = ''; // Clear previous notifications
                                    notifications.forEach(notification => {
                                        const li = document.createElement('li');
                                        li.textContent = notification.message; // Adjust according to your notification data structure
                                        li.style.padding = '10px';
                                        li.style.borderBottom = '1px solid #ddd';
                                        notificationList.appendChild(li);
                                    });
                                })
                                .catch(error => console.error('Error fetching notifications:', error));
                        });

                        // Close modal
                        document.querySelector('.modal-close').addEventListener('click', function() {
                            const modal = document.getElementById('notification-modal');
                            modal.style.transform = 'translateX(100%)'; // Slide out animation
                            setTimeout(() => {
                                modal.style.display = 'none'; // Hide modal after animation
                            }, 300); // Match transition duration
                        });
                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var userProfileTrigger = document.querySelector('.user-profile-trigger');
                            var userProfileContent = document.querySelector('.user-profile-content');
                            var logoutButton = document.getElementById('logout-button');

                            userProfileTrigger.addEventListener('click', function() {
                                userProfileContent.style.display = userProfileContent.style.display === 'none' || userProfileContent.style.display === '' ? 'block' : 'none';
                            });

                            document.addEventListener('click', function(event) {
                                if (!userProfileTrigger.contains(event.target) && !userProfileContent.contains(event.target)) {
                                    userProfileContent.style.display = 'none';
                                }
                            });

                            logoutButton.addEventListener('click', function(event) {
                                event.preventDefault();
                                Swal.fire({
                                    title: 'Apakah Anda yakin?',
                                    text: "Anda akan keluar dari akun ini.",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, keluar!',
                                    cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '<?= base_url('logout'); ?>';
                                    }
                                });
                            });
                        });
                    </script>
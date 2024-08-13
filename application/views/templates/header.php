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

                    <ul class="right" style="display: flex; align-items: center;">
    <li style="position: relative;">
        <a href="#" id="notification-button" class="btn-floating blue darken-2" style="margin-right: 15px; display: flex; align-items: center; justify-content: center; height: 40px; width: 40px;">
            <i class="material-icons">notifications</i>
        </a>
        <span id="notification-count" style="position: absolute; top: -5px; right: -5px; background: red; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; font-weight: bold; text-align: center; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">3</span>
    </li>
</ul>

                    <!-- Pop-up Notifikasi -->
                    <div id="notification-modal" class="modal" style="display: none; position: fixed; top: 0; right: 0; width: 300px; height: 100%; background: #ffffff; box-shadow: -2px 0 5px rgba(0,0,0,0.2); transform: translateX(100%); transition: transform 0.3s ease;">
    <div class="modal-content" style="padding: 20px; height: calc(100% - 50px); overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <h4 style="margin: 0;">Notifikasi</h4>
        </div>
        <ul id="notification-list" style="list-style-type: none; padding: 0; margin: 0;">
            <!-- Notifications will be added here -->
        </ul>
    </div>
    <div class="modal-footer" style="position: absolute; bottom: 0; width: 100%; background: #f1f1f1; padding: 10px; text-align: center;">
        <button class="modal-close btn" style="background-color: #007bff; color: #ffffff; border: none; padding: 10px; cursor: pointer; width: 100%;">Tutup</button>
    </div>
</div>

</div>


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
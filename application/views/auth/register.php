<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Sistem Informasi Koperasi Syariah">
    <meta name="keywords" content="koperasi, syariah, sistem informasi">
    <title><?= $title ?></title>

    <!-- Favicons-->
    <link rel="icon" href="<?= base_url('assets/images/favicon/order-app-logo.png') ?>" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/images/favicon/apple-touch-icon-152x152.png') ?>">
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">

    <!-- CORE CSS-->
    <link href="<?= base_url('assets/css/materialize.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/style.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/plugins/animate.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/custom/custom-style.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?= base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/layouts/page-center.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body class="teal">
    <div id="register-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="register-form" action="<?= base_url('register') ?>" method="post">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="<?= base_url('assets/images/favicon/simkopsis-brand.png') ?>" alt="" class="responsive-img valign profile-image-login">
                        <p class="center login-form-text">Sistem Informasi Koperasi Syariah</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="username" type="text" name="username" required>
                        <label for="username" class="center-align">Nama Pengguna</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" name="password" required>
                        <label for="password">Kata Sandi</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password_confirm" type="password" name="password_confirm" required>
                        <label for="password_confirm">Konfirmasi Kata Sandi</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person prefix"></i>
                        <input id="nama" type="text" name="nama" required>
                        <label for="nama">Nama Lengkap</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" name="register" class="btn waves-effect waves-light col s12">Daftar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery Library -->
    <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery-1.11.2.min.js') ?>"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url('assets/js/materialize.min.js') ?>"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?= base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?= base_url('assets/js/plugins.min.js') ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?= base_url('assets/js/custom-script.js') ?>"></script>

</body>
</html>

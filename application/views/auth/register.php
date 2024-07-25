<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
	<meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
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
	<link href="<?= base_url('assets/js/plugins/chartist-js/chartist.min.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="<?= base_url('assets/css/layouts/page-center.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body class="teal">

	<div id="register-page" class="row">
		<div class="col s12 z-depth-4 card-panel">
			<form class="register-form" action="<?= base_url('register') ?>" method="post">
				<div class="row">
					<div class="input-field col s12 center">
						<img src="<?= base_url('assets/images/favicon/simkopsis-brand.png') ?>" alt="" class="responsive-img valign profile-image-login">
						<p class="center login-form-text">sistem informasi koperasi syariah</p>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="mdi-social-person-outline prefix"></i>
						<input id="full_name" type="text" name="full_name" required>
						<label for="full_name" class="center-align">Nama Lengkap</label>
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
						<i class="mdi-communication-email prefix"></i>
						<input id="email" type="email" name="email" required>
						<label for="email" class="center-align">Email</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="mdi-action-account-balance prefix"></i>
						<input id="satker" type="text" name="satker" required>
						<label for="satker" class="center-align">Satker</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s6">
						<i class="mdi-action-lock-outline prefix"></i>
						<input id="password" type="password" name="password" required>
						<label for="password">Kata Sandi</label>
					</div>
					<div class="input-field col s6">
						<i class="mdi-action-lock-outline prefix"></i>
						<input id="confirm_password" type="password" name="confirm_password" required>
						<label for="confirm_password">Ulangi Kata Sandi</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button type="submit" name="register" class="btn waves-effect waves-light col s12">Daftar</button>
					</div>
				</div>
				<div class="row">
					<label>Sudah punya akun? Klik <a href="<?= base_url('login') ?>">Login</a></label>
				</div>
			</form>
		</div>
	</div>

	<!-- Scripts -->
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery-1.11.2.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/materialize.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/chartist-js/chartist.min.js') ?>"></script>
</body>

</html>
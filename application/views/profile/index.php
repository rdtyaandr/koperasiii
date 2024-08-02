<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?> </title>
    <!-- Menyertakan Materialize CSS -->
    <style>
        .profile-card {
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Profil Saya</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo site_url('profile/edit'); ?>">Ubah Profil</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2 profile-card">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Informasi Profil</span>
                        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                        <p><strong>Level:</strong> <?php echo $user['pengguna_hak_akses']; ?></p>
                    </div>
                    <div class="card-action">
                        <a href="<?php echo site_url('profile/edit'); ?>" class="btn blue">Ubah Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menyertakan Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

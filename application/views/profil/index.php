<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
</head>
<body>
    <h1>Profil Saya</h1>
    <p>Username: <?php echo $user['username']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Level: <?php echo $user['level']; ?></p>
    <a href="<?php echo site_url('profile/edit'); ?>">Ubah Profil</a>
</body>
</html>

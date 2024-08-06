<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .notification-list {
            margin: 0;
            padding: 0;
        }
        .notification-item {
            margin: 10px 0;
        }
        .notification-text {
            margin: 0;
        }
        .no-notifications {
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>

        <?php if (!empty($notifikasi)): ?>
            <ul class="notification-list">
                <?php foreach ($notifikasi as $notif): ?>
                    <li class="notification-item card-panel">
                        <div class="row">
                            <div class="col s9">
                                <p class="notification-text"><?php echo $notif['pesan']; ?></p>
                            </div>
                            <div class="col s3 right-align">
                                <a class="btn blue lighten-1 waves-effect waves-light" href="<?php echo base_url('notifikasi/tandai_dibaca/' . $notif['id']); ?>">Tandai dibaca</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="no-notifications">Tidak ada notifikasi baru.</p>
        <?php endif; ?>
    </div>

    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

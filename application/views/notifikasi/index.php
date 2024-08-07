<!DOCTYPE html>
<html lang="id">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Koperasi</title>

    <!-- Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .notification-list {
            list-style-type: none;
            padding: 0;
        }

        .notification-item {
            margin-bottom: 20px;
        }

        .notification-text {
            margin: 0;
            font-size: 1.2em;
            color: #555;
        }

        .no-notifications {
            color: #777;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1><?php echo $title; ?></h1>

        <?php if (!empty($notifikasi)): ?>
            <ul class="notification-list">
                <?php foreach ($notifikasi as $notif): ?>
                    <li class="notification-item">
                        <div class="card">
                            <div class="card-content">
                                <p class="notification-text">
                                    <i class="material-icons left">notifications</i> 
                                    <?php echo $notif['pesan']; ?>
                                </p>
                            </div>
                            <div class="card-action right-align">
                                <a class="btn blue waves-effect waves-light" href="<?php echo base_url('notifikasi/tandai_dibaca/' . $notif['id']); ?>">
                                    Tandai dibaca
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="no-notifications">Tidak ada notifikasi baru.</p>
        <?php endif; ?>
    </div>

    <!-- Import Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>

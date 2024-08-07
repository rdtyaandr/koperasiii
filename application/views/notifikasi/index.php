<!DOCTYPE html>
<html>
<head>
    <title><?= $title?></title>
        <style>
        .notification-item {
            border-bottom: 1px solid #ddd;
            padding: 15px;
        }
        .notification-item:last-child {
            border-bottom: none;
        }
        .notification-header {
            font-weight: bold;
        }
        .notification-status {
            color: #ff5722; /* Orange color for unread status */
        }
    </style>
</head>
<body>
    <div class="container">
        <h5 class="center-align">Notifikasi</h5>
        <ul class="collection">
            <?php if (!empty($notifikasi)): ?>
                <?php foreach ($notifikasi as $notif): ?>
                    <li class="collection-item notification-item">
                        <div class="notification-header">
                            <span><?php echo htmlspecialchars($notif['pesan']); ?></span>
                            <span class="notification-status"><?php echo $notif['status'] == 'belum_dibaca' ? 'Belum Dibaca' : 'Dibaca'; ?></span>
                        </div>
                        <p><?php echo htmlspecialchars($notif['dibuat_pada']); ?></p>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="collection-item">Tidak ada notifikasi.</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>

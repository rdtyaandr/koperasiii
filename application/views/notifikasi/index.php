<!DOCTYPE html>
<html>
<body>
    <h1>Notifications</h1>
    <?php if (!empty($notifications)): ?>
        <ul>
            <?php foreach ($notifications as $notification): ?>
                <li>
                    <?php echo $notification->message; ?>
                    <a href="<?= site_url('notifi/mark_as_read/'.$notification->id); ?>">Mark as read</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No new notifications.</p>
    <?php endif; ?>
</body>
</html>

<div class="container">
    <h4>Notifikasi</h4>
    <ul class="collection">
        <?php foreach ($notifikasi as $item): ?>
            <li class="collection-item <?php echo $item['dibaca'] ? '' : 'unread'; ?>">
                <span><?php echo $item['pesan']; ?></span>
                <br><small><?php echo $item['waktu_dibuat']; ?></small>
                <?php if (!$item['dibaca']): ?>
                    <a href="<?php echo base_url('notifikasi/tandai_dibaca/' . $item['id']); ?>" class="secondary-content">
                        Tandai sebagai dibaca
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

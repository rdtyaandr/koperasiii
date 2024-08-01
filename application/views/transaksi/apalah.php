<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Dropdown</title>
</head>

<body>
    <div class="dropdown" style="margin-bottom: 14px;">
        <button class="dropdown-trigger">
            <span class="dropdown-text">Pilih Nama Barang</span>
            <span class="arrow-down">&#9660;</span>
        </button>
        <ul class="dropdown-menu">
            <?php foreach ($barang as $b) : ?>
                <li class="dropdown-item" data-harga="<?= $b['harga_jual']; ?>">
                    <?= htmlspecialchars($b['nama_barang']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    
    <div class="dropdown" style="margin-bottom: 14px;">
        <button class="dropdown-trigger">
            <span class="dropdown-text">Pilih Nama Barang</span>
            <span class="arrow-down">&#9660;</span>
        </button>
        <ul class="dropdown-menu">
            <?php foreach ($barang as $b) : ?>
                <li class="dropdown-item" data-harga="<?= $b['harga_jual']; ?>">
                    <?= htmlspecialchars($b['nama_barang']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>
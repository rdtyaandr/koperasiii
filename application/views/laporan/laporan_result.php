<?php if (isset($hasil_laporan) && !empty($hasil_laporan)) : ?>
    <h5 class="center-align">Hasil Laporan</h5>
    <ul class="collection">
        <?php foreach ($hasil_laporan as $laporan) : ?>
            <li class="collection-item">
                <strong>Tanggal:</strong> <?= $laporan['created_at']; ?><br>
                <strong>Barang:</strong> <?= $laporan['nama_barang']; ?><br>
                <strong>Total:</strong> <?= $laporan['total']; ?><br>
                <strong>Harga Jual:</strong> <?= $laporan['harga_jual']; ?><br>
                <!-- Tambahkan perhitungan laba atau rugi sesuai logika -->
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p class="center-align">Tidak ada laporan untuk bulan dan tahun yang dipilih.</p>
<?php endif; ?>

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Data Barang</h4>
                        </div>
                        <div class="col s12 left-align">
                            <a href="<?= base_url('barang/tambah') ?>" class="btn waves-effect waves-light green darken-1" style="border-radius: 8px;">
                                <i class="material-icons left">add</i>Tambah Barang
                            </a>
                            <a href="<?= base_url('kategori') ?>" class="btn waves-effect waves-light blue darken-1" style="border-radius: 8px;">
                                <i class="material-icons left">arrow_forward</i>Kategori
                            </a>
                            <a href="<?= base_url('satuan') ?>" class="btn waves-effect waves-light orange darken-1" style="border-radius: 8px;">
                                <i class="material-icons left">arrow_forward</i>Satuan
                            </a>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table mt">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($barang)) : ?>
                                <?php foreach (array_reverse($barang) as $key => $item) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><img src="<?= site_url('barang/barcode/'.$item['kode_barang']); ?>" alt="Barcode"></td>
                                        <td>
                                            <?php
                                            $kategoriNama = '';
                                            foreach ($kategori as $kat) {
                                                if ($kat['id_kategori'] == $item['id_kategori']) {
                                                    $kategoriNama = $kat['nama_kategori'];
                                                    break;
                                                }
                                            }
                                            echo $kategoriNama;
                                            ?>
                                        </td>
                                        <td><?= htmlspecialchars($item['nama_barang']); ?></td>
                                        <td><?= htmlspecialchars($item['stok']); ?></td>
                                        <td>
                                            <?php
                                            $satuanNama = '';
                                            foreach ($satuan as $sat) {
                                                if ($sat['id_satuan'] == $item['id_satuan']) {
                                                    $satuanNama = $sat['nama_satuan'];
                                                    break;
                                                }
                                            }
                                            echo $satuanNama;
                                            ?>
                                        </td>
                                        <td>Rp. <?= number_format($item['harga_beli'], 0, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($item['harga_jual'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="<?= base_url('barang/ubah/' . $item['id_barang']) ?>" class="btn yellow darken-2 waves-effect waves-light" style="border-radius: 8px;">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="<?= base_url('barang/hapus/' . $item['id_barang']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" class="btn red darken-2 waves-effect waves-light" style="border-radius: 8px;">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9" class="center-align">Tidak ada data barang yang tersedia.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
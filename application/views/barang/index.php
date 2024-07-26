<div class="container">
    <div class="card z-depth-3">
        <div class="card-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="blue-text text-darken-2">Data Barang</h4>
                </div>
                <div class="col s12">
                    <a href="<?= base_url('barang/tambah') ?>" class="btn waves-effect waves-light green darken-1">
                        <i class="material-icons left">add</i>Tambah Barang
                    </a>
                </div>
            </div>
            <table class="striped highlight responsive-table mt-20">
                <thead class="blue darken-2 white-text">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Detail</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Barcode</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($barang)) : ?>
                        <?php foreach ($barang as $key => $item) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $item['kategori'] ?></td>
                                <td><?= $item['nama_barang'] ?></td>
                                <td><?= $item['detail_barang'] ?></td>
                                <td><?= $item['satuan'] ?></td>
                                <td><?= $item['stok'] ?></td>
                                <td><?= number_format($item['harga_beli'], 0, ',', '.') ?></td>
                                <td><?= number_format($item['harga_jual'], 0, ',', '.') ?></td>
                                <td><?= $item['kode_barang'] ?></td>
                                <td>
                                    <a href="<?= base_url('barang/ubah/' . $item['id_barang']) ?>" class="btn-small waves-effect waves-light yellow darken-3 tooltipped" data-position="top" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                                    <a href="<?= base_url('barang/hapus/' . $item['id_barang']) ?>" class="btn-small waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')"><i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="10" class="center-align">Tidak ada data barang.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-action right-align">
            <p class="grey-text text-darken-1">Total Barang: <strong><?= count($barang) ?></strong></p>
        </div>
    </div>
</div>

<!-- Native CSS for additional styling -->
<style>
    .container {
        margin-top: 30px;
    }

    .card {
        margin-top: 20px;
        border-radius: 8px;
    }

    .card-content {
        padding-bottom: 0;
    }

    table {
        margin-bottom: 0;
    }

    .card-action {
        padding: 10px 24px;
    }

    .tooltipped {
        position: relative;
    }

    .mt-20 {
        margin-top: 20px;
    }
</style>
<style>
    .container {
        margin-top: 30px;
    }

    .card {
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-content {
        padding-bottom: 0;
    }

    .input-field {
        margin-bottom: 20px;
    }

    table {
        margin-top: 20px;
        border-radius: 8px;
        overflow: hidden;
    }

    table thead {
        background-color: #1e88e5;
    }

    table tbody tr {
        border-bottom: 1px solid #ddd;
    }

    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .card-action {
        padding: 10px 24px;
    }

    .tooltipped {
        position: relative;
    }

    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }

    .btn-small {
        border-radius: 4px;
    }
</style>

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Data Transaksi</h4>
                        </div>
                        <div class="col s12">
                            <a href="<?= base_url('transaksi/tambah') ?>" class="btn waves-effect waves-light green darken-1">
                                <i class="material-icons left">add</i>Tambah Transaksi
                            </a>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table mt-20">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Cara Bayar</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($transaksi)) : ?>
                                <?php $no = 1;
                                foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($t->username) ?></td>
                                        <td><?= htmlspecialchars($t->cara_bayar) ?></td>
                                        <td><?= htmlspecialchars($t->created_at) ?></td>
                                        <td>
                                            <a href="<?= base_url('transaksi/ubah/' . $t->id_transaksi) ?>" class="btn-small white-text waves-effect waves-light yellow darken-3 tooltipped" data-position="top" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="center-align">Tidak ada data transaksi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Transaksi: <strong><?= count($transaksi) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
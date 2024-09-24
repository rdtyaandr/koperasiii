<style>
    .card {
        border-radius: 20px;
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

    .card-action {
        padding: 10px 24px;
    }

    .tooltipped {
        position: relative;
    }

    .btn {
        border-radius: 8px;
    }

    .btn-floating {
        border-radius: 100px !important;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        color: white;
        font-size: 0.9em;
        text-align: center;
    }

    /* Warna yang disesuaikan untuk status-badge */
    .status-badge.red {
        background-color: #e57373;
        /* Merah terang */
    }

    .status-badge.green {
        background-color: #81c784;
        /* Hijau terang */
    }

    .status-badge.default {
        background-color: #bdbdbd;
        /* Abu-abu terang */
    }
</style>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2"
                                style="font-size: 2em; text-align: center; font-weight: bold;">Transaksi</h4>
                        </div>
                        <div class="col s12">
                            <a href="<?= base_url('transaksi/tambah') ?>"
                                class="btn waves-effect waves-light green darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">add</i>Tambah Transaksi
                            </a>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Nama</th>
                                <th class="center-align">Cara Bayar</th>
                                <th class="center-align">Tanggal</th>
                                <th class="center-align">Total Harga</th>
                                <th class="center-align">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($transaksi)): ?>
                                <?php $no = 1;
                                foreach (array_reverse($transaksi) as $t): ?>
                                    <tr>
                                        <td class="center-align"><?= $no++ ?></td>
                                        <td class="center-align"><?= htmlspecialchars($t->username) ?></td>
                                        <td class="center-align">
                                            <?php
                                            // Tentukan kelas badge berdasarkan nilai cara bayar
                                            $badgeClass = ($t->cara_bayar === 'Kredit') ? 'red' :
                                                ($t->cara_bayar === 'Cash' ? 'green' : 'default');
                                            ?>
                                            <div class="status-badge <?= $badgeClass ?>">
                                                <?= htmlspecialchars($t->cara_bayar) ?>
                                            </div>
                                        </td>
                                        <td class="center-align"><?= formatTanggalWaktu($t->created_at) ?></td>
                                        <td class="center-align"><?= htmlspecialchars(number_format($t->total_harga, 0, ',', '.')) ?></td>
                                        <td class="center-align">
                                            <a href="<?= base_url('transaksi/ubah/' . $t->id_transaksi) ?>"
                                                class="btn-floating white-text waves-effect waves-light yellow darken-3 tooltipped"
                                                data-position="top" data-tooltip="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="center-align">Tidak ada data transaksi.</td>
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
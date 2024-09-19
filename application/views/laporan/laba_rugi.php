<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ; ?></title>

</head>

<body>
    <div class="container">
        <h4 class="center-align">Laporan</h4>

        <!-- Form Filter Bulan dan Tahun -->
        <div class="card">
            <div class="card-content">
                <form method="get" action="<?= base_url('laporan'); ?>">
                    <div class="row">
                        <div class="input-field col s12 m4">
                            <select id="month" name="month" class="browser-default">
                                <option value="" disabled selected>Pilih Bulan</option>
                                <?php for ($m = 1; $m <= 12; $m++): ?>
                                    <option value="<?= str_pad($m, 2, '0', STR_PAD_LEFT); ?>">
                                        <?= date("F", mktime(0, 0, 0, $m, 1)); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="input-field col s12 m4">
                            <select id="year" name="year" class="browser-default">
                                <option value="" disabled selected>Pilih Tahun</option>
                                <?php for ($y = date('Y'); $y >= 2000; $y--): ?>
                                    <option value="<?= $y; ?>"><?= $y; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="input-field col s12 m4">
                            <select id="report_type" name="report_type" class="browser-default">
                                <option value="potensi_laba" selected>Potensi Laba</option>
                                <option value="laba_rugi">Laba Rugi</option>
                            </select>
                        </div>
                        <div class="col s12 center-align">
                            <button type="submit" class="btn waves-effect waves-light blue lighten-2 rounded-btn">
                                Generate
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- Tabel Hasil Laporan -->
        <div class="card mt">
            <div class="card-content">
                <table class="highlight centered responsive-table">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                         
                            <th><?= $this->input->get('report_type') == 'potensi_laba' ? 'Potensi Laba' : 'Laba Untung'; ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($laporan)): ?>
                            <?php foreach ($laporan as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                                    <td><?= number_format($row['harga_beli'], 2, ',', '.'); ?></td>
                                    <td><?= number_format($row['harga_jual'], 2, ',', '.'); ?></td>
                                   
                                    <td>
                                        <?php
                                        $report_type = $this->input->get('report_type');
                                        if ($report_type && isset($row[$report_type])) {
                                            echo number_format($row[$report_type], 2, ',', '.');
                                        } else {
                                            echo 'N/A';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="center-align">Tidak ada data untuk periode ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            M.AutoInit();
        });
    </script>
</body>

</html>
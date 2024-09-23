<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Laporan</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="card" style="border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                                <div class="card-content" style="padding: 20px;">
                                    <div class="row">
                                        <div class="input-field col s12 m2">
                                            <select id="tahun" name="tahun" class="browser-default" style="border-radius: 8px;">
                                                <option value="" disabled <?= empty($_GET['tahun']) ? 'selected' : '' ?>>Pilih Tahun</option>
                                                <?php
                                                $currentYear = date('Y');
                                                for ($y = $currentYear; $y >= 1960; $y--): ?>
                                                    <option value="<?= $y; ?>" <?= isset($_GET['tahun']) && $_GET['tahun'] == $y ? 'selected' : ($y == $currentYear ? 'selected' : ''); ?>><?= $y; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="bulan" name="bulan" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['bulan']) ? 'selected' : '' ?> style="color: gray;">Pilih Bulan (opsional)</option>
                                                <?php
                                                $bulan = [
                                                    '01' => 'Januari',
                                                    '02' => 'Februari',
                                                    '03' => 'Maret',
                                                    '04' => 'April',
                                                    '05' => 'Mei',
                                                    '06' => 'Juni',
                                                    '07' => 'Juli',
                                                    '08' => 'Agustus',
                                                    '09' => 'September',
                                                    '10' => 'Oktober',
                                                    '11' => 'November',
                                                    '12' => 'Desember'
                                                ];
                                                foreach ($bulan as $num => $name): ?>
                                                    <option value="<?= $num; ?>" <?= isset($_GET['bulan']) && $_GET['bulan'] == $num ? 'selected' : ''; ?>><?= $name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="tanggal" name="tanggal" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['tanggal']) ? 'selected' : '' ?> style="color: gray;">Pilih Tanggal (opsional)</option>
                                                <?php for ($d = 1; $d <= 31; $d++): ?>
                                                    <option value="<?= str_pad($d, 2, '0', STR_PAD_LEFT); ?>" <?= isset($_GET['tanggal']) && $_GET['tanggal'] == str_pad($d, 2, '0', STR_PAD_LEFT) ? 'selected' : ''; ?>><?= $d; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="sampai_tanggal" name="sampai_tanggal" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['sampai_tanggal']) ? 'selected' : '' ?> style="color: gray;">Sampai Tanggal (opsional)</option>
                                                <?php for ($d = 1; $d <= 31; $d++): ?>
                                                    <option value="<?= str_pad($d, 2, '0', STR_PAD_LEFT); ?>" <?= isset($_GET['sampai_tanggal']) && $_GET['sampai_tanggal'] == str_pad($d, 2, '0', STR_PAD_LEFT) ? 'selected' : ''; ?>><?= $d; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="cara_bayar" name="cara_bayar" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['cara_bayar']) ? 'selected' : '' ?> style="color: gray;">Pilih Cara Bayar (opsional)</option>
                                                <option value="Cash" <?= isset($_GET['cara_bayar']) && $_GET['cara_bayar'] == 'Cash' ? 'selected' : ''; ?>>Cash</option>
                                                <option value="Kredit" <?= isset($_GET['cara_bayar']) && $_GET['cara_bayar'] == 'Kredit' ? 'selected' : ''; ?>>Kredit</option>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2" style="margin-top: 20px;">
                                            <button id="buat-sekarang" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px;">Buat Sekarang</button>
                                            <a href="<?= base_url('laporan'); ?>" class="btn-floating red">
                                                <i class="large material-icons">refresh</i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="download-buttons" class="row" style="display: none;">
                                        <div class="col s12 center-align">
                                            <a class="btn waves-effect waves-light blue tooltipped" data-position="top" data-tooltip="Download PNG" id="download-png" style="border-radius: 25px;">
                                                <i class="material-icons left">image</i>Download PNG
                                            </a>
                                            <a class="btn waves-effect waves-light green tooltipped" data-position="top" data-tooltip="Download XLSX" href="<?= base_url('laporan/download/xlsx'); ?>" style="border-radius: 25px;">
                                                <i class="material-icons left">grid_on</i>Download XLSX
                                            </a>
                                            <a class="btn waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Download PDF" href="<?= base_url('laporan/download/pdf'); ?>" style="border-radius: 25px;">
                                                <i class="material-icons left">picture_as_pdf</i>Download PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="area-download" id="area-download">
                        <table class="striped highlight responsive-table mt" style="border-radius: 8px; overflow: hidden;">
                            <thead class="blue darken-2 white-text">
                                <tr>
                                    <th class="center-align">No</th>
                                    <th class="center-align">Nama Barang</th>
                                    <th class="center-align">Harga Beli</th>
                                    <th class="center-align">Harga Jual</th>
                                    <th class="center-align">Jumlah</th>
                                    <th class="center-align">Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPendapatan = 0;
                                if (!empty($laporan)): ?>
                                    <?php foreach ($laporan as $key => $laporanItem):
                                        $totalPendapatan += $laporanItem['total_pendapatan'];
                                    ?>
                                        <tr>
                                            <td class="center-align"><?= $key + 1 ?></td>
                                            <td class="center-align"><?= htmlspecialchars($laporanItem['nama_barang'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td class="center-align"><?= number_format($laporanItem['harga_beli'], 0, ',', '.') ?></td>
                                            <td class="center-align"><?= number_format($laporanItem['harga_jual'], 0, ',', '.') ?></td>
                                            <td class="center-align"><?= number_format($laporanItem['jumlah'], 0, ',', '.') ?></td>
                                            <td class="center-align"><?= number_format($laporanItem['total_pendapatan'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <script>
                                        document.getElementById('download-buttons').style.display = 'block';
                                    </script>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="center-align">Tidak ada data laporan yang dibuat.</td>
                                    </tr>
                                    <script>
                                        document.getElementById('download-buttons').style.display = 'none';
                                    </script>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <p class="blue-text text-darken-2 right-align" style="font-size: 1.11em; font-weight: bold; margin-top: 15px; margin-right: 10px;">Total Pendapatan: <strong><?= number_format($totalPendapatan, 0, ',', '.') ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Native CSS for additional styling -->
<style>
    .card-content {
        padding-bottom: 0;
    }

    .input-field {
        margin-bottom: 20px;
    }

    .input-field label {
        color: #9e9e9e;
    }

    .input-field input:focus+label {
        color: #1e88e5 !important;
    }

    .input-field input:focus {
        border-bottom: 1px solid #1e88e5 !important;
        box-shadow: 0 1px 0 0 #1e88e5 !important;
    }

    .btn-floating {
        border-radius: 100px !important;
    }

    .tooltipped {
        position: relative;
    }

    .mt {
        margin-top: 15px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .right-align {
        text-align: right;
    }

    .center-align {
        text-align: center;
    }

    .btn-floating[disabled] {
        pointer-events: none;
        background-color: #d6d6d6 !important;
        color: #9e9e9e !important;
        cursor: not-allowed;
    }

    .btn-floating[disabled] i.material-icons {
        color: #9e9e9e !important;
    }

    .status-cell {
        padding: 5px !important;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        color: white;
        font-size: 0.9em;
        text-align: center;
    }

    .status-badge.grey.lighten-2 {
        background-color: #d6d6d6;
    }

    .status-badge.blue.lighten-2 {
        background-color: #64b5f6;
    }

    .status-badge.green.lighten-2 {
        background-color: #81c784;
    }

    .status-badge.red.lighten-2 {
        background-color: #e57373;
    }

    table tbody tr {
        border-bottom: 1px solid #ddd;
    }
</style>

<!-- JavaScript for initializing Materialize components -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });

    document.getElementById('buat-sekarang').addEventListener('click', function() {
        const year = document.getElementById('tahun').value;
        const month = document.getElementById('bulan').value;
        const day = document.getElementById('tanggal').value;
        const endDay = document.getElementById('sampai_tanggal').value;
        const paymentMethod = document.getElementById('cara_bayar').value;

        if (!year) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tahun harus dipilih!',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true
            });
            return;
        }

        if (day && endDay && parseInt(endDay) < parseInt(day)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal akhir tidak boleh sebelum tanggal mulai!',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true
            });
            return;
        }

        const params = new URLSearchParams({
            tahun: year,
            bulan: month,
            tanggal: day,
            sampai_tanggal: endDay,
            cara_bayar: paymentMethod
        });

        window.location.href = `<?= base_url('laporan') ?>?${params.toString()}`;
    });

    document.getElementById('download-png').addEventListener('click', function() {
        html2canvas(document.getElementById('area-download'), {
            onclone: function(clonedDoc) {
                clonedDoc.getElementById('area-download').style.padding = '20px';
            }
        }).then(function(canvas) {
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            const now = new Date();
            const formattedDate = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}_${String(now.getHours()).padStart(2, '0')}-${String(now.getMinutes()).padStart(2, '0')}-${String(now.getSeconds()).padStart(2, '0')}`;
            link.download = `laporan_${formattedDate}.png`;
            link.click();
        });
    });
</script>
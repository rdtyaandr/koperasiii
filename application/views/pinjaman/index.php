<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2"
                                style="font-size: 2em; text-align: center; font-weight: bold;">Data Pinjaman</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <a href="<?= base_url('pinjaman/tambah') ?>"
                                class="btn waves-effect waves-light green darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">add</i>Tambah Pinjaman
                            </a>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table mt" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <?php if ($this->session->userdata('level') == 'admin'): ?>
                                    <th class="center-align">Username</th>
                                <?php endif; ?>
                                <th class="center-align">Jenis Pinjaman</th>
                                <th class="center-align">Tanggal Pinjaman</th>
                                <th class="center-align">Jumlah Pinjaman</th>
                                <th class="center-align">Lama Pinjaman</th>
                                <th class="center-align">Status</th>
                                <?php if ($this->session->userdata('level') == 'admin'): ?>
                                    <th class="center-align">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pengajuan)): ?>
                                <?php foreach (array_reverse($pengajuan) as $key => $pinjaman): ?>
                                    <tr id="row-<?= $pinjaman['id'] ?>">
                                        <td class="center-align"><?= $key + 1 ?></td>
                                        <?php if ($this->session->userdata('level') == 'admin'): ?>
                                            <td class="center-align"><?= htmlspecialchars($pinjaman['username'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <?php endif; ?>
                                        <td class="center-align"><?= htmlspecialchars($pinjaman['jenis_pinjaman'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="center-align"><?= formatTanggal($pinjaman['tanggal_pinjam']) ?></td>
                                        <td class="center-align"><?= number_format($pinjaman['jumlah_pinjaman'], 0, ',', '.') ?></td>
                                        <td class="center-align"><?= htmlspecialchars($pinjaman['lama_pinjaman'], ENT_QUOTES, 'UTF-8') ?> bulan</td>
                                        <td id="status-<?= $pinjaman['id'] ?>" class="status-cell center-align">
                                            <?php
                                            $status = isset($pinjaman['status']) ? htmlspecialchars($pinjaman['status'], ENT_QUOTES, 'UTF-8') : 'Tidak Diketahui';
                                            $statusClass = '';
                                            switch ($status) {
                                                case 'Telah Disetujui oleh Admin':
                                                    $statusClass = 'green white-text';
                                                    break;
                                                case 'Dibatalkan oleh Admin':
                                                    $statusClass = 'red white-text';
                                                    break;
                                                default:
                                                    $statusClass = 'orange white-text';
                                            }
                                            ?>
                                            <span class="status-badge <?= $statusClass ?>"><?= $status ?></span>
                                        </td>
                                        <?php if ($this->session->userdata('level') == 'admin'): ?>
                                            <td class="center-align">
                                                <a href="<?= base_url('pinjaman/approve/' . $pinjaman['id']) ?>"
                                                    class="btn-floating waves-effect waves-light green tooltipped"
                                                    data-position="top" data-tooltip="Setujui" <?= $pinjaman['status'] === 'Telah Disetujui oleh Admin' ? 'disabled' : '' ?>>
                                                    <i class="material-icons">check</i>
                                                </a>
                                                <a href="<?= base_url('pinjaman/cancel/' . $pinjaman['id']) ?>"
                                                    class="btn-floating waves-effect waves-light orange tooltipped"
                                                    data-position="top" data-tooltip="Batalkan" <?= $pinjaman['status'] === 'Dibatalkan oleh Admin' ? 'disabled' : '' ?>>
                                                    <i class="material-icons">clear</i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="<?= $this->session->userdata('level') == 'admin' ? '8' : '7' ?>"
                                        class="center-align">Tidak ada data pinjaman.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Pengajuan: <strong><?= count($pengajuan) ?></strong></p>
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

    .btn {
        border-radius: 8px;
        margin: 5px 0;
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

    /* Styling untuk tombol disabled */
    .btn-floating[disabled] {
        pointer-events: none;
        background-color: #d6d6d6 !important;
        /* Abu-abu terang */
        color: #9e9e9e !important;
        cursor: not-allowed;
        /* Menunjukkan bahwa tombol tidak dapat diklik */
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

    /* Badge warna untuk status */
    .status-badge.grey.lighten-2 {
        background-color: #d6d6d6;
        /* Abu-abu terang */
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit(); // Initialize Materialize components
    });

    document.getElementById('search').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('tbody tr');
        let rowFound = false;

        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
                rowFound = true;
            } else {
                row.style.display = 'none';
            }
        });

        const noDataMessage = document.getElementById('no-data');
        if (!rowFound) {
            noDataMessage.style.display = 'block';
        } else {
            noDataMessage.style.display = 'none';
        }
    });

    const alert = document.querySelector('.card-panel.green.lighten-4.green-text.text-darken-4');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500); // matches the transition duration
        }, 3000); // 3 seconds
    }
</script>
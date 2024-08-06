<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <span class="card-title blue-text" style="font-size: 2em;"><?= $title ?></span>
                    <p id="current-datetime" class="right" style="font-size: 1.2em; font-weight: bold; color: #FFFFFF; background-color: #00796B; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); text-align: center;"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="card-panel green lighten-4 green-text text-darken-4">
                <?= $this->session->flashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('alert') === 'error-login') : ?>
            <div id="card-alert" class="card red lighten-5 animated slideInDown">
                <div class="card-content red-text" style="padding: 6px !important;">
                </div>
            </div>
        <?php endif; ?>

        <div class="col s12">
            <div class="card z-depth-3">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2">Data Pinjaman</h4>
                        </div>
                        <div class="col s12">
                            <a href="<?= base_url('pinjaman/tambah') ?>" class="btn waves-effect waves-light green darken-1">
                                <i class="material-icons left"></i>Tambah Pinjaman
                            </a>
                            <div class="input-field inline" style="float: right;">
                                <input id="search" type="text" class="validate">
                                <label for="search">Cari</label>
                            </div>
                        </div>
                    </div>

                    <table class="striped highlight responsive-table mt-20">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Jenis Pinjaman</th>
                                <th>Tanggal Pinjaman</th>
                                <th>Jumlah Pinjaman</th>
                                <th>Lama Pinjaman</th>
                                <th>Status</th>
                                <?php if ($this->session->userdata('level') == 'admin') : ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pengajuan)) : ?>
                                <?php foreach ($pengajuan as $key => $pinjaman) : ?>
                                    <tr id="row-<?= $pinjaman['id'] ?>">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= htmlspecialchars($pinjaman['user_id'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($pinjaman['jenis_pinjaman'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= date('d-m-Y', strtotime($pinjaman['tanggal_pinjam'])) ?></td>
                                        <td><?= number_format($pinjaman['jumlah_pinjaman'], 0, ',', '.') ?></td>
                                        <td><?= htmlspecialchars($pinjaman['lama_pinjaman'], ENT_QUOTES, 'UTF-8') ?> bulan</td>
                                        <td id="status-<?= $pinjaman['id'] ?>">
                                            <?= isset($pinjaman['status']) ? htmlspecialchars($pinjaman['status'], ENT_QUOTES, 'UTF-8') : 'Tidak Diketahui' ?>
                                        </td>
                                        <?php if ($this->session->userdata('level') == 'admin') : ?>
                                            <td>
                                                <a href="<?= base_url('pinjaman/approve/' . $pinjaman['id']) ?>" class="btn-small waves-effect waves-light green tooltipped" data-position="top" data-tooltip="Setujui" <?= $pinjaman['status'] === 'Telah Disetujui oleh Admin' ? 'disabled' : '' ?>>
                                                    <i class="material-icons">check_circle</i>
                                                </a>
                                                <a href="<?= base_url('pinjaman/cancel/' . $pinjaman['id']) ?>" class="btn-small waves-effect waves-light orange tooltipped" data-position="top" data-tooltip="Batalkan" <?= $pinjaman['status'] === 'Telah Disetujui oleh Admin' ? '' : 'disabled' ?>>
                                                    <i class="material-icons">cancel</i>
                                                </a>
                                                <a href="<?= base_url('pinjaman/delete/' . $pinjaman['id']) ?>" class="btn-small waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus pinjaman ini?')">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>

                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="<?= $this->session->userdata('level') == 'admin' ? '8' : '7' ?>" class="center-align">Tidak ada data pinjaman.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <p id="no-data" class="center-align" style="display: none; color: black;">Data tidak ditemukan.</p>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Pengajuan: <strong><?= count($pengajuan) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
   

    <script src="<?= base_url('assets/js/plugins/chartist-js/chartist.min.js') ?>"></script>
    <script>
 document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const noDataMessage = document.getElementById('no-data');

    searchInput.addEventListener('keyup', function() {
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

        if (!rowFound) {
            noDataMessage.style.display = 'block';
        } else {
            noDataMessage.style.display = 'none';
        }
    });

    // Update current date and time
    function updateDateTime() {
        var now = new Date();
        var date = now.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        var time = now.toLocaleTimeString('id-ID');
        document.getElementById('current-datetime').textContent = date + ' ' + time;
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();

    // Alert timer
    const alert = document.querySelector('.card-panel.green.lighten-4.green-text.text-darken-4');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500); // matches the transition duration
        }, 1000); // 3 seconds
    }
});

    </script>
    <style>
        /* Menyusun CSS untuk tombol */
        .btn-small {
            font-size: 20px;
            transition: transform 0.3s, color 0.3s;
        }

        /* Tombol hijau */
        .btn-small.green i.material-icons {
            color: white;
        }

        .btn-small.green:hover i.material-icons {
            transform: scale(1.2);
            color: #e8f5e9;
        }

        /* Tombol oranye */
        .btn-small.orange i.material-icons {
            color: white;
        }

        .btn-small.orange:hover i.material-icons {
            transform: scale(1.2);
            color: #fff3e0;
        }

        /* Tombol merah */
        .btn-small.red i.material-icons {
            color: white;
        }

        .btn-small.red:hover i.material-icons {
            transform: scale(1.2);
            color: #ffebee;
        }
    </style>
</div>
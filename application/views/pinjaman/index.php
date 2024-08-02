<div class="container">
    <div class="card z-depth-3">
        <div class="card-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="blue-text text-darken-2">Pengajuan Pinjaman</h4>
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

            <?php if ($this->session->flashdata('message')): ?>
                <div class="card-panel green lighten-4 green-text text-darken-4">
                    <?= $this->session->flashdata('message') ?>
                </div>
            <?php endif; ?>

            <table class="striped highlight responsive-table mt-20">
                <thead class="blue darken-2 white-text">
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Pinjaman</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Lama Pinjaman</th>
                        <th>Status</th>
                        <?php if ($this->session->userdata('level') == 'ketua'): ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pengajuan)): ?>
                        <?php foreach ($pengajuan as $key => $item): ?>
                            <tr id="row-<?= $item['id'] ?>">
                                <td><?= $key + 1 ?></td>
                                <td><?= htmlspecialchars($item['nama_anggota'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($item['jenis_pinjaman'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= date('d-m-Y', strtotime($item['tanggal_pinjam'])) ?></td>
                                <td><?= number_format($item['jumlah_pinjaman'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($item['lama_pinjaman'], ENT_QUOTES, 'UTF-8') ?> bulan</td>
                                <td id="status-<?= $item['id'] ?>">
                                    <?= isset($item['status']) ? htmlspecialchars($item['status'], ENT_QUOTES, 'UTF-8') : 'Tidak Diketahui' ?>
                                </td>
                                <?php if ($this->session->userdata('level') == 'ketua'): ?>
                                    <td>
                                        <a href="<?= base_url('pinjaman/approve/' . $item['id']) ?>"
                                           class="btn-small waves-effect waves-light green tooltipped"
                                           data-position="top" data-tooltip="Setujui"
                                           <?= $item['status'] === 'Telah Disetujui oleh Admin' ? 'disabled' : '' ?>>
                                            <i class="material-icons">check</i>
                                        </a>
                                        <a href="<?= base_url('pinjaman/cancel/' . $item['id']) ?>"
                                           class="btn-small waves-effect waves-light orange tooltipped"
                                           data-position="top" data-tooltip="Batalkan"
                                           <?= $item['status'] === 'Telah Disetujui oleh Admin' ? '' : 'disabled' ?>>
                                            <i class="material-icons">cancel</i>
                                        </a>
                                        <a href="<?= base_url('pinjaman/delete/' . $item['id']) ?>"
                                           class="btn-small waves-effect waves-light red tooltipped"
                                           data-position="top" data-tooltip="Hapus"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus pinjaman ini?')">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="center-align">Tidak ada data pinjaman.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-action right-align">
            <p class="grey-text text-darken-1">Total Pengajuan: <strong><?= count($pengajuan) ?></strong></p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('tbody tr');
                
                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</div>

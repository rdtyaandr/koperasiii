<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2"
                                style="font-size: 2em; text-align: center; font-weight: bold;">Data Pengguna</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 left-align">
                            <a href="<?= base_url('pengguna/tambah') ?>"
                                class="btn waves-effect waves-light green darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">add</i>Pengguna
                            </a>
                            <a href="<?= base_url('limit') ?>"
                                class="btn waves-effect waves-light blue darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">edit</i>Limit
                            </a>
                        </div>
                    </div>
                    <table class="highlight striped responsive-table" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Nama Pengguna</th>
                                <th class="center-align">Email</th>
                                <th class="center-align">Satker</th>
                                <th class="center-align">Role</th>
                                <th class="center-align">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($Pengguna)): ?>
                                <?php foreach (array_reverse($Pengguna) as $key => $hitam): ?>
                                    <tr>
                                        <td class="center-align"><?= $key + 1 ?></td>
                                        <td class="center-align"><?= htmlspecialchars($hitam['username'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="center-align"><?= htmlspecialchars($hitam['email'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="center-align"><?= htmlspecialchars($hitam['satker'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="center-align">
                                            <?php
                                            $role = htmlspecialchars($hitam['pengguna_hak_akses'], ENT_QUOTES, 'UTF-8');
                                            $roleClass = '';

                                            switch ($role) {
                                                case 'user':
                                                    $roleClass = 'grey lighten-1 white-text'; // Abu-abu
                                                    break;
                                                case 'operator':
                                                    $roleClass = 'blue lighten-1 white-text'; // Biru
                                                    break;
                                                case 'admin':
                                                    $roleClass = 'green lighten-1 white-text'; // Hijau
                                                    break;
                                                default:
                                                    $roleClass = 'grey lighten-3 black-text'; // Default (misalnya putih dengan teks hitam)
                                            }
                                            ?>
                                            <span class="role-badge <?= $roleClass ?>"><?= $role ?></span>
                                        </td>
                                        <td class="center-align">
                                            <a href="<?= base_url('pengguna/ubah/' . $hitam['pengguna_id']) ?>"
                                                class="btn-floating waves-effect waves-light yellow darken-3 tooltipped"
                                                data-position="top" data-tooltip="Edit" style="border-radius: 4px;">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" class="btn-floating waves-effect waves-darken white-text red tooltipped"
                                                data-position="top" data-tooltip="Hapus" style="border-radius: 4px;" onclick="event.preventDefault(); Swal.fire({
                                                title: 'Apakah Anda yakin?',
                                                text: 'Anda tidak akan dapat mengembalikan ini!',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, hapus!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '<?= base_url('pengguna/hapus/' . $hitam['pengguna_id']) ?>';
                                                }
                                            })">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="center-align">Tidak ada Pengguna yang Terdaftar.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Pengguna: <strong><?= count($Pengguna) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card-content {
        padding-bottom: 0;
    }

    .card-title {
        font-size: 2em;
        text-align: center;
        font-weight: bold;
    }

    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }

    .btn-floating {
        border-radius: 100px !important;
    }

    .highlight {
        margin-top: 15px;
    }

    .right-align {
        text-align: right;
    }

    .center-align {
        text-align: center;
    }

    .tooltipped {
        position: relative;
    }

    .mt {
        margin-top: 15px;
    }

    .card-panel {
        padding: 6px !important;
    }

    .card.red.lighten-5 {
        background-color: #fbe9e7;
        color: #c62828;
    }

    /* Warna untuk role 'user' (abu-abu terang) */
    .grey.lighten-2 {
        background-color: #d6d6d6 !important;
        /* Abu-abu terang */
        color: #ffffff !important;
        /* Teks putih */
    }

    /* Warna untuk role 'operator' (biru terang) */
    .blue.lighten-2 {
        background-color: #64b5f6 !important;
        /* Biru terang */
        color: #ffffff !important;
        /* Teks putih */
    }

    /* Warna untuk role 'admin' (hijau terang) */
    .green.lighten-2 {
        background-color: #81c784 !important;
        /* Hijau terang */
        color: #ffffff !important;
        /* Teks putih */
    }

    /* Warna default untuk role yang tidak dikenali */
    .grey.lighten-4 {
        background-color: #f5f5f5 !important;
        /* Abu-abu sangat terang */
        color: #000000 !important;
        /* Teks hitam */
    }

    /* Style umum untuk badge role */
    .role-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 0.9em;
        text-align: center;
    }

    .limit-not-user {
        color: #b0bec5;
        /* Warna teks abu-abu pudar */
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        transform: skew(-6deg);
        /* Miringkan teks ke kanan */
        font-style: italic;
        /* Miringkan teks */
    }

    table tbody tr {
        border-bottom: 1px solid #ddd;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
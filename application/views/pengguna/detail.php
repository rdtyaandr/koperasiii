<style>
    .container {
        max-width: 1200px;
        margin-top: 15px;
        font-family: 'Roboto', sans-serif;
    }

    .card {
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .card-title {
        font-size: 2em;
        font-weight: 700;
        margin-bottom: 20px;
        color: #1975d1;
        text-align: center;
        border-bottom: 2px solid #eaeff3;
        padding-bottom: 15px;
    }

    .profile-photo {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 15px;
    }

    .profile-photo img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .profile-photo:hover img {
        transform: scale(1.05);
    }

    .profile-details {
        text-align: center;
    }

    .profile-details .name {
        font-size: 1.6em;
        font-weight: 600;
        color: #2c3e50;
    }

    .profile-details .username {
        font-size: 1.2em;
        color: #7f8c8d;
        margin-top: 8px;
    }

    .profile-details .email,
    .profile-details .limit {
        font-size: 1.2em;
        color: #7f8c8d;
        margin-top: 4px;
    }

    .card-button {
        display: inline-block;
        background-color: #3498db;
        color: #fff;
        font-size: 1em;
        font-weight: 500;
        padding: 12px 20px;
        border-radius: 25px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
        margin-bottom: 20px;
        /* Tambahkan margin atas untuk menghindari keluar dari kotak */
    }

    .card-button:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card-button:active {
        background-color: #1f6db2;
    }

    .custom-tabs {
        display: flex;
        border-bottom: 2px solid #eaeff3;
        margin-bottom: 20px;
    }

    .custom-tab {
        flex: 1;
        text-align: center;
        padding: 10px 0;
        cursor: pointer;
    }

    .custom-tab.active {
        background-color: #1975d1;
        color: #fff;
        border-radius: 20px 20px 0 0;
    }

    .custom-tab-content {
        display: none;
    }

    .custom-tab-content.active {
        display: block;
    }

    table.highlight tbody tr:hover {
        background-color: #f5f5f5;
    }

    table.responsive-table th,
    table.responsive-table td {
        padding: 15px;
        text-align: left;
    }

    .material-icons {
        vertical-align: middle;
        margin-right: 5px;
    }
</style>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 30px;">
                <div class="custom-tabs">
                    <div class="custom-tab" data-tab="detail-pengguna">Detail Pengguna</div>
                    <?php if ($Pengguna['pengguna_hak_akses'] == 'user'): ?>
                        <div class="custom-tab" data-tab="detail-transaksi">Detail Transaksi</div>
                        <?php if ($this->session->userdata('level') != 'operator'): ?>
                            <div class="custom-tab" data-tab="detail-pinjaman">Detail Pinjaman</div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div id="detail-pengguna" class="custom-tab-content" style="padding: 20px; background-color: #f9f9f9; border-radius: 10px;">
                    <div class="profile-photo" style="text-align: center; margin-top: 10px; margin-bottom: 20px;">
                        <?php $profile_picture = !empty($Pengguna['profile_picture']) ? $Pengguna['profile_picture'] : 'default.png'; ?>
                        <img src="<?php echo base_url('assets/upload/profile_picture/' . $profile_picture); ?>" alt="Profile Photo" id="profileImage" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="profile-details" style="text-align: center;">
                        <div class="name" style="font-size: 1.5em; font-weight: bold; color: #1975d1;">@<?php echo htmlspecialchars($Pengguna['username']); ?></div>
                        <div class="username" style="font-size: 1.1em; color: #555;"><?php echo htmlspecialchars($Pengguna['nama_lengkap']); ?></div>
                        <div class="email" style="font-size: 1em; color: #777;">Email: <?php echo htmlspecialchars($Pengguna['email']); ?></div>
                        <div class="limit" style="font-size: 1em; color: #777;">Satker: <?php echo htmlspecialchars($Pengguna['satker']); ?></div>
                    </div>
                </div>
                <?php if ($Pengguna['pengguna_hak_akses'] == 'user'): ?>
                    <div id="detail-transaksi" class="custom-tab-content">
                        <!-- Konten untuk Detail Transaksi -->
                        <?php if (!empty($transaksi)): ?>
                            <table class="highlight responsive-table" style="border-collapse: separate; border-spacing: 0 15px;">
                                <thead style="background-color: #f1f1f1; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                    <tr>
                                        <th style="padding: 15px; border-radius: 10px 0 0 10px; color: #1975d1;">Tanggal</th>
                                        <th style="padding: 15px; color: #1975d1;">Total</th>
                                        <th style="padding: 15px; color: #1975d1;">Cara Bayar</th>
                                        <th style="padding: 15px; border-radius: 0 10px 10px 0; color: #1975d1;">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_reverse($transaksi) as $trans): ?>
                                        <tr style="background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                            <td style="padding: 15px; border-radius: 10px 0 0 10px;">
                                                <i class="material-icons" style="vertical-align: middle; color: #1975d1;">event</i>
                                                <?php echo htmlspecialchars(formatTanggalWaktu($trans->created_at)); ?>
                                            </td>
                                            <td style="padding: 15px;">
                                                <i class="material-icons" style="vertical-align: middle; color: #1975d1;">attach_money</i>
                                                <?php echo htmlspecialchars(number_format($trans->total, 0, ',', '.')); ?>
                                            </td>
                                            <td style="padding: 15px;">
                                                <i class="material-icons" style="vertical-align: middle; color: #1975d1;">payment</i>
                                                <?php echo htmlspecialchars($trans->cara_bayar); ?>
                                            </td>
                                            <td style="padding: 15px; border-radius: 0 10px 10px 0;">
                                                <i class="material-icons" style="vertical-align: middle; color: #1975d1;">description</i>
                                                <?php echo !empty($trans->detail) ? htmlspecialchars($trans->detail) : '-'; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p style="text-align: center; color: #777;">Tidak ada catatan transaksi untuk pengguna ini.</p>
                        <?php endif; ?>
                    </div>
                    <?php if ($this->session->userdata('level') != 'operator'): ?>
                        <div id="detail-pinjaman" class="custom-tab-content">
                            <!-- Konten untuk Detail Pinjaman -->
                            <?php if (!empty($pinjaman)): ?>
                                <table class="highlight responsive-table" style="border-collapse: separate; border-spacing: 0 15px;">
                                    <thead style="background-color: #f1f1f1; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                        <tr>
                                            <th style="padding: 15px; border-radius: 10px 0 0 10px; color: #1975d1;">Tanggal Pinjam</th>
                                            <th style="padding: 15px; color: #1975d1;">Jumlah Pinjaman</th>
                                            <th style="padding: 15px; color: #1975d1;">Lama Pinjaman</th>
                                            <th style="padding: 15px; color: #1975d1;">Jenis Pinjaman</th>
                                            <th style="padding: 15px; border-radius: 0 10px 10px 0; color: #1975d1;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pinjaman as $pinjam): ?>
                                            <tr style="background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                                <td style="padding: 15px; border-radius: 10px 0 0 10px;">
                                                    <i class="material-icons" style="vertical-align: middle; color: #1975d1;">event</i>
                                                    <?php echo htmlspecialchars(formatTanggal($pinjam->tanggal_pinjam)); ?>
                                                </td>
                                                <td style="padding: 15px;">
                                                    <i class="material-icons" style="vertical-align: middle; color: #1975d1;">attach_money</i>
                                                    <?php echo htmlspecialchars(number_format($pinjam->jumlah_pinjaman, 0, ',', '.')); ?>
                                                </td>
                                                <td style="padding: 15px;">
                                                    <i class="material-icons" style="vertical-align: middle; color: #1975d1;">schedule</i>
                                                    <?php echo htmlspecialchars($pinjam->lama_pinjaman); ?> bulan
                                                </td>
                                                <td style="padding: 15px;">
                                                    <i class="material-icons" style="vertical-align: middle; color: #1975d1;">category</i>
                                                    <?php echo htmlspecialchars($pinjam->jenis_pinjaman); ?>
                                                </td>
                                                <td style="padding: 15px; border-radius: 0 10px 10px 0;">
                                                    <i class="material-icons" style="vertical-align: middle; color: #1975d1;">info</i>
                                                    <?php echo htmlspecialchars($pinjam->status); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p style="text-align: center; color: #777;">Tidak ada catatan pinjaman untuk pengguna ini.</p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <a href="<?= base_url('pengguna') ?>" class="card-button right" style="background-color: #1975d1; color: #fff; padding: 10px 20px; border-radius: 25px; text-decoration: none; text-align: center; display: inline-block;">Kembali</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('.custom-tab');
        var contents = document.querySelectorAll('.custom-tab-content');

        // Ambil tab yang disimpan dari URL hash atau default ke 'detail-pengguna'
        var activeTab = window.location.hash ? window.location.hash.substring(1) : 'detail-pengguna';

        // Aktifkan tab yang sesuai dengan hash
        document.querySelector('.custom-tab[data-tab="' + activeTab + '"]').classList.add('active');
        document.getElementById(activeTab).classList.add('active');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                var target = this.getAttribute('data-tab');

                tabs.forEach(function(t) {
                    t.classList.remove('active');
                });

                contents.forEach(function(content) {
                    content.classList.remove('active');
                });

                this.classList.add('active');
                document.getElementById(target).classList.add('active');

                // Tambahkan hash ke URL
                window.location.hash = target;
            });
        });

        // Hapus hash dari URL saat keluar dari halaman
        window.addEventListener('beforeunload', function() {
            history.pushState("", document.title, window.location.pathname + window.location.search);
        });
    });
</script>
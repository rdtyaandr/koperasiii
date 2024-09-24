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

    .profile-details .email, .profile-details .limit {
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
        margin-bottom: 20px; /* Tambahkan margin atas untuk menghindari keluar dari kotak */
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
    table.responsive-table th, table.responsive-table td {
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
                    <div class="custom-tab active" data-tab="detail-pengguna">Detail Pengguna</div>
                    <?php if ($Pengguna['pengguna_hak_akses'] == 'user'): ?>
                        <div class="custom-tab" data-tab="detail-transaksi">Detail Transaksi</div>
                        <?php if ($this->session->userdata('level') != 'operator'): ?>
                            <div class="custom-tab" data-tab="detail-pinjaman">Detail Pinjaman</div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div id="detail-pengguna" class="custom-tab-content active">
                    <div class="profile-photo">
                        <?php $profile_picture = !empty($Pengguna['profile_picture']) ? $Pengguna['profile_picture'] : 'default.png'; ?>
                        <img src="<?php echo base_url('assets/upload/profile_picture/' . $profile_picture); ?>" alt="Profile Photo" id="profileImage">
                    </div>
                    <div class="profile-details">
                        <div class="name">@<?php echo htmlspecialchars($Pengguna['username']); ?></div>
                        <div class="username"><?php echo htmlspecialchars($Pengguna['nama_lengkap']); ?></div>
                        <div class="email">Email: <?php echo htmlspecialchars($Pengguna['email']); ?></div>
                        <div class="limit">Satker: <?php echo htmlspecialchars($Pengguna['satker']); ?></div>
                    </div>
                </div>
                <?php if ($Pengguna['pengguna_hak_akses'] == 'user'): ?>
                    <div id="detail-transaksi" class="custom-tab-content">
                        <!-- Konten untuk Detail Transaksi -->
                        <?php if (!empty($transaksi)): ?>
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Cara Bayar</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $trans): ?>
                                        <tr>
                                            <td>
                                                <i class="material-icons">event</i>
                                                <?php echo htmlspecialchars(date('d-m-Y H:i', strtotime($trans->created_at))); ?>
                                            </td>
                                            <td>
                                                <i class="material-icons">attach_money</i>
                                                <?php echo htmlspecialchars(number_format($trans->total, 0, ',', '.')); ?>
                                            </td>
                                            <td>
                                                <i class="material-icons">payment</i>
                                                <?php echo htmlspecialchars($trans->cara_bayar); ?>
                                            </td>
                                            <td>
                                                <i class="material-icons">description</i>
                                                <?php echo htmlspecialchars($trans->detail); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Tidak ada catatan transaksi untuk pengguna ini.</p>
                        <?php endif; ?>
                    </div>
                    <?php if ($this->session->userdata('level') != 'operator'): ?>
                        <div id="detail-pinjaman" class="custom-tab-content">
                            <!-- Konten untuk Detail Pinjaman -->
                            <p>Tidak ada catatan pinjaman untuk pengguna ini.</p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
                <a href="<?= base_url('pengguna') ?>" class="card-button right">Kembali</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('.custom-tab');
        var contents = document.querySelectorAll('.custom-tab-content');

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
            });
        });
    });
</script>
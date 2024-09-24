<div class="container" style="margin-top: 25px;">
    <div class="col s12 m12">
        <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
            <div class="card-content">
                <h4 class="card-title blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Ubah Pengguna</h4>
                <form action="<?= base_url('pengguna/ubah/' . $Pengguna['pengguna_id']) ?>" method="POST">
                    <div class="row margin">
                        <div class="input-field col s12 m6">
                            <i class="mdi-communication-contacts prefix grey-text text-lighten-1"></i>
                            <input id="nama_lengkap" type="text" name="nama_lengkap" value="<?= $Pengguna['nama_lengkap'] ?>" required>
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="mdi-action-verified-user prefix grey-text text-lighten-1"></i>
                            <input type="text" id="username" name="username" value="<?= $Pengguna['username'] ?>" required>
                            <label for="username">Nama Pengguna</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="mdi-content-mail prefix grey-text text-lighten-1"></i>
                            <input type="text" id="email" name="email" value="<?= $Pengguna['email'] ?>" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12 m6" style="position: relative;">
                            <i class="mdi-action-lock-outline prefix grey-text text-lighten-1"></i>
                            <input type="password" id="password" name="password" value="" >
                            <label for="password">Password</label>
                            <i class="material-icons toggle-password-icon grey-text" id="toggle-password-icon" style="position: absolute; right: 10px; top: 38%; transform: translateY(-50%); cursor: pointer;">visibility_off</i>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="satker">Satker</label><br><br>
                            <select name="satker" id="satker" class="browser-default">
                                <option value="" disabled>Pilih Satker</option>
                                <option value="ipds" <?= $Pengguna['satker'] === 'ipds' ? 'selected' : '' ?>>IPDS</option>
                                <option value="umum" <?= $Pengguna['satker'] === 'umum' ? 'selected' : '' ?>>Umum</option>
                                <option value="neraca" <?= $Pengguna['satker'] === 'neraca' ? 'selected' : '' ?>>Neraca</option>
                                <option value="produksi" <?= $Pengguna['satker'] === 'produksi' ? 'selected' : '' ?>>Produksi</option>
                                <option value="distribusi" <?= $Pengguna['satker'] === 'distribusi' ? 'selected' : '' ?>>Distribusi</option>
                                <option value="diseminasi" <?= $Pengguna['satker'] === 'diseminasi' ? 'selected' : '' ?>>Diseminasi</option>
                                <option value="sosial" <?= $Pengguna['satker'] === 'sosial' ? 'selected' : '' ?>>Sosial</option>
                            </select>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="pengguna_hak_akses">Hak Akses Sebagai</label><br><br>
                            <select id="pengguna_hak_akses" name="pengguna_hak_akses" class="browser-default" required>
                                <option value="" disabled>Pilih Hak Akses</option>
                                <option value="admin" <?= htmlspecialchars($Pengguna['pengguna_hak_akses']) === 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="operator" <?= htmlspecialchars($Pengguna['pengguna_hak_akses']) === 'operator' ? 'selected' : '' ?>>Operator</option>
                                <option value="user" <?= htmlspecialchars($Pengguna['pengguna_hak_akses']) === 'user' ? 'selected' : '' ?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align" style="margin-top: 20px;">
                            <button type="submit" name="ubah" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Ubah</button>
                            <a href="<?= base_url('pengguna')?>" class="btn waves-effect waves-light grey" style="border-radius: 25px; width: auto;">Batalkan</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card-title {
        font-weight: bold;
    }

    .card-content {
        padding-bottom: 0;
    }

    .input-field select {
        border-radius: 25px;
        padding: 10px 15px;
        border: 1px solid #e0e0e0;
        font-size: 1em;
        outline: none;
        transition: border-color 0.3s;
    }

    .input-field select:focus {
        border-color: #ff1745;
    }

    .btn {
        border-radius: 25px;
    }
</style>

<script>
    document.getElementById('toggle-password-icon').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.textContent = 'visibility';
        } else {
            passwordInput.type = 'password';
            this.textContent = 'visibility_off';
        }
    });
</script>
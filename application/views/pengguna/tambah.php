<div class="container" style="margin-top: 25px;">
    <div class="col s12 m12">
        <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
            <div class="card-content">
                <h4 class="card-title blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;"><?= $title ?></h4>
                <form action="<?= base_url('PenggunaController/tambah')?>" method="post" autocomplete="off">
                    <div class="row margin">
                        <div class="input-field col s12 m6">
                            <i class="mdi-communication-contacts prefix grey-text text-lighten-1"></i>
                            <input id="nama_lengkap" type="text" class="validate" name="nama_lengkap" required>
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="mdi-action-verified-user prefix grey-text text-lighten-1"></i>
                            <input id="username" type="text" name="username" required>
                            <label for="username">Nama Pengguna</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="mdi-content-mail prefix grey-text text-lighten-1"></i>
                            <input id="email" type="email" class="validate" name="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12 m6" style="position: relative;">
                            <i class="mdi-action-lock-outline prefix grey-text text-lighten-1"></i>
                            <input id="password" type="password" name="password" required>
                            <label for="password">Kata Sandi</label>
                            <i class="material-icons toggle-password-icon grey-text" id="toggle-password-icon" style="position: absolute; right: 10px; top: 38%; transform: translateY(-50%); cursor: pointer;">visibility_off</i>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="satker">Satker</label><br><br>
                            <select name="satker" id="satker" class="browser-default">
                                <option value="" disabled>Pilih Satker</option>
                                <option value="ipds">IPDS</option>
                                <option value="umum">Umum</option>
                                <option value="neraca">Neraca</option>
                                <option value="produksi">Produksi</option>
                                <option value="distribusi">Distribusi</option>
                                <option value="diseminasi">Diseminasi</option>
                                <option value="sosial">Sosial</option>
                            </select>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="level">Pengguna Sebagai</label><br><br>
                            <select name="level" id="level" class="browser-default">
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                                <option value="user" selected>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align" style="margin-top: 20px;">
                            <button type="submit" name="tambah" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Tambah</button>
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
<div class="container" style="margin-top: 25px;">
    <div class="col s12 m12">
        <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
            <div class="card-content">
                <h4 class="card-title blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Detail Pengguna</h4>
                <div class="row margin">
                    <div class="input-field col s12 m6">
                        <i class="mdi-communication-contacts prefix grey-text text-lighten-1"></i>
                        <input id="nama_lengkap" type="text" name="nama_lengkap" value="<?= $Pengguna['nama_lengkap'] ?>" readonly>
                        <label for="nama_lengkap">Nama Lengkap</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="mdi-action-verified-user prefix grey-text text-lighten-1"></i>
                        <input type="text" id="username" name="username" value="<?= $Pengguna['username'] ?>" readonly>
                        <label for="username">Nama Pengguna</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="mdi-content-mail prefix grey-text text-lighten-1"></i>
                        <input type="text" id="email" name="email" value="<?= $Pengguna['email'] ?>" readonly>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="mdi-action-lock-outline prefix grey-text text-lighten-1"></i>
                        <input type="text" id="password" name="password" value="<?= $Pengguna['password'] ?>" readonly>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <label for="satker">Satker</label><br><br>
                        <input type="text" id="satker" name="satker" value="<?= $Pengguna['satker'] ?>" readonly>
                    </div>
                    <div class="input-field col s12 m6">
                        <label for="pengguna_hak_akses">Hak Akses Sebagai</label><br><br>
                        <input type="text" id="pengguna_hak_akses" name="pengguna_hak_akses" value="<?= $Pengguna['pengguna_hak_akses'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 right-align" style="margin-top: 20px;">
                        <a href="<?= base_url('pengguna')?>" class="btn waves-effect waves-light grey" style="border-radius: 25px; width: auto;">Kembali</a>
                    </div>
                </div>
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

    .input-field input {
        border-radius: 25px;
        padding: 10px 15px;
        border: 1px solid #e0e0e0;
        font-size: 1em;
        outline: none;
        transition: border-color 0.3s;
    }

    .input-field input:focus {
        border-color: #ff1745;
    }

    .btn {
        border-radius: 25px;
    }
</style>

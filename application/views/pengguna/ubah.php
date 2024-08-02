<div class="container">
    <div class="card z-depth-3">
        <div class="card-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="blue-text text-darken-2">Ubah Pengguna</h4>
                </div>
            </div>
            <form action="<?= base_url('pengguna/ubah/' . $Pengguna['pengguna_id']) ?>" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="username" name="username" value="<?= $Pengguna['username'] ?>" required>
                        <label for="username">Nama Pengguna</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="email" name="email" value="<?= $Pengguna['email'] ?>" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12" style="position: relative;">
                        <input type="password" id="password" name="password" value="<?= $Pengguna['password'] ?>" required>
                        <label for="password">Password</label>
                        <label class="show-password">
                            <input type="checkbox" id="show-password" />
                            <span>Tampilkan Password</span>
                        </label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="satker" name="satker" value="<?= $Pengguna['satker'] ?>" required>
                        <label for="satker">Satker</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="pengguna_hak_akses" name="pengguna_hak_akses" value="<?= $Pengguna['pengguna_hak_akses'] ?>" required>
                        <label for="pengguna_hak_akses">Hak Akses Sebagai</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 right-align">
                        <button type="submit" name="ubah" class="btn waves-effect waves-light blue darken-2">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Native CSS for additional styling -->
<style>
    .container {
        margin-top: 30px;
    }

    .card {
        margin-top: 20px;
        border-radius: 8px;
    }

    .card-content {
        padding-bottom: 0;
    }

    .input-field label {
        color: #9e9e9e;
    }

    .input-field input:focus + label {
        color: #1e88e5 !important;
    }

    .input-field input:focus {
        border-bottom: 1px solid #1e88e5 !important;
        box-shadow: 0 1px 0 0 #1e88e5 !important;
    }

    .show-password {
        position: absolute;
        top: 100%;
        display: flex;
        align-items: center;
    }

    .show-password input[type="checkbox"] {
        margin-right: 50rex;
        display: flex;
        position: absolute;
    }
    
</style>

<script>
    document.getElementById('show-password').addEventListener('change', function() {
        var passwordInput = document.getElementById('password');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

<div class="container" style="margin-top: 25px;">
    <div class="col s12 m12">
        <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
            <div class="card-content">
                <h4 class="card-title blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;"><?= $title ?></h4>
                <form action="<?= base_url('pinjaman/tambah') ?>" method="post" style="margin-top: 30px;">
                    <div class="row margin">
                        <?php if ($this->session->userdata('level') == 'admin'): ?>
                            <div class="input-field col s12 m6">
                                <select id="username" name="username" class="browser-default" required>
                                    <option value="" disabled selected>Pilih Nama Pengguna</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?= htmlspecialchars(trim($user->pengguna_id), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(trim($user->username), ENT_QUOTES, 'UTF-8') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php else: ?>
                            <div class="input-field col s12 m6">
                                <input id="username" type="hidden" name="username" value="<?= htmlspecialchars(trim($this->session->userdata('username')), ENT_QUOTES, 'UTF-8') ?>" readonly>
                            </div>
                        <?php endif; ?>
                        <div class="input-field col s12 m6">
                            <select name="jenis_pinjaman" class="browser-default" required>
                                <option value="" disabled selected>Pilih Jenis Pinjaman</option>
                                <option value="Konsumtif">Konsumtif</option>
                                <option value="Produktif">Produktif</option>
                            </select>
                        </div>
                        <div class="input-field col s12 m4" style="margin-top: 20px;">
                            <input id="jumlah_pinjaman_tampil" type="text" required>
                            <input id="jumlah_pinjaman" type="hidden" name="jumlah_pinjaman" required>
                            <label for="jumlah_pinjaman_tampil">Jumlah Pinjaman</label>
                        </div>
                        <div class="input-field col s12 m4" style="margin-top: 20px;">
                            <input id="lama_pinjaman" type="number" name="lama_pinjaman" required min="1" max="12">
                            <label for="lama_pinjaman">Lama Pinjaman (bulan)</label>
                        </div>
                        <div class="input-field col s12 m4" style="margin-top: 20px;">
                            <input id="tanggal_pinjam" type="date" name="tanggal_pinjam" required value="<?= date('Y-m-d') ?>">
                            <label for="tanggal_pinjam"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align" style="margin-top: 20px;">
                            <button type="submit" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Tambah</button>
                            <a href="<?= base_url('pinjaman') ?>" class="btn waves-effect waves-light grey" style="border-radius: 25px; width: auto;">Batalkan</a>
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
    document.getElementById('jumlah_pinjaman_tampil').addEventListener('input', function (e) {
        // Menghapus karakter selain angka
        let value = e.target.value.replace(/[^,\d]/g, '');

        // Memisahkan bagian desimal dan integer
        let split = value.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // Menambahkan tanda titik jika input lebih dari ribuan
        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        // Update input tampil dengan format rupiah
        e.target.value = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

        // Update input hidden dengan nilai asli tanpa format
        document.getElementById('jumlah_pinjaman').value = value.replace(/\./g, '').replace(',', '.');
    });

    document.getElementById('lama_pinjaman').addEventListener('input', function () {
        let value = parseInt(this.value);
        if (value > 12) this.value = 12;
        if (value < 1) this.value = 1;
    });
</script>
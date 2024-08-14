<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <span class="card-title blue-text" style="font-size: 2em;"><?= $title ?></span>
                    <form action="<?= base_url('pinjaman/tambah') ?>" method="post">
                        <div class="row">
                            <?php if ($this->session->userdata('level') == 'admin'): ?>
                                <div class="input-field col s12">
                                    <select id="username" name="username" required>
                                        <option value="" disabled selected>Pilih Nama Pengguna</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user->username ?>">
                                                <?= $user->username ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="username">Nama Pengguna</label>
                                </div>
                            <?php else: ?>
                                <div class="input-field col s12">
                                    <input id="username" type="hidden" name="username"
                                        value="<?= $this->session->userdata('username') ?>" readonly>
                                </div>
                            <?php endif; ?>
                            <div class="input-field col s12">
                                <select name="jenis_pinjaman" required>
                                    <option value="" disabled selected>Jenis Pinjaman</option>
                                    <option value="Konsumtif">Konsumtif</option>
                                    <option value="Produktif">Produktif</option>
                                </select>
                                <label for="jenis_pinjaman">Jenis Pinjaman</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="tanggal_pinjam" type="date" name="tanggal_pinjam" required
                                    value="<?= date('Y-m-d') ?>">
                                <label for="tanggal_pinjam"></label>
                            </div>
                            <div class="input-field col s12">
                                <input id="jumlah_pinjaman" type="number" name="jumlah_pinjaman" required min="500">
                                <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="lama_pinjaman" type="number" name="lama_pinjaman" required min="1" max="12">
                                <label for="lama_pinjaman">Lama Pinjaman (bulan)</label>
                            </div>
                            <button type="submit" class="btn waves-effect waves-light green darken-1">Tambah
                                Pinjaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('jumlah_pinjaman').addEventListener('input', function (e) {
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

        e.target.value = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    });


    document.getElementById('lama_pinjaman').addEventListener('input', function () {
        let value = parseInt(this.value);
        if (value > 12) this.value = 12;
        if (value < 1) this.value = 1;
    });
</script>
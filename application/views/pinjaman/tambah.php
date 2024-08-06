<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <span class="card-title blue-text" style="font-size: 2em;"><?= $title ?></span>
                    <form action="<?= base_url('pinjaman/tambah') ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" type="text" name="username" value="<?= $this->session->userdata('username') ?>" readonly>
                                <label for="username">Nama Pengguna</label>
                            </div>
                            <select name="jenis_pinjaman" required>
                                    <option value="" disabled selected> Jenis Pinjaman</option>
                                    <option value="Konsumtif">Konsumtif</option>
                                    <option value="Produktif">Produktif</option>
                                </select>
                            <div class="input-field col s12">
                                <input id="tanggal_pinjam" type="date" name="tanggal_pinjam" required>
                                <label for="tanggal_pinjam"></label>
                            </div>
                            <div class="input-field col s12">
                                <input id="jumlah_pinjaman" type="number" name="jumlah_pinjaman" required>
                                <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="lama_pinjaman" type="number" name="lama_pinjaman" required>
                                <label for="lama_pinjaman">Lama Pinjaman (bulan)</label>
                            </div>
                            <button type="submit" class="btn waves-effect waves-light green darken-1">Tambah Pinjaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Edit Barang</h4>
                    <form action="<?= base_url('barang/ubah/' . $barang['id_barang']) ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <select id="kategori" name="kategori" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    <?php foreach ($kategori as $key) : ?>
                                        <option value="<?= $key['id_kategori']; ?>" <?= $key['id_kategori'] == $barang['id_kategori'] ? 'selected' : ''; ?>><?= $key['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="kategori">Kategori</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="nama" name="nama_barang" type="text" class="validate" value="<?= htmlspecialchars($barang['nama_barang']); ?>" required>
                                <label for="nama" class="active">Nama</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_beli" name="harga_beli" type="number" class="validate" value="<?= htmlspecialchars($barang['harga_beli']); ?>" required min="0">
                                <label for="harga_beli" class="active">Harga Beli</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_jual" name="harga_jual" type="number" class="validate" value="<?= htmlspecialchars($barang['harga_jual']); ?>" required min="0">
                                <label for="harga_jual" class="active">Harga Jual</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <select id="satuan" name="satuan" required>
                                    <option value="" disabled>Pilih Satuan</option>
                                    <?php foreach ($satuan as $key) : ?>
                                        <option value="<?= $key['id_satuan']; ?>" <?= $key['id_satuan'] == $barang['id_satuan'] ? 'selected' : ''; ?>><?= $key['nama_satuan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="satuan">Satuan</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="stok" name="stok" type="number" class="validate" value="<?= htmlspecialchars($barang['stok']); ?>" required min="0">
                                <label for="stok" class="active">Stok</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="detail" name="detail_barang" type="text" class="validate" value="<?= htmlspecialchars($barang['detail_barang']); ?>">
                                <label for="detail" class="active">Detail (opsional)</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="kode_barang" name="kode_barang" type="text" class="validate" value="<?= htmlspecialchars($barang['kode_barang']); ?>">
                                <label for="kode_barang" class="active">Barcode (opsional)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="<?= base_url('barang') ?>" class="btn waves-effect waves-light red darken-1" style="border-radius: 8px;">
                                    <i class="material-icons left">arrow_back</i>Kembali
                                </a>
                                <button type="submit" name="ubah" class="btn waves-effect waves-light green darken-1" style="border-radius: 8px;">
                                    <i class="material-icons left">edit</i>Update Barang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-content {
        padding-bottom: 0;
    }

    .input-field {
        margin-bottom: 20px;
    }

    .card-action {
        padding: 10px 24px;
    }

    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }

    .btn-small {
        border-radius: 4px;
    }
</style>
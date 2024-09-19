<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Tambah Barang</h4>
                    <form action="<?= base_url('barang/tambah') ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <select id="kategori" name="kategori" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <?php foreach ($kategori as $key) : ?>
                                        <option value="<?= $key['id_kategori']; ?>"><?= $key['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="nama" name="nama_barang" type="text" class="validate" required>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_beli" name="harga_beli" type="number" class="validate" required min="0">
                                <label for="harga_beli">Harga Beli</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_jual" name="harga_jual" type="number" class="validate" required min="0">
                                <label for="harga_jual">Harga Jual</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <select id="satuan" name="satuan" required>
                                    <option value="" disabled selected>Pilih Satuan</option>
                                    <?php foreach ($satuan as $key) : ?>
                                        <option value="<?= $key['id_satuan']; ?>"><?= $key['nama_satuan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="satuan">Satuan</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="stok" name="stok" type="number" class="validate" required min="0">
                                <label for=" stok">Stok</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="detail" name="detail_barang" type="text" class="validate">
                                <label for="detail">Detail (opsional)</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="kode_barang" name="kode_barang" type="text" class="validate">
                                <label for="kode_barang">Barcode (opsional)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 right-align">
                                <button type="submit" name="tambah" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Tambah</button>
                                <a href="<?= base_url('barang')?>" class="btn waves-effect waves-light grey" style="border-radius: 25px; width: auto;">Batalkan</a>
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
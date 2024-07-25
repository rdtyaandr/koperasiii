<div class="container">
    <div class="card z-depth-3">
        <div class="card-content">
            <span class="card-title blue-text text-darken-2">Tambah Barang</span>
            <form action="<?= base_url('barang/tambah') ?>" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="kategori" name="kategori" type="text" class="validate" required>
                        <label for="kategori">Kategori</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="nama" name="nama_barang" type="text" class="validate" required>
                        <label for="nama">Nama</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="detail" name="detail_barang" type="text" class="validate" required>
                        <label for="detail">Detail</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="satuan" name="satuan" type="text" class="validate" required>
                        <label for="satuan">Satuan</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="stok" name="stok" type="number" class="validate" required>
                        <label for="stok">Stok</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="harga_beli" name="harga_beli" type="number" class="validate" required>
                        <label for="harga_beli">Harga Beli</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="harga_jual" name="harga_jual" type="number" class="validate" required>
                        <label for="harga_jual">Harga Jual</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="kode_barang" name="kode_barang" type="text" class="validate" required>
                        <label for="kode_barang">Barcode</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 right-align">
                        <button type="submit" name="tambah" class="btn waves-effect waves-light green darken-1">
                            <i class="material-icons left">add</i>Tambah Barang
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
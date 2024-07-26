<div class="container">
    <div class="card z-depth-3">
        <div class="card-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="blue-text text-darken-2">Ubah Barang</h4>
                </div>
            </div>
            <form action="<?= base_url('barang/ubah/' . $barang['id_barang']) ?>" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="kode_barang" name="kode_barang" value="<?= $barang['kode_barang'] ?>" required>
                        <label for="kode_barang">Kode Barang</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required>
                        <label for="nama_barang">Nama Barang</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="detail_barang" name="detail_barang" value="<?= $barang['detail_barang'] ?>" required>
                        <label for="detail_barang">Detail Barang</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="satuan" name="satuan" value="<?= $barang['satuan'] ?>" required>
                        <label for="satuan">Satuan</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="kategori" name="kategori" value="<?= $barang['kategori'] ?>" required>
                        <label for="kategori">Kategori</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="number" id="harga_beli" name="harga_beli" value="<?= $barang['harga_beli'] ?>" required>
                        <label for="harga_beli">Harga Beli</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="number" id="harga_jual" name="harga_jual" value="<?= $barang['harga_jual'] ?>" required>
                        <label for="harga_jual">Harga Jual</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="number" id="stok" name="stok" value="<?= $barang['stok'] ?>" required>
                        <label for="stok">Stok</label>
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

    .input-field input:focus+label {
        color: #1e88e5 !important;
    }

    .input-field input:focus {
        border-bottom: 1px solid #1e88e5 !important;
        box-shadow: 0 1px 0 0 #1e88e5 !important;
    }
</style>
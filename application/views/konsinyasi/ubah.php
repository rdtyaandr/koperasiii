<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Ubah Barang Konsinyasi</h4>
                    <form action="<?= base_url('konsinyasi/ubah/' . $konsinyasi->id_barang) ?>" method="post" onsubmit="return validateForm()">
                        <div class="row">
                            <div class="input-field col s12 m6 l4">
                                <input id="nama_barang" name="nama_barang" type="text" class="validate" value="<?= htmlspecialchars($konsinyasi->nama_barang); ?>" required>
                                <label for="nama_barang">Nama Barang Konsinyasi</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_beli" name="harga_beli" type="number" class="validate" value="<?= htmlspecialchars($konsinyasi->harga_beli); ?>" required min="1">
                                <label for="harga_beli">Harga Beli</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_jual_pagi" name="harga_jual_pagi" type="number" class="validate" value="<?= htmlspecialchars($konsinyasi->harga_jual_pagi); ?>" required min="1">
                                <label for="harga_jual_pagi">Harga Jual (pagi)</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_jual_sore" name="harga_jual_sore" type="number" class="validate" value="<?= htmlspecialchars($konsinyasi->harga_jual_sore); ?>" required min="1">
                                <label for="harga_jual_sore">Harga Jual (sore)</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="stok" name="stok" type="number" class="validate" value="<?= htmlspecialchars($konsinyasi->stok); ?>" required min="0">
                                <label for="stok">Stok</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="detail_barang" name="detail_barang" type="text" class="validate" value="<?= htmlspecialchars($konsinyasi->detail_barang); ?>">
                                <label for="detail_barang">Detail (opsional)</label>
                            </div>
                            <div class="input-field col s12 m6 l6 offset-l3">
                                <input id="kode_barang" name="kode_barang" type="text" class="validate" value="<?= htmlspecialchars($konsinyasi->kode_barang); ?>">
                                <label for="kode_barang">Barcode (opsional)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 right-align">
                                <button type="submit" name="ubah" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Ubah</button>
                                <a href="<?= base_url('konsinyasi') ?>" class="btn waves-effect waves-light grey" style="border-radius: 25px; width: auto;">Batalkan</a>
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
    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }
</style>
<script>
    function validateForm() {
        var hargaBeli = parseFloat(document.getElementById('harga_beli').value);
        var hargaJualPagi = parseFloat(document.getElementById('harga_jual_pagi').value);
        var hargaJualSore = parseFloat(document.getElementById('harga_jual_sore').value);
        
        if (hargaJualPagi <= hargaBeli || hargaJualSore <= hargaBeli) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harga Jual tidak boleh kurang dari Harga Beli.', timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true
            });
            return false; // Mencegah form untuk disubmit
        }
        return true; // Mengizinkan form untuk disubmit
    }
</script>

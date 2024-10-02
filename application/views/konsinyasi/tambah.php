<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Tambah Barang Konsinyasi</h4>
                    <form action="<?= base_url('konsinyasi/tambah') ?>" method="post" onsubmit="return validateForm()">
                        <div class="row">
                            <div class="input-field col s12 m6 l4">
                                <input id="nama_konsinyasi" name="nama_konsinyasi" type="text" class="validate" required>
                                <label for="nama_konsinyasi">Nama Barang Konsinyasi</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_beli" name="harga_beli" type="number" class="validate" required min="1">
                                <label for="harga_beli">Harga Beli</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_jual_pagi" name="harga_jual_pagi" type="number" class="validate" required min="1">
                                <label for="harga_jual_pagi">Harga Jual (pagi)</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="harga_jual_sore" name="harga_jual_sore" type="number" class="validate" required min="1">
                                <label for="harga_jual_sore">Harga Jual (sore)</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="stok" name="stok" type="number" class="validate" required min="0">
                                <label for="stok">Stok</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="detail_konsinyasi" name="detail_konsinyasi" type="text" class="validate">
                                <label for="detail_konsinyasi">Detail (opsional)</label>
                            </div>
                            <div class="input-field col s12 m6 l6 offset-l3">
                                <input id="kode_barang" name="kode_barang" type="text" class="validate">
                                <label for="kode_barang">Barcode (opsional)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 right-align">
                                <button type="submit" name="tambah" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Tambah</button>
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

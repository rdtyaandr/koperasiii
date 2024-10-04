<!-- Native CSS for additional styling -->
<style>

    .card-content {
        padding-bottom: 0;
    }

    .input-field {
        margin-bottom: 20px;
    }

    table {
        margin-top: 20px;
        border-radius: 8px;
    }

    table thead {
        background-color: #1e88e5;
    }

    table tbody tr {
        border-bottom: 1px solid #ddd;
    }

    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .card-action {
        padding: 10px 24px;
    }

    .tooltipped {
        position: relative;
    }

    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }

    .btn-floating {
        border-radius: 100px !important;
    }

    .btn.rounded-circle {
        border-radius: 50% !important;
        /* Membuat tombol berbentuk bulat */
        padding: 0;
        /* Menghapus padding default agar tombol tetap bulat */
        width: 40px;
        /* Menentukan lebar tombol */
        height: 40px;
    }

    .btn .icon-transaksi {
        font-size: 24px;
        /* Ukuran ikon */
        /* Menentukan tinggi tombol */
        display: flex;
        /* Menggunakan flexbox untuk menyelaraskan ikon di tengah */
        align-items: center;
        /* Menyelaraskan ikon secara vertikal */
        justify-content: center;
        /* Menyelaraskan ikon secara horizontal */
    }

    input[type="hidden"] {
        position: absolute !important;
        /* Memindahkan elemen dari tata letak */
        left: -9999px !important;
        /* Memindahkan elemen jauh dari tampilan */
        visibility: hidden !important;
        /* Menyembunyikan elemen dari tampilan */
    }
</style>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Edit Transaksi</h4>
                    <form action="<?= base_url('transaksi/ubah/' . $transaksi->id_transaksi) ?>" method="post">
                        <input type="hidden" name="id_transaksi" value="<?= $transaksi->id_transaksi; ?>">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <div id="additional-input" style="display: none; margin-bottom: 10px;">
                                    <input type="text" id="new-nama" name="new_nama" placeholder="Ketik nama yang ingin dicari" autofocus oninput="filterDropdown()">
                                </div>
                                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <div id="search-button" class="btn-floating grey" style="margin-right: 10px; pointer-events: none;">
                                        <i class="material-icons">search</i>
                                    </div>
                                    <select id="nama" name="nama" class="browser-default" required onchange="handleSelect()" style="pointer-events: none;">
                                        <option value="" disabled selected>Pilih Nama</option>
                                        <?php foreach ($pengguna as $p) : ?>
                                            <option value="<?= $p['pengguna_id']; ?>" <?= $transaksi->pengguna_id == $p['pengguna_id'] ? 'selected' : ''; ?>><?= htmlspecialchars($p['username']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <select id="cara_bayar" name="cara_bayar" class="browser-default" required style="pointer-events: none;">
                                    <option value="" disabled selected>Pilih Cara Bayar</option>
                                    <option value="Cash" <?= $transaksi->cara_bayar == 'Cash' ? 'selected' : ''; ?>>Cash</option>
                                    <option value="Kredit" <?= $transaksi->cara_bayar == 'Kredit' ? 'selected' : ''; ?>>Kredit</option>
                                </select>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <input type="text" id="detail" name="detail" value="<?= isset($transaksi->detail) ? $transaksi->detail : ''; ?>">
                                <label for="detail">Detail (Opsional)</label>
                            </div>
                        </div>
                        <script>
                            function showInput() {
                                document.getElementById('additional-input').style.display = 'block';
                                document.getElementById('search-button').style.display = 'none';
                                document.getElementById('new-nama').focus(); // Fokus pada input teks
                            }

                            function filterDropdown() {
                                var input = document.getElementById('new-nama').value.toLowerCase();
                                var dropdownItems = document.querySelectorAll('.dropdown-item');
                                dropdownItems.forEach(function(item) {
                                    if (item.textContent.toLowerCase().includes(input)) {
                                        item.style.display = 'block';
                                    } else {
                                        item.style.display = 'none';
                                    }
                                });
                            }

                            function handleSelect() {
                                // Menghapus input teks dan menampilkan kembali tombol search
                                document.getElementById('additional-input').style.display = 'none';
                                document.getElementById('search-button').style.display = 'block';
                                document.getElementById('new-nama').value = ''; // Mengosongkan input teks
                            }
                        </script>
                        <div class="row">
                            <div class="col s12">
                                <h5 class="blue-text text-darken-2" style="font-size: 1.5em; margin-bottom: 20px;">Detail Barang</h5>
                                <table class="striped highlight responsive-table" style="border-radius: 8px; overflow: hidden;">
                                    <thead class="blue darken-2 white-text">
                                        <tr>
                                            <th class="center-align">No</th>
                                            <th>Jenis Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Jual (Pagi/Sore)</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-table-body">
                                        <?php foreach ($detail_barang as $key => $item): ?>
                                            <tr>
                                                <td class="center-align"><?= $key + 1 ?></td>
                                                <td>
                                                    <div class="input-field" style="margin-bottom: 27px;">
                                                        <select name="jenis_barang[]" class="browser-default" required onchange="toggleDropdowns(this)">
                                                            <option value="toko" <?= $item->id_konsinyasi ? '' : 'selected' ?>>Barang Toko</option>
                                                            <option value="konsinyasi" <?= $item->id_konsinyasi ? 'selected' : '' ?>>Barang Konsinyasi</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-field" style="margin-bottom: 27px;">
                                                        <select name="nama_barang[]" class="browser-default" required>
                                                            <option value="<?= $item->id_barang ?>" selected><?= htmlspecialchars($item->nama_barang) ?></option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-field" style="margin-bottom: 27px;">
                                                        <select name="harga_jual[]" class="browser-default" required>
                                                            <option value="pagi" <?= $item->harga_waktu == 'pagi' ? 'selected' : '' ?>>Pagi</option>
                                                            <option value="sore" <?= $item->harga_waktu == 'sore' ? 'selected' : '' ?>>Sore</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td><input type="number" name="harga[]" class="validate" value="<?= $item->harga ?>" oninput="updateRowTotal(this)" required></td>
                                                <td><input type="number" name="jumlah[]" min="1" class="validate" value="<?= $item->jumlah ?>" oninput="updateRowTotal(this)" required></td>
                                                <td><input type="text" name="total[]" readonly class="validate" value="<?= $item->total ?>"></td>
                                                <td>
                                                    <a href="#" class="btn-floating white-text waves-effect waves-light red" onclick="removeRow(this)"><i class="material-icons icon-transaksi">delete</i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php if (count($detail_barang) < 1): ?>
                                            <tr>
                                                <td colspan="8" class="center-align">Tidak ada detail barang yang bisa diubah.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <div>
                                    <label for="jumlah-rows">Jumlah Baris:</label>
                                    <input type="number" id="jumlah-rows" value="1" min="1" style="width: 35px;">
                                    <div class="btn blue darken-2 waves-effect waves-light rounded-circle" onclick="addMultipleRows()">
                                        <i class="material-icons icon-transaksi">add</i>
                                    </div>
                                </div>
                                <p class="right-align blue-text text-darken-2" style="font-size: 1.2em; font-weight: bold;">Total Harga: <span id="total-harga">0</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 right-align">
                                <button type="submit" name="ubah" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Ubah</button>
                                <a href="<?= base_url('transaksi') ?>" class="btn waves-effect waves-light grey" style="border-radius: 25px; width: auto;">Batalkan</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addMultipleRows() {
        var rowCount = parseInt(document.getElementById('jumlah-rows').value) || 1;
        var tableBody = document.getElementById('item-table-body');

        for (var i = 0; i < rowCount; i++) {
            var rowNumber = tableBody.getElementsByTagName('tr').length + 1;
            var newRow = `
            <tr>
                <td class="center-align">${rowNumber}</td>
                <td>
                    <div class="input-field" style="margin-bottom: 27px;">
                        <select name="jenis_barang[]" class="browser-default" onchange="toggleDropdowns(this)" required>
                            <option value="" disabled selected>Pilih Jenis Barang</option>
                            <option value="toko">Barang Toko</option>
                            <option value="konsinyasi">Barang Konsinyasi</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="input-field" style="margin-bottom: 27px;">
                        <select name="nama_barang[]" class="browser-default" id="nama_barang" onchange="updateHarga(this)" disabled required>
                            <option value="" disabled selected>Pilih Nama Barang</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="input-field" style="margin-bottom: 27px;">
                        <select name="harga_jual[]" class="browser-default" onchange="updateHargaInput(this)" disabled required>
                            <option value="" disabled selected>Pilih Harga Jual</option>
                            <option value="pagi">Pagi</option>
                            <option value="sore">Sore</option>
                        </select>
                    </div>
                </td>
                <td><input type="number" name="harga[]" class="validate" oninput="updateRowTotal(this)" required></td>
                <td><input type="number" name="jumlah[]" min="1" class="validate" oninput="updateRowTotal(this)" required></td>
                <td><input type="text" name="total[]" readonly class="validate"></td>
                <td>
                <a href="#" class="btn-floating white-text waves-effect waves-light red" onclick="removeRow(this)"><i class="material-icons icon-transaksi">delete</i></a>
                </td>
            </tr>
        `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
        }

        updateDropdownItems();
    }

    function toggleDropdowns(select) {
        var row = select.closest('tr');
        var namaBarangSelect = row.querySelector('select[name="nama_barang[]"]');
        var hargaJualSelect = row.querySelector('select[name="harga_jual[]"]');
        var allNamaBarang = document.querySelectorAll('select[name="nama_barang[]"]');
        var selectedBarangToko = [];
        var selectedBarangKonsinyasi = [];

        // Ambil nama barang yang sudah dipilih
        allNamaBarang.forEach(function(item) {
            if (item.value) {
                if (item.closest('tr').querySelector('select[name="jenis_barang[]"]').value == "toko") {
                    selectedBarangToko.push(item.value);
                } else {
                    selectedBarangKonsinyasi.push(item.value);
                }
            }
        });

        if (select.value) {
            namaBarangSelect.disabled = false;

            if (select.value == "toko") { // Jika Barang Toko dipilih
                hargaJualSelect.disabled = true;
                hargaJualSelect.value = ""; // Reset harga jual
                namaBarangSelect.innerHTML = '<option value="" disabled selected>Pilih Nama Barang</option>';
                <?php if (isset($barang)): ?>
                    <?php foreach ($barang as $item): ?>
                        if (!selectedBarangToko.includes("<?= $item['id_barang']; ?>")) {
                            namaBarangSelect.innerHTML += '<option value="<?= $item['id_barang']; ?>" data-harga="<?= $item['harga_jual']; ?>"><?= htmlspecialchars($item['nama_barang']); ?></option>';
                        }
                    <?php endforeach; ?>
                <?php endif; ?>
            } else {
                hargaJualSelect.disabled = false;
                hargaJualSelect.required = true; // Tambahkan required jika konsinyasi dipilih
                namaBarangSelect.innerHTML = '<option value="" disabled selected>Pilih Nama Barang</option>';
                <?php if (isset($konsinyasi)): ?>
                    <?php foreach ($konsinyasi as $konsi): ?>
                        if (!selectedBarangKonsinyasi.includes("<?= $konsi['id_barang']; ?>")) {
                            namaBarangSelect.innerHTML += '<option value="<?= $konsi['id_barang']; ?>" data-harga-pagi="<?= $konsi['harga_jual_pagi']; ?>" data-harga-sore="<?= $konsi['harga_jual_sore'] ?>"><?= htmlspecialchars($konsi['nama_barang']); ?></option>';
                        }
                    <?php endforeach; ?>
                <?php endif; ?>
            }
        } else {
            namaBarangSelect.disabled = true;
            hargaJualSelect.disabled = true;
            hargaJualSelect.required = false; // Hapus required jika tidak ada jenis barang yang dipilih
        }
    }

    function updateHarga(select) {
        var row = select.closest('tr');
        var hargaInput = row.querySelector('input[name="harga[]"]');
        var hargaJualSelect = row.querySelector('select[name="harga_jual[]"]');
        var selectedOption = select.options[select.selectedIndex];

        if (selectedOption) {
            if (row.querySelector('select[name="jenis_barang[]"]').value == "toko") {
                // Jika jenis barang adalah Toko, langsung tampilkan harga
                hargaInput.value = selectedOption.getAttribute('data-harga') || '';
                row.querySelector('input[name="jumlah[]"]').focus(); // Fokus ke input jumlah
            } else {
                // Jika jenis barang adalah Konsinyasi, tunggu pemilihan harga jual
                hargaInput.value = '';
            }
        } else {
            hargaInput.value = '';
        }
    }

    function updateHargaInput(select) {
        var row = select.closest('tr');
        var namaBarangSelect = row.querySelector('select[name="nama_barang[]"]');
        var selectedOption = namaBarangSelect.options[namaBarangSelect.selectedIndex];

        if (select.value && selectedOption) {
            var hargaInput = row.querySelector('input[name="harga[]"]');
            if (select.value == "pagi") { // Pagi
                hargaInput.value = selectedOption.getAttribute('data-harga-pagi') || '';
            } else if (select.value == "sore") { // Sore
                hargaInput.value = selectedOption.getAttribute('data-harga-sore') || '';
            }
            row.querySelector('input[name="jumlah[]"]').focus(); // Fokus ke input jumlah
        }
    }

    // Fungsi untuk menghitung total per baris
    function updateRowTotal(input) {
        var row = input.closest('tr');
        if (!row) {
            console.error("Baris tidak ditemukan.");
            return;
        }

        var harga = parseFloat(row.querySelector('input[name="harga[]"]').value.replace(/\./g, ''));
        var jumlah = parseFloat(row.querySelector('input[name="jumlah[]"]').value);
        var total = harga * jumlah;

        // Pastikan total bukan NaN
        if (isNaN(total)) {
            total = 0;
        }

        row.querySelector('input[name="total[]"]').value = total;

        // Update total keseluruhan
        updateTotalHarga();
    }

    function updateTotalHarga() {
        var totalHarga = 0;
        var totals = document.querySelectorAll('input[name="total[]"]');
        totals.forEach(function(input) {
            var value = parseFloat(input.value);
            if (!isNaN(value)) {
                totalHarga += value;
            }
        });
        document.getElementById('total-harga').textContent = formatNumber(totalHarga);
    }

    function removeRow(button) {
        var row = button.closest('tr');
        row.remove();

        var rows = document.querySelectorAll('#item-table-body tr');
        rows.forEach(function(row, index) {
            row.querySelector('td:first-child').textContent = index + 1;
        });

        updateTotalHarga();
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Tidak perlu menambahkan baris baru, cukup menampilkan detail yang ada
        // Detail barang sudah ditampilkan dari database
    });
</script>
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

    .btn-small {
        border-radius: 4px;
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

    .btn .material-icons {
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

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Tambah Transaksi</h4>
                    <form action="<?= base_url('transaksi/tambah') ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12 m6 l3">
                                <select id="nama" name="nama">
                                    <option value="" disabled selected>Pilih Nama</option>
                                    <?php foreach ($pengguna as $p) : ?>
                                        <option value="<?= $p['pengguna_id']; ?>"><?= $p['username']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="input-field col s12 m6 l3">
                                <select id="cara_bayar" name="cara_bayar">
                                    <option value="" disabled selected>Pilih Cara Bayar</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Kredit">Kredit</option>
                                </select>
                                <label>Cara Bayar</label>
                            </div>
                            <div class="input-field col s12 m6 l3">
                                <select id="status_bayar" name="status_bayar">
                                    <option value="" disabled selected>Pilih Status Bayar</option>
                                    <option value="Belum Bayar">Belum Bayar</option>
                                    <option value="Sudah Bayar">Sudah Bayar</option>
                                </select>
                                <label>Status Bayar</label>
                            </div>
                            <div class="input-field col s12 m6 l3">
                                <select id="pengambilan" name="pengambilan">
                                    <option value="" disabled selected>Pilih Pengambilan Barang</option>
                                    <option value="Belum Diambil">Belum Diambil</option>
                                    <option value="Diambil">Diambil</option>
                                </select>
                                <label>Pengambilan Barang</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <h5 class="blue-text text-darken-2" style="font-size: 1.5em; margin-bottom: 20px;">Detail Barang</h5>
                                <table class="striped highlight responsive-table">
                                    <thead class="blue darken-2 white-text">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-table-body">
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="dropdown">
                                                    <div class="dropdown-trigger">
                                                        <span class="dropdown-text">Pilih Nama Barang</span>
                                                        <span class="arrow-down">&#9660;</span>
                                                    </div>
                                                    <ul class="dropdown-menu">
                                                        <?php foreach ($barang as $b) : ?>
                                                            <li class="dropdown-item" data-id="<?= $b['id_barang']; ?>" data-harga="<?= $b['harga_jual']; ?>">
                                                                <?= htmlspecialchars($b['nama_barang']); ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><input type="number" name="harga[]" readonly class="validate"></td>
                                            <td><input type="number" name="jumlah[]" min="1" class="validate" oninput="updateRowTotal(this)"></td>
                                            <td><input type="text" name="total[]" readonly class="validate"></td>
                                            <td>
                                                <a href="#" class="btn-small white-text waves-effect waves-light red" onclick="removeRow(this)"><i class="material-icons">delete</i></a>
                                            </td>
                                            <input type="hidden" name="id_barang[]" class="id-barang" value="">
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <label for="jumlah-rows">Jumlah Baris:</label>
                                    <input type="number" id="jumlah-rows" value="1" min="1" style="width: 35px;">
                                    <div class="btn blue darken-2 waves-effect waves-light rounded-circle" onclick="addMultipleRows()">
                                        <i class="material-icons">add</i>
                                    </div>
                                </div>
                                <p class="right-align blue-text text-darken-2" style="font-size: 1.2em; font-weight: bold;">Total Harga: <span id="total-harga">0</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn waves-effect waves-light green right darken-1" name="tambah">Simpan Transaksi</button>
                                <a href="<?= base_url('transaksi') ?>" class="btn waves-effect waves-light red right darken-1" style="margin-right: 5px;">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Inisialisasi dropdown
    function initializeDropdowns() {
        var dropdowns = document.querySelectorAll(".dropdown");

        dropdowns.forEach(function(dropdown) {
            var dropdownTrigger = dropdown.querySelector(".dropdown-trigger");
            var dropdownText = dropdown.querySelector(".dropdown-text");
            var dropdownMenu = dropdown.querySelector(".dropdown-menu");
            var dropdownItems = dropdown.querySelectorAll(".dropdown-item");

            dropdownTrigger.addEventListener("click", function() {
                dropdowns.forEach(function(d) {
                    if (d !== dropdown) d.classList.remove("open");
                });
                dropdown.classList.toggle("open");
            });

            dropdownItems.forEach(function(item) {
                item.addEventListener("click", function() {
                    var selectedText = this.textContent;
                    var selectedId = this.getAttribute('data-id'); // Ambil ID barang dari atribut data
                    var selectedHarga = parseFloat(this.getAttribute('data-harga')); // Ambil harga dari atribut data

                    if (isNaN(selectedHarga)) {
                        console.error("Harga tidak valid:", this.getAttribute('data-harga'));
                    }

                    dropdownText.textContent = selectedText;
                    dropdown.classList.add("selected");
                    dropdown.classList.remove("open");

                    var row = this.closest('tr');
                    if (row) {
                        row.querySelector('input[name="id_barang[]"]').value = selectedId; // Simpan ID barang
                        row.querySelector('input[name="harga[]"]').value = selectedHarga || 0;

                        // Fokus otomatis ke input jumlah setelah memilih barang
                        row.querySelector('input[name="jumlah[]"]').focus();

                        // Hitung total untuk baris tersebut
                        updateRowTotal(row.querySelector('input[name="jumlah[]"]'));
                    } else {
                        console.error("Baris tidak ditemukan.");
                    }
                });
            });
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener("click", function(event) {
            dropdowns.forEach(function(dropdown) {
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove("open");
                }
            });
        });
    }

    // Fungsi untuk menambahkan beberapa baris baru
    function addMultipleRows() {
        var rowCount = parseInt(document.getElementById('jumlah-rows').value) || 1;
        var tableBody = document.getElementById('item-table-body');

        for (var i = 0; i < rowCount; i++) {
            var rowNumber = tableBody.getElementsByTagName('tr').length + 1;
            var newRow = `
            <tr>
                <td>${rowNumber}</td>
                <td>
                    <div class="dropdown">
                        <div class="dropdown-trigger">
                            <span class="dropdown-text">Pilih Nama Barang</span>
                            <span class="arrow-down">&#9660;</span>
                        </div>
                        <ul class="dropdown-menu">
                            <?php foreach ($barang as $b) : ?>
                                <li class="dropdown-item" data-id="<?= $b['id_barang']; ?>" data-harga="<?= $b['harga_jual']; ?>">
                                    <?= htmlspecialchars($b['nama_barang']); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </td>
                <td><input type="text" name="harga[]" readonly class="validate"></td>
                <td><input type="number" name="jumlah[]" min="1" class="validate" oninput="updateRowTotal(this)"></td>
                <td><input type="text" name="total[]" readonly class="validate"></td>
                <td>
                <a href="#" class="btn-small white-text waves-effect waves-light red" onclick="removeRow(this)"><i class="material-icons">delete</i></a>
                </td>
                <input type="hidden" name="id_barang[]" class="name-barang" value="">
            </tr>
        `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
        }

        // Inisialisasi ulang dropdown untuk baris baru
        initializeDropdowns();
    }

    // Fungsi untuk menghitung total per baris
    function updateRowTotal(input) {
        var row = input.closest('tr');
        if (!row) {
            console.error("Baris tidak ditemukan.");
            return;
        }

        var harga = parseFloat(row.querySelector('input[name="harga[]"]').value.replace(/\./g, ''));
        var jumlah = parseFloat(input.value);
        var total = harga * jumlah;

        // Pastikan total bukan NaN
        if (isNaN(total)) {
            total = 0;
        }

        row.querySelector('input[name="total[]"]').value = formatNumber(total);

        // Update total keseluruhan
        updateTotalHarga();
    }

    // Fungsi untuk menghitung total harga keseluruhan
    function updateTotalHarga() {
        var totalHarga = 0;
        var totals = document.querySelectorAll('input[name="total[]"]');
        totals.forEach(function(input) {
            var value = parseFloat(input.value.replace(/\./g, ''));
            if (!isNaN(value)) {
                totalHarga += value;
            }
        });
        document.getElementById('total-harga').textContent = formatNumber(totalHarga);
    }

    // Fungsi untuk menghapus baris
    function removeRow(button) {
        var row = button.closest('tr');
        row.remove();

        // Perbarui nomor urut
        var rows = document.querySelectorAll('#item-table-body tr');
        rows.forEach(function(row, index) {
            row.querySelector('td:first-child').textContent = index + 1;
        });

        // Update total keseluruhan
        updateTotalHarga();
    }

    // Fungsi untuk memformat angka dengan pemisah ribuan
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Inisialisasi dropdown saat halaman dimuat
    document.addEventListener("DOMContentLoaded", initializeDropdowns);
</script>
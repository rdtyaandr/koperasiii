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

    .dropdown {
        position: relative;
        display: inline-block;
        width: 100%;
        margin-bottom: 14px;
        /* Optional: Set a maximum width for larger screens */
    }

    .dropdown-trigger {
        background-color: transparent;
        color: #333;
        border: none;
        padding: 10px 15px;
        /* Adjust padding for better spacing */
        font-size: 14px;
        /* Adjusted font size */
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* Align items with space between */
        width: 100%;
        /* Ensure the button takes full width of its container */
        border-bottom: 1.5px solid #9e9e9e;
        /* Gray color for border bottom initially */
        transition: border-color 0.5s ease, background-color 0.3s ease;
        /* Extended transition duration */
        outline: none;
        appearance: none;
    }

    .dropdown-trigger:hover,
    .dropdown.open .dropdown-trigger {
        border-bottom-color: #ff1745 !important;
        /* Pink color on hover or open */
    }

    .dropdown.selected .dropdown-trigger {
        border-bottom-color: #4caf50 !important;
        /* Green color after selection */
    }

    .dropdown-trigger:focus {
        background-color: transparent !important;
        /* Ensure background is transparent on focus */
        border-bottom-color: #ff1745 !important;
        /* Pink color when focused */
        box-shadow: none;
        /* Remove default focus shadow */
    }

    .arrow-down {
        font-size: 12px;
        /* Make the arrow smaller */
        color: #9e9e9e;
        /* Light gray color for the arrow */
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .dropdown-trigger:hover .arrow-down,
    .dropdown.open .arrow-down {
        color: #333;
        /* Black color on hover or open */
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        width: 100%;
        /* Mengatur tinggi maksimum dan overflow untuk memungkinkan scroll */
        /* Anda dapat menyesuaikan ini sesuai kebutuhan */
        overflow-y: auto;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        margin-top: 5px;
        z-index: 9999;
        /* Set z-index tinggi untuk berada di atas elemen lainnya */
        opacity: 0;
        transform: translateY(-10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .dropdown-menu .dropdown-item {
        padding: 12px 18px;
        cursor: pointer;
        color: #333;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s ease;
    }

    .dropdown-menu .dropdown-item:last-child {
        border-bottom: none;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f4f4f4;
    }

    .dropdown.open .dropdown-menu {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown.open .arrow-down {
        transform: rotate(180deg);
    }

    .dropdown-text {
        font-size: 14px;
        /* Adjusted font size */
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
                                <select id="nama" name="nama" required>
                                    <option value="" disabled selected>Pilih Nama</option>
                                    <?php foreach ($pengguna as $p) : ?>
                                        <option value="<?= $p['username']; ?>"><?= $p['username']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="input-field col s12 m6 l3">
                                <select id="cara_bayar" name="cara_bayar" required>
                                    <option value="" disabled selected>Pilih Cara Bayar</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="Debit">Debit</option>
                                </select>
                                <label>Cara Bayar</label>
                            </div>
                            <div class="input-field col s12 m6 l3">
                                <select id="status_bayar" name="status_bayar" required>
                                    <option value="" disabled selected>Pilih Status Bayar</option>
                                    <option value="Belum Bayar">Belum Bayar</option>
                                    <option value="Sudah Bayar">Sudah Bayar</option>
                                </select>
                                <label>Status Bayar</label>
                            </div>
                            <div class="input-field col s12 m6 l3">
                                <select id="pengambilan" name="pengambilan" required>
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
                                            <th>#</th>
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
                                                    <button class="dropdown-trigger">
                                                        <span class="dropdown-text">Pilih Nama Barang</span>
                                                        <span class="arrow-down">&#9660;</span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php foreach ($barang as $b) : ?>
                                                            <li class="dropdown-item" data-harga="<?= $b['harga_jual']; ?>">
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
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="btn waves-effect waves-light blue darken-2" onclick="addRow()">Tambah Item</a>
                                <p class="right-align blue-text text-darken-2" style="font-size: 1.2em; font-weight: bold;">Total Harga: <span id="total-harga">0</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn waves-effect waves-light green right darken-1">Simpan Transaksi</button>
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
                    dropdownText.textContent = selectedText;
                    dropdown.classList.add("selected");
                    dropdown.classList.remove("open");

                    // Ambil data harga dari item yang dipilih dan pastikan harga valid
                    var harga = parseFloat(this.getAttribute('data-harga'));
                    if (isNaN(harga)) {
                        harga = 0; // Jika tidak valid, set harga ke 0 atau sesuai kebutuhan
                    }
                    var row = this.closest('tr');
                    row.querySelector('input[name="harga[]"]').value = harga;

                    // Hitung total untuk baris tersebut
                    updateRowTotal(row.querySelector('input[name="jumlah[]"]'));
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

    // Inisialisasi dropdown saat halaman dimuat
    document.addEventListener("DOMContentLoaded", initializeDropdowns);

    // Fungsi untuk menambahkan baris baru
    // Fungsi untuk memformat angka dengan pemisah ribuan
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Fungsi untuk menambahkan baris baru
    function addRow() {
        var tableBody = document.getElementById('item-table-body');
        var rowCount = tableBody.getElementsByTagName('tr').length;
        var newRow = `
        <tr>
            <td>${rowCount + 1}</td>
            <td>
                <div class="dropdown">
                    <button class="dropdown-trigger">
                        <span class="dropdown-text">Pilih Nama Barang</span>
                        <span class="arrow-down">&#9660;</span>
                    </button>
                    <ul class="dropdown-menu">
                        <?php foreach ($barang as $b) : ?>
                            <li class="dropdown-item" data-harga="<?= $b['harga_jual']; ?>">
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
        </tr>
    `;
        tableBody.insertAdjacentHTML('beforeend', newRow);

        // Inisialisasi ulang dropdown untuk baris baru
        initializeDropdowns();
    }

    // Fungsi untuk menghitung total per baris
    function updateRowTotal(input) {
        var row = input.closest('tr');
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
</script>
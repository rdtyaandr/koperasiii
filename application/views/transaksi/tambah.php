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
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Tambah Transaksi</h4>
                    <form action="<?= base_url('transaksi/tambah') ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12 m4 l4">
                                <select id="nama" name="nama">
                                    <option value="" disabled selected>Pilih Nama</option>
                                    <?php foreach ($pengguna as $p) : ?>
                                        <option value="<?= $p['pengguna_id']; ?>"><?= $p['username']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <select id="cara_bayar" name="cara_bayar">
                                    <option value="" disabled selected>Pilih Cara Bayar</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Kredit">Kredit</option>
                                </select>
                                <label>Cara Bayar</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <input type="text" id="detail" name="detail">
                                <label for="detail">Detail (Opsional)</label>
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
                                <button type="submit" name="tambah" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px; width: auto;">Tambah</button>
                                <a href="<?= base_url('transaksi')?>" class="btn waves-effect waves-light grey" style="border-radius: 25px; width: auto;">Batalkan</a>
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

        dropdownTrigger.addEventListener("click", function(event) {
            event.stopPropagation();
            closeAllDropdowns();
            dropdown.classList.toggle("open");
        });

        dropdownItems.forEach(function(item) {
            item.addEventListener("click", function(event) {
                event.stopPropagation();
                var selectedText = this.textContent;
                var selectedId = this.getAttribute('data-id');
                var selectedHarga = parseFloat(this.getAttribute('data-harga'));

                if (isNaN(selectedHarga)) {
                    console.error("Harga tidak valid:", this.getAttribute('data-harga'));
                }

                dropdownText.textContent = selectedText;
                dropdown.classList.add("selected");
                dropdown.classList.remove("open");

                var row = this.closest('tr');
                if (row) {
                    row.querySelector('input[name="id_barang[]"]').value = selectedId;
                    row.querySelector('input[name="harga[]"]').value = selectedHarga || 0;
                    row.querySelector('input[name="nama_barang[]"]').value = selectedText;

                    row.querySelector('input[name="jumlah[]"]').focus();

                    updateRowTotal(row.querySelector('input[name="jumlah[]"]'));
                } else {
                    console.error("Baris tidak ditemukan.");
                }

                updateDropdownItems();
            });
        });
    });

    window.addEventListener("click", function() {
        closeAllDropdowns();
    });
}

function closeAllDropdowns() {
    var dropdowns = document.querySelectorAll(".dropdown");
    dropdowns.forEach(function(dropdown) {
        dropdown.classList.remove("open");
    });
}

function updateDropdownItems() {
    var selectedItems = new Set();
    var dropdownTexts = document.querySelectorAll('.dropdown-text');

    dropdownTexts.forEach(function(dropdownText) {
        if (dropdownText.textContent !== 'Pilih Nama Barang') {
            selectedItems.add(dropdownText.textContent);
        }
    });

    var dropdowns = document.querySelectorAll(".dropdown");
    dropdowns.forEach(function(dropdown) {
        var dropdownMenu = dropdown.querySelector(".dropdown-menu");
        var dropdownItems = dropdown.querySelectorAll(".dropdown-item");

        dropdownItems.forEach(function(item) {
            if (selectedItems.has(item.textContent) && dropdown.querySelector('.dropdown-text').textContent !== item.textContent) {
                item.style.display = 'none';
            } else {
                item.style.display = '';
            }
        });
    });
}

function addMultipleRows() {
    var rowCount = parseInt(document.getElementById('jumlah-rows').value) || 1;
    var tableBody = document.getElementById('item-table-body');

    for (var i = 0; i < rowCount; i++) {
        var rowNumber = tableBody.getElementsByTagName('tr').length + 1;
        var newRow = `
            <tr>
                <td>${rowNumber}</td>
                <td>
                    <div class="dropdown" name="nama_barang">
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
                <td><input type="text" name="harga[]" class="validate" oninput="updateRowTotal(this)"></td>
                <td><input type="number" name="jumlah[]" min="1" class="validate" oninput="updateRowTotal(this)"></td>
                <td><input type="text" name="total[]" readonly class="validate"></td>
                <td>
                <a href="#" class="btn-floating white-text waves-effect waves-light red" onclick="removeRow(this)"><i class="material-icons icon-transaksi">delete</i></a>
                </td>
                <input type="hidden" name="id_barang[]" class="id-barang" value="">
                <input type="hidden" name="nama_barang[]" class="nama-barang" value="">                
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    }

    initializeDropdowns();
    updateDropdownItems();
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
    updateDropdownItems();
}

function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

document.addEventListener("DOMContentLoaded", function() {
    addMultipleRows();
});

</script>
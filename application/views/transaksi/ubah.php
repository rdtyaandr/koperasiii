<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Edit Transaksi</h4>
                    <form action="<?= base_url('transaksi/tambah') ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12 m6 l3">
                                <input id="nama" type="text" name="nama" required class="validate">
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
                                            <th>Kode</th>
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
                                            <td><input type="text" name="kode_barang[]" required class="validate"></td>
                                            <td><input type="text" name="nama_barang[]" required class="validate"></td>
                                            <td><input type="number" name="harga[]" step="0.01" required class="validate" oninput="updateRowTotal(this)"></td>
                                            <td><input type="number" name="jumlah[]" min="1" required class="validate" oninput="updateRowTotal(this)"></td>
                                            <td><input type="text" name="total[]" readonly class="validate"></td>
                                            <td>
                                                <a href="#" class="btn-small waves-effect waves-light red" onclick="removeRow(this)"><i class="material-icons">delete</i></a>
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
                                <button type="submit" class="btn waves-effect waves-light green darken-1">Simpan Transaksi</button>
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

    table {
        margin-top: 20px;
        border-radius: 8px;
        overflow: hidden;
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
</style>

<!-- JavaScript for dynamic row addition, removal, and total calculation -->
<script>
    function addRow() {
        const tableBody = document.getElementById('item-table-body');
        const rowCount = tableBody.rows.length;
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type="text" name="kode_barang[]" required class="validate"></td>
            <td><input type="text" name="nama_barang[]" required class="validate"></td>
            <td><input type="number" name="harga[]" step="0.01" required class="validate" oninput="updateRowTotal(this)"></td>
            <td><input type="number" name="jumlah[]" min="1" required class="validate" oninput="updateRowTotal(this)"></td>
            <td><input type="text" name="total[]" readonly class="validate"></td>
            <td>
                <a href="#" class="btn-small waves-effect waves-light red" onclick="removeRow(this)"><i class="material-icons">delete</i></a>
            </td>
        `;
        tableBody.appendChild(newRow);
        updateRowNumbers();
    }

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
        updateRowNumbers();
        updateTotalHarga();
    }

    function updateRowTotal(element) {
        const row = element.closest('tr');
        const harga = parseFloat(row.querySelector('input[name="harga[]"]').value) || 0;
        const jumlah = parseInt(row.querySelector('input[name="jumlah[]"]').value) || 0;
        const total = harga * jumlah;
        row.querySelector('input[name="total[]"]').value = total.toFixed(2);
        updateTotalHarga();
    }

    function updateRowNumbers() {
        const rows = document.querySelectorAll('#item-table-body tr');
        rows.forEach((row, index) => {
            row.cells[0].textContent = index + 1;
        });
    }

    function updateTotalHarga() {
        let totalHarga = 0;
        const totals = document.querySelectorAll('input[name="total[]"]');
        totals.forEach(input => {
            totalHarga += parseFloat(input.value) || 0;
        });
        document.getElementById('total-harga').textContent = totalHarga.toFixed(2);
    }
</script>
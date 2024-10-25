<style>
    .card {
        border-radius: 20px;
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

    .card-action {
        padding: 10px 24px;
    }

    .tooltipped {
        position: relative;
    }

    .btn {
        border-radius: 8px;
    }

    .btn-floating {
        border-radius: 100px !important;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        color: white;
        font-size: 0.9em;
        text-align: center;
    }

    /* Warna yang disesuaikan untuk status-badge */
    .status-badge.red {
        background-color: #e57373;
        /* Merah terang */
    }

    .status-badge.green {
        background-color: #81c784;
        /* Hijau terang */
    }

    .status-badge.default {
        background-color: #bdbdbd;
        /* Abu-abu terang */
    }
</style>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2"
                                style="font-size: 2em; text-align: center; font-weight: bold;">Transaksi</h4>
                        </div>
                        <div class="col s12 left-align" style="position: relative;">
                            <a href="<?= base_url('transaksi/tambah') ?>"
                                class="btn waves-effect waves-light green darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">add</i>Tambah Transaksi
                            </a>
                            <input type="text" id="search" placeholder="Cari" onkeyup="searchTable()" style="border-radius: 25px; padding: 2px 20px; width: 200px; position: absolute; top: -10px; right: 130px; background-color: transparent; border: none; border-bottom: 1px solid #9e9e9e;">
                            <select id="dropdownEntries" onchange="changeEntries()" style="border-radius: 25px; padding: 2px; width: 100px; position: absolute; top: -5px; right: 20px;" class="browser-default">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="">All</option>
                            </select>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Nama <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Cara Bayar <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Tanggal <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(3, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(3, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Total Harga <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(4, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(4, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="transaksiTable">
                            <?php if (!empty($transaksi)): ?>
                                <?php $no = 1;
                                foreach (array_reverse($transaksi) as $t): ?>
                                    <tr>
                                        <td class="center-align"><?= $no++ ?></td>
                                        <td class="center-align"><?= htmlspecialchars($t->username) ?></td>
                                        <td class="center-align">
                                            <?php
                                            // Tentukan kelas badge berdasarkan nilai cara bayar
                                            $badgeClass = ($t->cara_bayar === 'Kredit') ? 'red' :
                                                ($t->cara_bayar === 'Cash' ? 'green' : 'default');
                                            ?>
                                            <div class="status-badge <?= $badgeClass ?>">
                                                <?= htmlspecialchars($t->cara_bayar) ?>
                                            </div>
                                        </td>
                                        <td class="center-align"><?= formatTanggalWaktu($t->created_at) ?></td>
                                        <td class="center-align"><?= htmlspecialchars(number_format($t->total_harga, 0, ',', '.')) ?></td>
                                        <td class="center-align">
                                            <a href="<?= base_url('transaksi/ubah/' . $t->id_transaksi) ?>"
                                                class="btn-floating white-text waves-effect waves-light yellow darken-3 tooltipped"
                                                data-position="top" data-tooltip="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="center-align">Tidak ada data transaksi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="noResults" class="center-align" style="display: none; padding: 10px; background-color: #f2f2f2; color: black; font-size: 1em; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                        Tidak ada transaksi yang ditemukan.
                    </div>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Transaksi: <strong><?= count($transaksi) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sortTable(columnIndex, order) {
        const table = document.querySelector('table tbody');
        const rows = Array.from(table.rows);
        const sortedRows = rows.sort((a, b) => {
            const aValue = getValue(a, columnIndex);
            const bValue = getValue(b, columnIndex);
            return order === 'down' ? aValue - bValue : bValue - aValue; // Mengubah urutan untuk menampilkan yang terbaru di bawah
        });

        // Clear the table and append sorted rows
        table.innerHTML = '';
        sortedRows.forEach(row => table.appendChild(row));

        // Reset arrow colors
        document.querySelectorAll('.arrow').forEach(arrow => {
            arrow.style.color = 'rgba(200, 200, 200, 0.5)';
        });

        // Change color of the clicked arrow
        let clickedArrow = event.target;
        clickedArrow.style.color = 'white';
    }

    function getValue(row, columnIndex) {
        switch (columnIndex) {
            case 1:
                return row.cells[1].innerText.length; // Nama berdasarkan panjang
            case 2:
                return row.cells[2].innerText.length; // Cara Bayar berdasarkan panjang
            case 3:
                // Mengubah format tanggal menjadi timestamp
                const dateString = row.cells[3].innerText; // Format: 24 Oktober 2024, 15:01
                const [datePart, timePart] = dateString.split(', ');
                const [day, monthName, year] = datePart.split(' ');
                const month = getMonthNumber(monthName); // Mengonversi nama bulan ke angka
                const formattedDate = new Date(`${year}-${month}-${day}T${timePart}:00`); // Membuat objek Date
                return formattedDate.getTime(); // Mengembalikan timestamp
            case 4:
                return parseFloat(row.cells[4].innerText.replace(/[^0-9]/g, "")); // Total Harga
            default:
                return '';
        }
    }

    function getMonthNumber(monthName) {
        const months = {
            'Januari': '01',
            'Februari': '02',
            'Maret': '03',
            'April': '04',
            'Mei': '05',
            'Juni': '06',
            'Juli': '07',
            'Agustus': '08',
            'September': '09',
            'Oktober': '10',
            'November': '11',
            'Desember': '12'
        };
        return months[monthName] || '01'; // Default ke Januari jika tidak ditemukan
    }

    function searchTable() {
        const searchInput = document.getElementById("search").value.toLowerCase();
        const table = document.getElementById("transaksiTable");
        const rows = table.getElementsByTagName("tr");
        const entries = document.getElementById("dropdownEntries").value;
        let foundCount = 0;
        let visibleCount = 0;

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            let rowVisible = false;

            for (let j = 0; j < cells.length; j++) {
                if (cells[j]) {
                    const cellValue = cells[j].innerText.toLowerCase();
                    if (cellValue.indexOf(searchInput) > -1) {
                        rowVisible = true;
                        foundCount++;
                        break;
                    }
                }
            }

            // Show or hide row based on search and entries
            if (entries === "" || visibleCount < entries) {
                rows[i].style.display = rowVisible ? "" : "none";
                if (rowVisible) visibleCount++;
            } else {
                rows[i].style.display = "none";
            }
        }

        // Tampilkan pesan jika tidak ada transaksi yang ditemukan
        document.getElementById("noResults").style.display = foundCount === 0 ? "" : "none";
    }

    function changeEntries() {
        const entries = document.getElementById("dropdownEntries").value;
        const table = document.getElementById("transaksiTable");
        const rows = table.getElementsByTagName("tr");
        const totalRows = rows.length;

        for (let i = 1; i < totalRows; i++) {
            rows[i].style.display = (entries === "" || i <= entries) ? "" : "none";
        }

        // Reset search when changing entries
        document.getElementById("search").value = '';
        searchTable();
    }

    document.addEventListener("DOMContentLoaded", function() {
        changeEntries();
    });
</script>
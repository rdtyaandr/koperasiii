<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2"
                                style="font-size: 2em; text-align: center; font-weight: bold;">Pinjaman</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 left-align" style="position: relative;">
                            <a href="<?= base_url('pinjaman/tambah') ?>"
                                class="btn waves-effect waves-light green darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">add</i>Tambah Pinjaman
                            </a>
                            <input type="text" id="search" placeholder="Cari" onkeyup="searchTable()" style="border-radius: 25px; padding: 2px 20px; width: 200px; position: absolute; top: -6px; right: 130px; background-color: transparent; border: none; border-bottom: 1px solid #9e9e9e;">
                            <select id="dropdownEntries" onchange="changeEntries()" style="border-radius: 25px; padding: 2px; width: 100px; position: absolute; top: 0px; right: 20px;" class="browser-default">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="">All</option>
                            </select>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table mt" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <?php if ($this->session->userdata('level') == 'admin'): ?>
                                    <th class="center-align">Username <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'down')">arrow_downward</i>
                                    </span></th>
                                <?php endif; ?>
                                <th class="center-align">Jenis Pinjaman <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Tanggal Pinjaman <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(3, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(3, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Jumlah Pinjaman <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(4, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(4, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Lama Pinjaman <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(5, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(5, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Status <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(6, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(6, 'down')">arrow_downward</i>
                                </span></th>
                                <?php if ($this->session->userdata('level') == 'admin'): ?>
                                    <th class="center-align">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody id="pinjamanTable">
                            <?php if (!empty($pengajuan)): ?>
                                <?php foreach (array_reverse($pengajuan) as $key => $pinjaman): ?>
                                    <tr id="row-<?= $pinjaman['id'] ?>">
                                        <td class="center-align"><?= $key + 1 ?></td>
                                        <?php if ($this->session->userdata('level') == 'admin'): ?>
                                            <td class="center-align"><?= htmlspecialchars($pinjaman['username'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <?php endif; ?>
                                        <td class="center-align"><?= htmlspecialchars($pinjaman['jenis_pinjaman'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="center-align"><?= formatTanggal($pinjaman['tanggal_pinjam']) ?></td>
                                        <td class="center-align"><?= number_format($pinjaman['jumlah_pinjaman'], 0, ',', '.') ?></td>
                                        <td class="center-align"><?= htmlspecialchars($pinjaman['lama_pinjaman'], ENT_QUOTES, 'UTF-8') ?> bulan</td>
                                        <td id="status-<?= $pinjaman['id'] ?>" class="status-cell center-align">
                                            <?php
                                            $status = isset($pinjaman['status']) ? htmlspecialchars($pinjaman['status'], ENT_QUOTES, 'UTF-8') : 'Tidak Diketahui';
                                            $statusClass = '';
                                            switch ($status) {
                                                case 'Telah Disetujui oleh Admin':
                                                    $statusClass = 'green white-text';
                                                    break;
                                                case 'Dibatalkan oleh Admin':
                                                    $statusClass = 'red white-text';
                                                    break;
                                                default:
                                                    $statusClass = 'orange white-text';
                                            }
                                            ?>
                                            <span class="status-badge <?= $statusClass ?>"><?= $status ?></span>
                                        </td>
                                        <?php if ($this->session->userdata('level') == 'admin'): ?>
                                            <td class="center-align">
                                                <a href="<?= base_url('pinjaman/approve/' . $pinjaman['id']) ?>"
                                                    class="btn-floating waves-effect waves-light green tooltipped"
                                                    data-position="top" data-tooltip="Setujui" <?= $pinjaman['status'] === 'Telah Disetujui oleh Admin' ? 'disabled' : '' ?>>
                                                    <i class="material-icons">check</i>
                                                </a>
                                                <a href="<?= base_url('pinjaman/cancel/' . $pinjaman['id']) ?>"
                                                    class="btn-floating waves-effect waves-light orange tooltipped"
                                                    data-position="top" data-tooltip="Batalkan" <?= $pinjaman['status'] === 'Dibatalkan oleh Admin' ? 'disabled' : '' ?>>
                                                    <i class="material-icons">clear</i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="<?= $this->session->userdata('level') == 'admin' ? '8' : '7' ?>"
                                        class="center-align">Tidak ada data pinjaman.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="noResults" class="center-align" style="display: none; padding: 10px; background-color: #f2f2f2; color: black; font-size: 1em; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                        Tidak ada pinjaman yang ditemukan.
                    </div>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Pengajuan: <strong><?= count($pengajuan) ?></strong></p>
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

    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }

    .btn-floating {
        border-radius: 100px !important;
    }

    .tooltipped {
        position: relative;
    }

    .mt {
        margin-top: 15px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .right-align {
        text-align: right;
    }

    .center-align {
        text-align: center;
    }

    /* Styling untuk tombol disabled */
    .btn-floating[disabled] {
        pointer-events: none;
        background-color: #d6d6d6 !important;
        /* Abu-abu terang */
        color: #9e9e9e !important;
        cursor: not-allowed;
        /* Menunjukkan bahwa tombol tidak dapat diklik */
    }

    .btn-floating[disabled] i.material-icons {
        color: #9e9e9e !important;
    }

    .status-cell {
        padding: 5px !important;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        color: white;
        font-size: 0.9em;
        text-align: center;
    }

    /* Badge warna untuk status */
    .status-badge.grey.lighten-2 {
        background-color: #d6d6d6;
        /* Abu-abu terang */
    }

    .status-badge.blue.lighten-2 {
        background-color: #64b5f6;
    }

    .status-badge.green.lighten-2 {
        background-color: #81c784;
    }

    .status-badge.red.lighten-2 {
        background-color: #e57373;
    }

    table tbody tr {
        border-bottom: 1px solid #ddd;
    }
</style>

<!-- JavaScript for initializing Materialize components -->
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
            case 0:
                return parseInt(row.cells[0].innerText); // No
            case 1:
                return row.cells[1].innerText.length; // Username berdasarkan panjang
            case 2:
                return row.cells[2].innerText === 'Konsumtif' ? 1 : 0; // Konsumtif paling atas, Produktif paling bawah
            case 3:
                // Mengubah format tanggal menjadi timestamp
                const dateString = row.cells[3].innerText; // Format: 24 Oktober 2024
                const [day, monthName, year] = dateString.split(' ');
                const month = getMonthNumber(monthName); // Mengonversi nama bulan ke angka
                const formattedDate = new Date(`${year}-${month}-${day}T00:00:00`); // Membuat objek Date
                return formattedDate.getTime(); // Mengembalikan timestamp
            case 4:
                return parseFloat(row.cells[4].innerText.replace(/[^0-9]/g, "")); // Jumlah Pinjaman
            case 5:
                return parseInt(row.cells[5].innerText); // Lama Pinjaman
            case 6:
                return row.cells[6].innerText.length; // Status berdasarkan panjang
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
        const table = document.getElementById("pinjamanTable");
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

        // Tampilkan pesan jika tidak ada pinjaman yang ditemukan
        document.getElementById("noResults").style.display = foundCount === 0 ? "" : "none";
    }

    function changeEntries() {
        const entries = document.getElementById("dropdownEntries").value;
        const table = document.getElementById("pinjamanTable");
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
    document.addEventListener('DOMContentLoaded', function() {
        if (window.performance.navigation.type === 1) {
            // Browser was reloaded (POST data may be present)
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        }
    });
</script>
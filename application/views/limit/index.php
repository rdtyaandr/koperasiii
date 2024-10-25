<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2"
                                style="font-size: 2em; text-align: center; font-weight: bold;">Edit Limit Pengguna</h4>
                        </div>
                        <div class="col s12 left-align" style="position: relative;">
                            <a href="<?= base_url('pengguna') ?>" class="btn waves-effect waves-light green darken-1"
                                style="border-radius: 25px;">
                                <i class="material-icons left">arrow_forward</i>Data Pengguna
                            </a>
                            <input type="text" id="search" placeholder="Cari" onkeyup="searchTable()" style="border-radius: 25px; padding: 2px 20px; width: 200px; position: absolute; top: -11px; right: 130px; background-color: transparent; border: none; border-bottom: 1px solid #9e9e9e;">
                            <select id="dropdownEntries" onchange="changeEntries()" style="border-radius: 25px; padding: 2px; width: 100px; position: absolute; top: -6px; right: 20px;" class="browser-default">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="">All</option>
                            </select>
                        </div>
                    </div>
                    <table class="highlight striped responsive-table mt" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Nama Pengguna <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Sisa Limit <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Total Limit</th>
                                <th class="center-align">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="penggunaTable">
                            <?php if (!empty($Pengguna)): ?>
                                <?php  $no = 1; foreach (array_reverse($Pengguna) as $key => $hitam): ?>
                                    <?php if ($hitam['pengguna_hak_akses'] === 'user'): ?>
                                        <?php
                                        // Menghitung sisa limit
                                        $totalLimit = htmlspecialchars($hitam['limit_total'], ENT_QUOTES, 'UTF-8');
                                        $limitTerpakai = htmlspecialchars($hitam['limit'], ENT_QUOTES, 'UTF-8');
                                        $sisaLimit = $totalLimit - $limitTerpakai;
                                        ?>
                                        <tr>
                                            <td class="center-align"><?= $no++ ?></td>
                                            <td class="center-align"><?= htmlspecialchars($hitam['username'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td class="center-align"><?= number_format($sisaLimit, 0, ',', '.') ?></td>
                                            <td class="center-align">
                                                <div class="limit-control" style="margin-left: 30px;">
                                                    <button type="button" class="limit-btn decrease"
                                                        data-id="<?= $hitam['pengguna_id'] ?>">&#8722;</button>
                                                    <input type="text" name="limit_total"
                                                        value="<?= htmlspecialchars($hitam['limit_total'], ENT_QUOTES, 'UTF-8') ?>"
                                                        class="limit-input" data-id="<?= $hitam['pengguna_id'] ?>">
                                                    <button type="button" class="limit-btn increase"
                                                        data-id="<?= $hitam['pengguna_id'] ?>">&#43;</button>
                                                </div>
                                            </td>
                                            <td class="center-align">
                                                <div class="action-buttons" style="justify-content: center;">
                                                    <form action="<?= base_url('limit/save/' . $hitam['pengguna_id']) ?>"
                                                        method="post" class="limit-form">
                                                        <input type="hidden" name="limit_total" class="limit-input-hidden"
                                                            data-id="<?= $hitam['pengguna_id'] ?>"
                                                            value="<?= htmlspecialchars($hitam['limit_total'], ENT_QUOTES, 'UTF-8') ?>">
                                                        <button type="submit" name="save_limit_total"
                                                            class="btn-floating waves-effect waves-light yellow darken-3 tooltipped"
                                                            data-position="top" data-tooltip="Simpan" style="border-radius: 25px; padding: 20px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="material-icons">save</i>
                                                        </button>
                                                    </form>
                                                    <form action="<?= base_url('limit/reset/' . $hitam['pengguna_id']) ?>"
                                                        method="post" class="limit-form">
                                                        <button type="submit"
                                                            class="btn-floating waves-effect waves-light red tooltipped"
                                                            data-position="top" data-tooltip="Reset Limit"
                                                            style="border-radius: 25px; padding: 20px; display: flex; align-items: center; justify-content: center;" onclick="event.preventDefault(); Swal.fire({
                                                                title: 'Reset Limit?',
                                                                text: 'Apakah Anda yakin ingin mereset limit ini?',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Ya, reset!',
                                                                cancelButtonText: 'Batal'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.querySelector('form[action=\'<?= base_url('limit/reset/' . $hitam['pengguna_id']) ?>\']').submit();
                                                                }
                                                            });">
                                                            <i class="material-icons">refresh</i>
                                                        </button>
                                                    </form>
                                                    <a href="#modalBayarKredit"
                                                        class="btn-floating waves-effect waves-light green tooltipped modal-trigger"
                                                        data-position="top" data-tooltip="Bayar Kredit" style="border-radius: 25px; padding: 20px; display: flex; align-items: center; justify-content: center;"
                                                        onclick="openPaymentModal(<?= $hitam['pengguna_id'] ?>)">
                                                        <i class="material-icons">attach_money</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="center-align">Tidak ada Pengguna yang Terdaftar.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="noResults" class="center-align" style="display: none; padding: 10px; background-color: #f2f2f2; color: black; font-size: 1em; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                        Tidak ada pengguna yang ditemukan.
                    </div>
                </div>
                <div class="card-action right-align">
                    <!-- Any additional actions -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bayar Kredit -->
<div id="modalBayarKredit" class="modal">
    <div class="modal-content">
        <h4>Bayar Kredit</h4>
        <form id="bayarKreditForm" method="post" action="<?= base_url('limit/reduce/') ?>">
            <input type="hidden" id="bayar-kredit-id" name="pengguna_id" value="">
            <div class="input-field">
                <input type="number" id="bayar-kredit-amount" name="amount" class="validate" required min="1">
                <label for="bayar-kredit-amount">Jumlah</label>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" id="bayarKreditSaveButton" class="btn green darken-1">Bayar</button>
        <a href="#!" class="modal-close btn-flat">Batal</a>
    </div>
    </form>
</div>

<style>

    .card-content {
        padding-bottom: 0;
    }

    .card-title {
        font-size: 2em;
        text-align: center;
        font-weight: bold;
    }

    .highlight {
        margin-top: 15px;
    }

    .right-align {
        text-align: right;
    }

    .center-align {
        text-align: center;
    }

    .tooltipped {
        position: relative;
    }

    .btn {
        border-radius: 8px;
    }

    .limit-control {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .limit-btn {
        background-color: #dce4e8;
        /* Abu-abu muda */
        color: black;
        /* Ikon hitam */
        border: none;
        border-radius: 50%;
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5em;
        margin: 0 5px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .limit-btn:hover {
        background-color: #b0bec5;
        /* Abu-abu sedikit lebih gelap saat hover */
        transform: scale(1.1);
    }

    .limit-btn:focus,
    .limit-btn:active {
        background-color: #cfd8dc !important;
        /* Biru saat ditekan */
        transform: scale(0.9);
        outline: none;
        /* Menghapus outline fokus default */
    }

    .limit-input {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 4px;
        width: 120px;
        text-align: center;
        margin: 0 5px;
        font-size: 1em;
        background-color: #f5f5f5;
    }

    .btn-floating .material-icons {
        font-size: 1.5em;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
        /* Ruang antara tombol */
        align-items: center;
    }

    .modal {
        border-radius: 8px;
        max-width: 35%;
    }

    .modal-footer {
        padding: 0 24px 20px;
    }
    table tbody tr {
        border-bottom: 1px solid #ddd;
    }

    td {
        padding: 8px 8px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    function sortTable(columnIndex, order) {
        const table = document.querySelector('table tbody');
        const rows = Array.from(table.querySelectorAll('tr'));

        const sortedRows = rows.sort((a, b) => {
            const aValue = getValue(a, columnIndex);
            const bValue = getValue(b, columnIndex);
            if (typeof aValue === 'string') {
                return order === 'up' ? bValue.length - aValue.length : aValue.length - bValue.length;
            } else {
                return order === 'up' ? bValue - aValue : aValue - bValue;
            }
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
                return row.cells[1].innerText || ''; // Nama Pengguna
            case 2:
                return parseInt(row.cells[2].innerText.replace(/[^0-9]/g, "")); // Sisa Limit
            default:
                return '';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Format all existing limit inputs on page load
        document.querySelectorAll('.limit-input').forEach(input => {
            const value = parseInt(input.value.replace(/[^0-9]/g, ''));
            input.value = formatNumber(value);

            // Add event listener for manual input changes
            input.addEventListener('input', function () {
                let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
                const cursorPosition = this.selectionStart; // Save cursor position
                const oldLength = this.value.length; // Save old length

                this.value = formatNumber(rawValue);

                const newLength = this.value.length; // Get new length
                const diff = newLength - oldLength; // Calculate length difference

                // Restore cursor position
                this.setSelectionRange(cursorPosition + diff, cursorPosition + diff);

                // Update the hidden input value
                document.querySelector(`.limit-input-hidden[data-id="${this.dataset.id}"]`).value = rawValue;
            });
        });

        // Handle click events for increase and decrease buttons
        document.querySelectorAll('.limit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const action = this.classList.contains('increase') ? 'increase' : 'decrease';
                const id = this.getAttribute('data-id');
                const input = document.querySelector(`.limit-input[data-id="${id}"]`);
                let currentValue = parseInt(input.value.replace(/[^0-9]/g, ''));

                const changeAmount = 50000;

                if (action === 'increase') {
                    currentValue += changeAmount;
                } else if (action === 'decrease') {
                    if (currentValue > changeAmount) {
                        currentValue -= changeAmount;
                    }
                }

                // Update the input value and format it
                input.value = formatNumber(currentValue);

                // Update the hidden input value
                document.querySelector(`.limit-input-hidden[data-id="${id}"]`).value = currentValue;
            });
        });

        function formatNumber(num) {
            if (isNaN(num)) return '0';
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    });

    function openPaymentModal(penggunaId) {
        document.getElementById('bayar-kredit-id').value = penggunaId;
        const form = document.getElementById('bayarKreditForm');
        form.action = `<?= base_url('limit/reduce/') ?>${penggunaId}`;
    }

    function searchTable() {
        const searchInput = document.getElementById("search").value.toLowerCase();
        const table = document.getElementById("penggunaTable");
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

        // Tampilkan pesan jika tidak ada pengguna yang ditemukan
        document.getElementById("noResults").style.display = foundCount === 0 ? "" : "none";
    }

    function changeEntries() {
        const entries = document.getElementById("dropdownEntries").value;
        const table = document.getElementById("penggunaTable");
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
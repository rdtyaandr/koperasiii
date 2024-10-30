<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2"
                                style="font-size: 2em; text-align: center; font-weight: bold;">Pengguna</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 left-align" style="position: relative;">
                            <a href="<?= base_url('pengguna/tambah') ?>"
                                class="btn waves-effect waves-light green darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">add</i>Pengguna
                            </a>
                            <a href="<?= base_url('limit') ?>"
                                class="btn waves-effect waves-light blue darken-1" style="border-radius: 25px;">
                                <i class="material-icons left">edit</i>Limit
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
                    <table class="highlight striped responsive-table" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Nama Pengguna <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Email <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(2, 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Satker <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(3, 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(3, 'down')">arrow_downward</i>
                                    </span></th>
                                <?php if ($this->session->userdata('level') != 'operator'): ?>
                                    <th class="center-align">Role <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                            <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(4, 'up')">arrow_upward</i>
                                            <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(4, 'down')">arrow_downward</i>
                                        </span></th>
                                <?php endif; ?>
                                <th class="center-align">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="penggunaTable">
                            <?php if (!empty($Pengguna)): ?>
                                <?php $no = 1;
                                foreach (array_reverse($Pengguna) as $key => $hitam): ?>
                                    <?php if ($this->session->userdata('level') == 'operator' && $hitam['pengguna_hak_akses'] != 'user') continue; ?>
                                    <tr>
                                        <td class="center-align"><?= $no++ ?></td>
                                        <td class="center-align"><?= htmlspecialchars($hitam['username'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="center-align"><?= htmlspecialchars($hitam['email'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="center-align"><?= htmlspecialchars($hitam['satker'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <?php if ($this->session->userdata('level') != 'operator'): ?>
                                            <td class="center-align">
                                                <?php
                                                $role = htmlspecialchars($hitam['pengguna_hak_akses'], ENT_QUOTES, 'UTF-8');
                                                $roleClass = '';

                                                switch ($role) {
                                                    case 'user':
                                                        $roleClass = 'grey lighten-1 white-text'; // Abu-abu
                                                        break;
                                                    case 'operator':
                                                        $roleClass = 'blue lighten-1 white-text'; // Biru
                                                        break;
                                                    case 'admin':
                                                        $roleClass = 'green lighten-1 white-text'; // Hijau
                                                        break;
                                                    default:
                                                        $roleClass = 'grey lighten-3 black-text'; // Default
                                                }
                                                ?>
                                                <span class="role-badge <?= $roleClass ?>"><?= $role ?></span>
                                            </td>
                                        <?php endif; ?>
                                        <td class="center-align">
                                            <?php if ($hitam['pengguna_hak_akses'] == 'user'): ?>
                                                <a href="<?= base_url('pengguna/detail/' . $hitam['pengguna_id']) ?>"
                                                    class="btn-floating waves-effect waves-light blue darken-1 tooltipped"
                                                    data-position="top" data-tooltip="Detail" style="border-radius: 4px;">
                                                    <i class="material-icons">search</i>
                                                </a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('pengguna/ubah/' . $hitam['pengguna_id']) ?>"
                                                class="btn-floating waves-effect waves-light yellow darken-3 tooltipped"
                                                data-position="top" data-tooltip="Edit" style="border-radius: 4px;">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" class="btn-floating waves-effect waves-darken white-text red tooltipped"
                                                data-position="top" data-tooltip="Hapus" style="border-radius: 4px;" onclick="event.preventDefault(); Swal.fire({
                                                title: 'Apakah Anda yakin?',
                                                text: 'Anda tidak akan dapat mengembalikan ini!',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, hapus!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '<?= base_url('pengguna/hapus/' . $hitam['pengguna_id']) ?>';
                                                }
                                            })">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="center-align">Tidak ada Pengguna yang Terdaftar.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="noResults" class="center-align" style="display: none; padding: 10px; background-color: #f2f2f2; color: black; font-size: 1em; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                        Tidak ada pengguna yang ditemukan.
                    </div>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Pengguna: <strong><?= count($Pengguna) ?></strong></p>
                </div>
                <ul class="center-align pagination" id="pagination">
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    .custom-hover {
        position: relative;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .custom-hover::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 100%;
        height: 2px;
        background-color: #1975d1;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .custom-hover:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    .custom-hover:hover {
        color: #1975d1;
    }

    .active-modern {
        background-color: #e0e0e0;
        border-radius: 50%;
    }

    .card-content {
        padding-bottom: 0 !important;
    }

    .card-action {
        padding-top: 5px !important;
        padding-bottom: 0px !important;
    }

    .card-title {
        font-size: 2em;
        text-align: center;
        font-weight: bold;
    }

    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }

    .btn-floating {
        border-radius: 100px !important;
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

    .mt {
        margin-top: 15px;
    }

    .card-panel {
        padding: 6px !important;
    }

    .card.red.lighten-5 {
        background-color: #fbe9e7;
        color: #c62828;
    }

    /* Warna untuk role 'user' (abu-abu terang) */
    .grey.lighten-2 {
        background-color: #d6d6d6 !important;
        color: #ffffff !important;
    }

    /* Warna untuk role 'operator' (biru terang) */
    .blue.lighten-2 {
        background-color: #64b5f6 !important;
        color: #ffffff !important;
    }

    /* Warna untuk role 'admin' (hijau terang) */
    .green.lighten-2 {
        background-color: #81c784 !important;
        color: #ffffff !important;
    }

    /* Warna default untuk role yang tidak dikenali */
    .grey.lighten-4 {
        background-color: #f5f5f5 !important;
        color: #000000 !important;
    }

    /* Style umum untuk badge role */
    .role-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 0.9em;
        text-align: center;
    }

    .limit-not-user {
        color: #b0bec5;
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        transform: skew(-6deg);
        font-style: italic;
    }

    table tbody tr {
        border-bottom: 1px solid #ddd;
    }
</style>
<script>
    function sortTable(columnIndex, order) {
        const table = document.querySelector('table tbody');
        const rows = Array.from(table.rows);
        const sortedRows = rows.sort((a, b) => {
            const aValue = getValue(a, columnIndex);
            const bValue = getValue(b, columnIndex);
            if (typeof aValue === 'string') {
                return order === 'down' ? aValue.length - bValue.length : bValue.length - aValue.length;
            } else {
                return order === 'down' ? aValue - bValue : bValue - aValue;
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
                return row.cells[1].innerText; // Nama Pengguna
            case 2:
                return row.cells[2].innerText; // Email
            case 3:
                return row.cells[3].innerText; // Satker
            case 4:
                return row.cells[4].innerText.length; // Role length
            default:
                return '';
        }
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
        const entries = parseInt(document.getElementById("dropdownEntries").value) || 10;
        const table = document.getElementById("penggunaTable");
        const rows = table.getElementsByTagName("tr");
        const totalRows = rows.length;

        for (let i = 0; i < totalRows; i++) {
            rows[i].style.display = (i < entries) ? "" : "none";
        }

        // Reset search when changing entries
        document.getElementById("search").value = '';
        searchTable();
        updatePagination();
    }

    function updatePagination() {
        const entries = parseInt(document.getElementById("dropdownEntries").value) || 10;
        const table = document.getElementById("penggunaTable");
        const rows = table.getElementsByTagName("tr");
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / entries);
        const pagination = document.getElementById("pagination");
        pagination.innerHTML = '';

        if (totalPages <= 1) {
            return;
        }

        const currentPage = parseInt(pagination.getAttribute('data-current-page')) || 1;

        if (currentPage > 1) {
            const prevLi = document.createElement('li');
            prevLi.classList.add('waves-effect');
            prevLi.innerHTML = `<a href="#!" class="custom-hover" onclick="changePage(${currentPage - 1})"><i class="material-icons">chevron_left</i></a>`;
            pagination.appendChild(prevLi);
        }

        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                const li = document.createElement('li');
                li.classList.add('waves-effect');
                if (i === currentPage) {
                    li.classList.add('active-modern');
                }
                li.innerHTML = `<a href="#!" class="custom-hover" onclick="changePage(${i})">${i}</a>`;
                pagination.appendChild(li);
            } else if (i === currentPage - 2 || i === currentPage + 2) {
                const li = document.createElement('li');
                li.classList.add('waves-effect');
                li.innerHTML = `<a href="#!" class="custom-hover">...</a>`;
                pagination.appendChild(li);
            }
        }

        if (currentPage < totalPages) {
            const nextLi = document.createElement('li');
            nextLi.classList.add('waves-effect');
            nextLi.innerHTML = `<a href="#!" class="custom-hover" onclick="changePage(${currentPage + 1})"><i class="material-icons">chevron_right</i></a>`;
            pagination.appendChild(nextLi);
        }
    }

    function changePage(page) {
        const entries = parseInt(document.getElementById("dropdownEntries").value) || 10;
        const table = document.getElementById("penggunaTable");
        const rows = table.getElementsByTagName("tr");
        const totalRows = rows.length;

        for (let i = 0; i < totalRows; i++) {
            rows[i].style.display = (i >= (page - 1) * entries && i < page * entries) ? "" : "none";
        }

        const pagination = document.getElementById("pagination");
        pagination.setAttribute('data-current-page', page);
        updatePagination();
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
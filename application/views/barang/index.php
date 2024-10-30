<style>
    table tbody tr {
        border-bottom: 1px solid #ddd;
    }

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
</style>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Barang</h4>
                        </div>
                        <div class="col s12 left-align" style="position: relative;">
                            <a href="<?= base_url('barang/tambah') ?>" class="btn waves-effect waves-light green darken-1" style="border-radius: 25px; margin-bottom: 20px;">
                                <i class="material-icons left">add</i>Tambah Barang
                            </a>
                            <a href="<?= base_url('konsinyasi') ?>" class="btn waves-effect waves-light red darken-1" style="border-radius: 25px; margin-bottom: 20px;">
                                <i class="material-icons left">arrow_forward</i>Konsinyasi
                            </a>
                            <a href="<?= base_url('kategori') ?>" class="btn waves-effect waves-light orange darken-1" style="border-radius: 25px; margin-bottom: 20px;">
                                <i class="material-icons left">arrow_forward</i>Kategori
                            </a>
                            <a href="<?= base_url('satuan') ?>" class="btn waves-effect waves-light blue darken-1" style="border-radius: 25px; margin-bottom: 20px;">
                                <i class="material-icons left">arrow_forward</i>Satuan
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
                    <table class="striped highlight responsive-table" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Barcode</th>
                                <th class="center-align">Kategori <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('kategori', 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('kategori', 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Nama Barang <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('nama_barang', 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('nama_barang', 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Stok <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('stok', 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('stok', 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Satuan <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('satuan', 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('satuan', 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Harga Beli <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('harga_beli', 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('harga_beli', 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Harga Jual <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('harga_jual', 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable('harga_jual', 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="barangTable">
                            <?php if (!empty($barang)) : ?>
                                <?php foreach (array_reverse($barang) as $key => $item) : ?>
                                    <tr>
                                        <td class="center-align"><?= $key + 1 ?></td>
                                        <td class="center-align">
                                            <div style="text-align: center;">
                                                <?php if (!empty($item['kode_barang'])) : ?>
                                                    <img src="<?= site_url('BarangController/generate_barcode/' . $item['kode_barang']); ?>" alt="Barcode" style="display: block; margin: 0 auto;" />
                                                    <span style="display: block; font-size: 15px; color: #555; margin-top: 5px;">
                                                        <?= htmlspecialchars($item['kode_barang']); ?>
                                                    </span>
                                                <?php else : ?>
                                                    <span style="color: rgba(128, 128, 128, 0.7); font-style: italic; opacity: 0.7;">Tidak memiliki kode barang</span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="center-align">
                                            <?php
                                            $kategoriNama = '';
                                            foreach ($kategori as $kat) {
                                                if ($kat['id_kategori'] == $item['id_kategori']) {
                                                    $kategoriNama = $kat['nama_kategori'];
                                                    break;
                                                }
                                            }
                                            echo $kategoriNama;
                                            ?>
                                        </td>
                                        <td class="center-align"><?= htmlspecialchars($item['nama_barang']); ?></td>
                                        <td class="center-align"><?= htmlspecialchars($item['stok']); ?></td>
                                        <td class="center-align">
                                            <?php
                                            $satuanNama = '';
                                            foreach ($satuan as $sat) {
                                                if ($sat['id_satuan'] == $item['id_satuan']) {
                                                    $satuanNama = $sat['nama_satuan'];
                                                    break;
                                                }
                                            }
                                            echo $satuanNama;
                                            ?>
                                        </td>
                                        <td class="center-align">Rp. <?= number_format($item['harga_beli'], 0, ',', '.'); ?></td>
                                        <td class="center-align">Rp. <?= number_format($item['harga_jual'], 0, ',', '.'); ?></td>
                                        <td class="center-align">
                                            <a href="<?= base_url('barang/ubah/' . $item['id_barang']) ?>" class="btn yellow darken-2 waves-effect waves-light btn-floating">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" onclick="confirmDelete('<?= base_url('barang/hapus/' . $item['id_barang']) ?>')" class="btn red darken-2 waves-effect waves-light btn-floating">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9" class="center-align">Tidak ada data barang yang tersedia.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="noResults" class="center-align" style="display: none; padding: 10px; background-color: #f2f2f2; color: black; font-size: 1em; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                        Tidak ada barang yang ditemukan.
                    </div>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Barang: <strong><?= count($barang) ?></strong></p>
                </div>
                <ul id="pagination" class="pagination center-align" data-current-page="1"></ul>
            </div>
        </div>
    </div>
</div>

<script>
    function sortTable(column, order) {
        let table = document.getElementById("barangTable");
        let rows = Array.from(table.rows);
        let sortedRows;

        sortedRows = rows.sort((a, b) => {
            let aValue = getValue(a, column);
            let bValue = getValue(b, column);

            if (typeof aValue === 'string' && typeof bValue === 'string') {
                // Menghitung jumlah kemunculan teks
                let aCount = (aValue.match(/./g) || []).length;
                let bCount = (bValue.match(/./g) || []).length;
                return order === 'up' ? bCount - aCount : aCount - bCount;
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

    function getValue(row, column) {
        switch (column) {
            case 'no':
                return parseInt(row.cells[0].innerText);
            case 'kategori':
                return row.cells[2].innerText;
            case 'nama_barang':
                return row.cells[3].innerText;
            case 'stok':
                return parseInt(row.cells[4].innerText);
            case 'satuan':
                return row.cells[5].innerText;
            case 'harga_beli':
                return parseInt(row.cells[6].innerText.replace(/[^0-9]/g, ""));
            case 'harga_jual':
                return parseInt(row.cells[7].innerText.replace(/[^0-9]/g, ""));
            default:
                return '';
        }
    }

    function searchTable() {
        const searchInput = document.getElementById("search").value.toLowerCase();
        const table = document.getElementById("barangTable");
        const rows = table.getElementsByTagName("tr");
        const entries = document.getElementById("dropdownEntries").value;

        let visibleCount = 0;
        let foundCount = 0;

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

        // Tampilkan pesan jika tidak ada barang yang ditemukan
        document.getElementById("noResults").style.display = foundCount === 0 ? "" : "none";
    }

    function changeEntries() {
        const entries = parseInt(document.getElementById("dropdownEntries").value) || 10;
        const table = document.getElementById("barangTable");
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
        const table = document.getElementById("barangTable");
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
        const table = document.getElementById("barangTable");
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

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Satuan</h4>
                    <div class="row">
                        <div class="col s12 left-align" style="position: relative;">
                            <a href="#addSatuanModal" class="btn green darken-1 modal-trigger" style="margin-bottom: 20px; border-radius: 25px;"
                                id="add-modal">
                                <i class="material-icons left">add</i>Tambah Satuan
                            </a>
                            <a href="<?= base_url('barang') ?>" class="btn blue darken-1" style="margin-bottom: 20px; border-radius: 25px;"
                                id="add-modal">
                                <i class="material-icons left">arrow_forward</i>Data Barang
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
                    <table class="striped highlight responsive-table" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Nama Satuan <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'up')">arrow_upward</i>
                                    <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'down')">arrow_downward</i>
                                </span></th>
                                <th class="center-align">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="satuanTable">
                            <?php if (!empty($satuan)): ?>
                                <?php foreach (array_reverse($satuan) as $key => $item): ?>
                                    <tr>
                                        <td class="center-align"><?= $key + 1 ?></td>
                                        <td class="center-align"><?= $item['nama_satuan'] ?></td>
                                        <td class="center-align">
                                            <a href="#editSatuanModal" class="btn-floating yellow darken-3 tooltipped modal-trigger" data-position="top"
                                                data-tooltip="Edit" style="border-radius: 4px;"
                                                onclick="openEditModal('<?= $item['id_satuan'] ?>', '<?= $item['nama_satuan'] ?>')">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" class="btn-floating red tooltipped" data-position="top"
                                                data-tooltip="Hapus" style="border-radius: 4px;" onclick="event.preventDefault(); Swal.fire({
                                                title: 'Apakah Anda yakin?',
                                                text: 'Anda tidak akan dapat mengembalikan ini!',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, hapus!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '<?= base_url('satuan/hapus/' . $item['id_satuan']) ?>';
                                                }
                                            })">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" class="center-align">Tidak ada data satuan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="noResults" class="center-align" style="display: none; padding: 10px; background-color: #f2f2f2; color: black; font-size: 1em; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                        Tidak ada satuan yang ditemukan.
                    </div>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Satuan: <strong><?= count($satuan) ?></strong></p>
                </div>
                <ul id="pagination" class="pagination center-align" data-current-page="1"></ul>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div id="addSatuanModal" class="modal">
    <div class="modal-content">
        <h4 style="font-weight: bold;">Tambah Satuan</h4>
        <form id="addSatuanForm" method="post" action="<?= base_url('satuan/tambah') ?>">
            <div class="input-field">
                <input type="text" id="add-satuan-name" name="nama_satuan" class="validate" required>
                <label for="add-satuan-name">Nama Satuan</label>
                <span class="helper-text" id="add-satuan-error" style="display:none; color:red;">Nama satuan tidak boleh
                    kosong</span>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="addSatuanSaveButton" class="btn green darken-1" style="border-radius: 25px;">Tambah</button>
        <a href="#!" class="modal-close btn-flat" id="closea" style="border-radius: 25px;">Batalkan</a>
    </div>
</div>

<!-- Edit Modal -->
<div id="editSatuanModal" class="modal">
    <div class="modal-content">
        <h4 style="font-weight: bold;">Edit Satuan</h4>
        <form id="editSatuanForm" method="post" action="">
            <input type="hidden" id="edit-satuan-id" name="satuan_id" value="">
            <div class="input-field">
                <input type="text" id="edit-satuan-name" name="nama_satuan" class="validate" required>
                <label for="edit-satuan-name">Nama Satuan</label>
                <span class="helper-text" id="edit-satuan-error" style="display:none; color:red;">Nama satuan tidak
                    boleh kosong</span>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="editSatuanSaveButton" class="btn blue darken-1" style="border-radius: 25px;">Ubah</button>
        <a href="#!" class="modal-close btn-flat" style="border-radius: 25px;">Batalkan</a>
    </div>
</div>

<!-- Native CSS for additional styling -->
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

    .input-field {
        margin-bottom: 20px;
    }

    .card-action {
        padding-top: 5px !important;
        padding-bottom: 0px !important;
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
</style>

<!-- JavaScript for initializing Materialize components -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        M.AutoInit(); // Initialize all Materialize components

        const addModal = M.Modal.init(document.getElementById("addSatuanModal"), {
            dismissible: true, // Allow modal to be closed by clicking outside
            opacity: 0.5 // Set overlay opacity to make the background darker
        });
        const editModal = M.Modal.init(document.getElementById("editSatuanModal"), {
            dismissible: true, // Allow modal to be closed by clicking outside
            opacity: 0.5 // Set overlay opacity to make the background darker
        });
        const addSatuanForm = document.getElementById("addSatuanForm");
        const editSatuanForm = document.getElementById("editSatuanForm");

        const addSatuanSaveButton = document.getElementById("addSatuanSaveButton");
        const editSatuanSaveButton = document.getElementById("editSatuanSaveButton");

        // Event listener for the Add button
        document.getElementById("add-modal").addEventListener("click", function () {
            addModal.open();
        });

        // Event listener for the Save button inside the Add modal
        addSatuanSaveButton.addEventListener("click", function () {
            const satuanNameInput = document.getElementById("add-satuan-name");
            const errorSpan = document.getElementById("add-satuan-error");

            if (satuanNameInput.value.trim() === "") {
                errorSpan.style.display = "inline"; // Show error message
            } else {
                errorSpan.style.display = "none"; // Hide error message
                addSatuanForm.submit(); // Submit form if valid
            }
        });

        // Event listener for the Save button inside the Edit modal
        editSatuanSaveButton.addEventListener("click", function () {
            const satuanNameInput = document.getElementById("edit-satuan-name");
            const errorSpan = document.getElementById("edit-satuan-error");

            if (satuanNameInput.value.trim() === "") {
                errorSpan.style.display = "inline"; // Show error message
            } else {
                errorSpan.style.display = "none"; // Hide error message
                editSatuanForm.submit(); // Submit form if valid
            }
        });

        // Reset form and hide error messages on modal close
        document.querySelectorAll('.modal').forEach(modal => {
            M.Modal.getInstance(modal).options.onCloseEnd = function () {
                addSatuanForm.reset();
                editSatuanForm.reset();
                document.getElementById("add-satuan-error").style.display = "none";
                document.getElementById("edit-satuan-error").style.display = "none";
            };
        });
    });

    function openEditModal(id_satuan, nama_satuan) {
        document.getElementById('edit-satuan-id').value = id_satuan;
        document.getElementById('edit-satuan-name').value = nama_satuan;
        M.updateTextFields();
        document.getElementById('editSatuanForm').action = "<?= base_url('satuan/ubah/') ?>" + id_satuan;
        var modal = M.Modal.getInstance(document.getElementById('editSatuanModal'));
        modal.open();
    }

    function sortTable(columnIndex, order) {
        const table = document.querySelector('table tbody');
        const rows = Array.from(table.rows);
        const sortedRows = rows.sort((a, b) => {
            const aValue = a.cells[columnIndex].innerText;
            const bValue = b.cells[columnIndex].innerText;
            return order === 'up' ? bValue.length - aValue.length : aValue.length - bValue.length;
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

    function searchTable() {
        const searchInput = document.getElementById("search").value.toLowerCase();
        const entries = document.getElementById("dropdownEntries").value;
        const table = document.getElementById("satuanTable");
        const rows = table.getElementsByTagName("tr");
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

        // Tampilkan pesan jika tidak ada satuan yang ditemukan
        document.getElementById("noResults").style.display = foundCount === 0 ? "" : "none";
        updatePagination();
    }

    function changeEntries() {
        const entries = document.getElementById("dropdownEntries").value;
        const table = document.getElementById("satuanTable");
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
        const table = document.getElementById("satuanTable");
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
        const table = document.getElementById("satuanTable");
        const rows = table.getElementsByTagName("tr");
        const totalRows = rows.length;

        for (let i = 0; i < totalRows; i++) {
            rows[i].style.display = (i >= (page - 1) * entries && i < page * entries) ? "" : "none";
        }

        const pagination = document.getElementById("pagination");
        pagination.setAttribute('data-current-page', page);
        updatePagination();
    }

    document.addEventListener('DOMContentLoaded', function() {
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

    $(document).ready(function () {
        $('#editSatuanSaveButton').on('click', function () {
            // Validasi input
            if ($('#edit-satuan-name').val().trim() === '') {
                $('#edit-satuan-error').show(); // Tampilkan pesan kesalahan jika nama satuan kosong
            } else {
                $('#edit-satuan-error').hide(); // Sembunyikan pesan kesalahan jika nama satuan valid
                $('#editSatuanForm').submit(); // Kirim formulir jika valid
            }
        });
    });
</script>
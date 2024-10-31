<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Kategori</h4>
                    <div class="row">
                        <div class="col s12 left-align" style="position: relative;">
                            <a href="#addCategoryModal" class="btn green darken-1 modal-trigger" style="margin-bottom: 20px; border-radius: 25px;" id="add-modal">
                                <i class="material-icons left">add</i>Tambah Kategori
                            </a>
                            <a href="<?= base_url('barang') ?>" class="btn blue darken-1" style="margin-bottom: 20px; border-radius: 25px;" id="add-modal">
                                <i class="material-icons left">arrow_forward</i>Data Barang
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
                    <table class="striped highlight responsive-table" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Nama Kategori <span style="vertical-align: middle; display: inline-block; line-height: 1;">
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'up')">arrow_upward</i>
                                        <i class="material-icons arrow" style="font-size: 16px; color: rgba(200, 200, 200, 0.5);" onclick="sortTable(1, 'down')">arrow_downward</i>
                                    </span></th>
                                <th class="center-align">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="kategoriTable">
                            <?php if (!empty($kategori)) : ?>
                                <?php foreach (array_reverse($kategori) as $key => $item) : ?>
                                    <tr>
                                        <td class="center-align"><?= $key + 1 ?></td>
                                        <td class="center-align"><?= $item['nama_kategori'] ?></td>
                                        <td class="center-align">
                                            <a href="#editCategoryModal" class="btn-floating yellow darken-3 tooltipped modal-trigger" data-position="top" data-tooltip="Edit" style="border-radius: 4px;" onclick="openEditModal('<?= $item['id_kategori'] ?>', '<?= $item['nama_kategori'] ?>')">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" class="btn-floating red tooltipped" data-position="top" data-tooltip="Hapus" style="border-radius: 4px;" onclick="event.preventDefault(); Swal.fire({
                                                title: 'Apakah Anda yakin?',
                                                text: 'Anda tidak akan dapat mengembalikan ini!',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, hapus!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '<?= base_url('kategori/hapus/' . $item['id_kategori']) ?>';
                                                }
                                            })">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="10" class="center-align">Tidak ada data kategori.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="noResults" class="center-align" style="display: none; padding: 10px; background-color: #f2f2f2; color: black; font-size: 1em; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                        Tidak ada kategori yang ditemukan.
                    </div>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Kategori: <strong><?= count($kategori) ?></strong></p>
                </div>
                <ul id="pagination" class="pagination center-align" data-current-page="1"></ul>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div id="addCategoryModal" class="modal">
    <div class="modal-content">
        <h4 style="font-weight: bold;">Tambah Kategori</h4>
        <form id="addCategoryForm" method="post" action="<?= base_url('kategori/tambah') ?>">
            <div class="input-field">
                <input type="text" id="add-category-name" name="nama_kategori" class="validate" required>
                <label for="add-category-name">Nama Kategori</label>
                <span class="helper-text" id="add-category-error" style="display:none; color:red;">Nama kategori tidak boleh kosong</span>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="addCategorySaveButton" class="btn green darken-1" style="border-radius: 25px;">Tambah</button>
        <a href="#!" class="modal-close btn-flat">Batalkan</a>
    </div>
</div>

<!-- Edit Modal -->
<div id="editCategoryModal" class="modal">
    <div class="modal-content">
        <h4 style="font-weight: bold;">Edit Kategori</h4>
        <form id="editCategoryForm" method="post" action="">
            <input type="hidden" id="edit-category-id" name="category_id" value="">
            <div class="input-field">
                <input type="text" id="edit-category-name" name="nama_kategori" class="validate" required>
                <label for="edit-category-name">Nama Kategori</label>
                <span class="helper-text" id="edit-category-error" style="display:none; color:red;">Nama kategori tidak boleh kosong</span>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="editCategorySaveButton" class="btn blue darken-1" style="border-radius: 25px;">Ubah</button>
        <a href="#!" class="modal-close btn-flat">Batalkan</a>
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

    .card-action {
        padding-top: 5px !important;
        padding-bottom: 0px !important;
    }

    .input-field {
        margin-bottom: 20px;
    }

    .btn {
        border-radius: 8px;
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
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit(); // Initialize all Materialize components

        const addModal = M.Modal.init(document.getElementById("addCategoryModal"));
        const editModal = M.Modal.init(document.getElementById("editCategoryModal"));
        const addCategoryForm = document.getElementById("addCategoryForm");
        const editCategoryForm = document.getElementById("editCategoryForm");

        const addCategorySaveButton = document.getElementById("addCategorySaveButton");
        const editCategorySaveButton = document.getElementById("editCategorySaveButton");

        // Event listener for the Add button
        document.getElementById("add-modal").addEventListener("click", function() {
            addModal.open();
        });

        // Event listener for the Save button inside the Add modal
        addCategorySaveButton.addEventListener("click", function() {
            const categoryNameInput = document.getElementById("add-category-name");
            const errorSpan = document.getElementById("add-category-error");

            if (categoryNameInput.value.trim() === "") {
                errorSpan.style.display = "inline"; // Show error message
            } else {
                errorSpan.style.display = "none"; // Hide error message
                addCategoryForm.submit(); // Submit form if valid
            }
        });

        // Event listener for the Save button inside the Edit modal
        editCategorySaveButton.addEventListener("click", function() {
            const categoryNameInput = document.getElementById("edit-category-name");
            const errorSpan = document.getElementById("edit-category-error");

            if (categoryNameInput.value.trim() === "") {
                errorSpan.style.display = "inline"; // Show error message
            } else {
                errorSpan.style.display = "none"; // Hide error message
                editCategoryForm.submit(); // Submit form if valid
            }
        });

        // Reset form and hide error messages on modal close
        document.querySelectorAll('.modal').forEach(modal => {
            M.Modal.getInstance(modal).options.onCloseEnd = function() {
                addCategoryForm.reset();
                editCategoryForm.reset();
                document.getElementById("add-category-error").style.display = "none";
                document.getElementById("edit-category-error").style.display = "none";
            };
        });
    });

    function openEditModal(id_kategori, nama_kategori) {
        document.getElementById('edit-category-id').value = id_kategori;
        document.getElementById('edit-category-name').value = nama_kategori;
        M.updateTextFields();
        document.getElementById('editCategoryForm').action = "<?= base_url('kategori/ubah/') ?>" + id_kategori;
        var modal = M.Modal.getInstance(document.getElementById('editCategoryModal'));
        modal.open();
    }

    function sortTable(columnIndex, order) {
        const table = document.querySelector('table tbody');
        const rows = Array.from(table.rows);
        const sortedRows = rows.sort((a, b) => {
            const aValue = getValue(a, columnIndex);
            const bValue = getValue(b, columnIndex);
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

    function getValue(row, columnIndex) {
        switch (columnIndex) {
            case 1:
                return row.cells[1].innerText; // Nama Kategori
            default:
                return '';
        }
    }

    function searchTable() {
        const searchInput = document.getElementById("search").value.toLowerCase();
        const table = document.getElementById("kategoriTable");
        const rows = table.getElementsByTagName("tr");
        const entries = parseInt(document.getElementById("dropdownEntries").value) || 10;
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

        // Tampilkan pesan jika tidak ada kategori yang ditemukan
        document.getElementById("noResults").style.display = foundCount === 0 ? "" : "none";
    }

    function changeEntries() {
        const entries = parseInt(document.getElementById("dropdownEntries").value) || 10;
        const table = document.getElementById("kategoriTable");
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
        const table = document.getElementById("kategoriTable");
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
        const table = document.getElementById("kategoriTable");
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

    $(document).ready(function() {
        $('#editCategorySaveButton').on('click', function() {
            // Validasi input
            if ($('#edit-category-name').val().trim() === '') {
                $('#edit-category-error').show();
            } else {
                $('#edit-category-error').hide();
                $('#editCategoryForm').submit();
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
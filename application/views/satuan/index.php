<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">
                        Data Satuan</h4>
                    <div class="row">
                        <div class="col s12">
                            <a href="#addSatuanModal" class="btn green darken-1 modal-trigger" style="margin-bottom: 20px;"
                                id="add-modal">
                                <i class="material-icons left">add</i>Tambah Satuan
                            </a>
                            <a href="<?= base_url('barang') ?>" class="btn blue darken-1" style="margin-bottom: 20px;"
                                id="add-modal">
                                <i class="material-icons left">arrow_forward</i>Data Barang
                            </a>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th>No</th>
                                <th>Nama Satuan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($satuan)): ?>
                                <?php foreach (array_reverse($satuan) as $key => $item): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $item['nama_satuan'] ?></td>
                                        <td>
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
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Satuan: <strong><?= count($satuan) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div id="addSatuanModal" class="modal">
    <div class="modal-content">
        <h4>Add Satuan</h4>
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
        <button type="button" id="addSatuanSaveButton" class="btn green darken-1">Tambah</button>
        <a href="#!" class="modal-close btn-flat" id="closea">Cancel</a>
    </div>
</div>

<!-- Edit Modal -->
<div id="editSatuanModal" class="modal">
    <div class="modal-content">
        <h4>Edit Satuan</h4>
        <form id="editSatuanForm" method="post" action="">
            <input type="hidden" id="edit-satuan-id" name="satuan_id" value="">
            <div class="input-field">
                <input type="text" id="edit-satuan-name" name="nama_satuan" class="validate" required>
                <label for="edit-satuan-name">Nama Satuan</label>
                <span class="helper-text" id="edit-satuan-error" style="display:none; color:red;">Nama satuan tidak
                    boleh kosong</span>
            </div>
            <div class="modal-footer">
                <button type="button" id="editSatuanSaveButton" class="btn blue darken-1">Simpan</button>
                <a href="#!" class="modal-close btn-flat">Cancel</a>
            </div>
        </form>
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

    .card-action {
        padding: 10px 24px;
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

    document.addEventListener('DOMContentLoaded', function () {
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<style>
    .container {
        display: flex;
        gap: 20px;
        width: 95%;
        max-width: 1200px;
        margin-top: 15px;
    }

    .card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        padding: 25px;
        flex: 1;
    }

    .card-title {
        font-size: 1.8em;
        font-weight: 600 !important;
        margin-bottom: 20px;
        color: #1975d1;
        text-align: center;
        border-bottom: 2px solid #eaeff3;
        padding-bottom: 15px;
    }

    .profile-photo {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 15px;
    }

    .profile-photo img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .profile-photo:hover img {
        transform: scale(1.05);
    }

    .profile-photo img.darkened {
        filter: brightness(50%);
    }

    .delete-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -100%);
        color: white;
        font-size: 48px;
        opacity: 0;
        visibility: hidden;
        cursor: pointer;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .delete-icon.visible {
        opacity: 1;
        visibility: visible;
    }


    .profile-photo a {
        text-decoration: none;
        color: #3498db;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 15px;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .profile-photo a:hover {
        color: #2980b9;
    }

    .profile-details {
        text-align: center;
    }

    .profile-details .name {
        font-size: 1.4em;
        font-weight: 500;
        color: #2c3e50;
    }

    .profile-details .username {
        font-size: 1.1em;
        color: #7f8c8d;
        margin-top: 8px;
    }

    .profile-details .limit {
        font-size: 1.1em;
        color: #7f8c8d;
        margin-top: 4px;
    }

    .input-field {
        position: relative;
    }

    .input-field label {
        font-size: 1em;
        color: #95a5a6;
        margin-bottom: 5px;
        display: block;
        font-weight: 500;
    }

    .input-field input {
        width: 100%;
        padding: 12px 15px;
        font-size: 1em;
        color: #34495e;
        border: 1px solid #dcdfe3;
        border-radius: 8px;
        box-sizing: border-box;
        transition: border 0.3s ease;
    }

    .input-field input:focus {
        border-color: #3498db !important;
        outline: none;
    }

    .password-wrapper {
        position: relative;
    }

    .password-wrapper .toggle-password {
        position: absolute;
        right: 15px;
        top: 35%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #7f8c8d;
    }

    .card-button {
        display: inline-block;
        background-color: #3498db;
        color: #fff;
        font-size: 1em;
        font-weight: 500;
        padding: 12px 20px;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-button:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card-button:active {
        background-color: #1f6db2;
    }

    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        z-index: 1000;
        /* Pastikan z-index cukup tinggi */
    }

    .popup-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .popup {
        background-color: #fff;
        border-radius: 12px;
        padding: 30px;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transform: scale(0.7);
        transition: transform 0.3s ease;
    }

    .popup-overlay.active .popup {
        transform: scale(1);
    }

    .popup-title {
        font-size: 1.6em;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    .popup input[type="file"] {
        display: block;
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .popup-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .popup-button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease;
    }

    .popup-button:hover {
        background-color: #2980b9;
    }

    .popup-button.cancel {
        background-color: #95a5a6;
    }

    .popup-button.cancel:hover {
        background-color: #7f8c8d;
    }

    /* Nonaktifkan scroll pada body saat popup muncul */
    body.no-scroll {
        overflow: hidden;
    }
</style>

<div class="container" style="margin-top: 20px;">
    <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 30px;">
        <div class="card-title">Profil</div>
        <div class="profile-photo">
            <?php $profile_picture = !empty($pengguna['profile_picture']) ? $pengguna['profile_picture'] : 'default.png'; ?>
            <img src="<?php echo base_url('assets/upload/profile_picture/' . $profile_picture); ?>" alt="Profile Photo"
                id="profileImage">
            <span class="material-icons delete-icon" id="deleteIcon">delete</span>
            <a href="#" id="edit-photo" style="margin-top: 30px;">
                <span class="material-icons">camera_alt</span> Edit Foto
            </a>
        </div>
        <div class="profile-details">
            <div class="name"><?php echo htmlspecialchars($pengguna['nama_lengkap']); ?></div>
            <div class="username">@<?php echo htmlspecialchars($pengguna['username']); ?></div>
            <?php if ($this->session->userdata('level') == 'user'): ?>
                <div class="limit">Sisa limit: <?php echo number_format($sisa, 0, ',', '.'); ?></div>
                <?php elseif ($this->session->userdata('level') != 'user'): ?>
                    <div class="limit">Satker: <?php echo htmlspecialchars($pengguna['satker']); ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 30px;">
        <div class="card-title">Detail Akun</div>
        <form id="profileForm" action="<?php echo base_url('profile/update'); ?>" method="POST">
            <div class="input-field" style="margin-top: 40px;">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap"
                    value="<?php echo htmlspecialchars($pengguna['nama_lengkap']); ?>">
            </div>
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"
                    value="<?php echo htmlspecialchars($pengguna['username']); ?>" disabled>
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($pengguna['email']); ?>">
            </div>
            <div class="input-field">
                <label for="satker">Satker</label>
                <input type="text" id="satker" name="satker"
                    value="<?php echo htmlspecialchars($pengguna['satker']); ?>" disabled>
                    
            </div>
            <div class="input-field">
                <div class="password-wrapper">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                        value="">
                    <span class="material-icons toggle-password" onclick="togglePassword()">visibility_off</span>
                </div>
            </div>
            <button type="submit" class="card-button right">Simpan Perubahan</button>
        </form>
    </div>
</div>

<!-- Popup HTML -->
<div id="popupOverlay" class="popup-overlay">
    <div class="popup">
        <div class="popup-title">Upload Foto Profil</div>
        <form id="uploadForm" action="<?php echo base_url('profile/image'); ?>" method="POST"
            enctype="multipart/form-data">
            <input type="file" id="profileImage" name="file" accept="image/*">
            <div class="popup-buttons">
                <button id="cancelButton" type="button" class="popup-button cancel">Batal</button>
                <button id="uploadButton" type="submit" class="popup-button">Upload</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* CSS untuk tombol konfirmasi di SweetAlert */
    .swal2-confirm.btn-danger {
        background-color: #e53935;
        /* Warna merah lebih terang */
        border-color: #e53935;
        /* Warna border merah lebih terang */
        color: #fff;
        /* Warna teks putih */
    }

    .swal2-confirm.btn-danger:hover {
        background-color: #c62828;
        /* Warna merah gelap saat hover */
        border-color: #b71c1c;
        /* Warna border merah gelap saat hover */
    }

    /* CSS untuk tombol OK di SweetAlert */
    .swal2-confirm.btn-success {
        background-color: #3599db;
        /* Warna biru yang ditentukan */
        border-color: #3599db;
        /* Warna border biru yang ditentukan */
        color: #fff;
        /* Warna teks putih */
    }

    .swal2-confirm.btn-success:hover {
        background-color: #1e88e5;
        /* Warna biru gelap saat hover */
        border-color: #1976d2;
        /* Warna border biru gelap saat hover */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const profileImage = document.getElementById('profileImage');
    const deleteIcon = document.getElementById('deleteIcon');
    let hoverTimeout;

    profileImage.addEventListener('mouseover', function () {
        hoverTimeout = setTimeout(() => {
            profileImage.classList.add('darkened');
            deleteIcon.classList.add('visible');
        }, 1000); // 1 detik delay
    });

    profileImage.addEventListener('mouseout', function () {
        clearTimeout(hoverTimeout); // Hapus timeout jika mouse keluar sebelum delay selesai
        if (!deleteIcon.matches(':hover')) {
            // Hanya reset jika mouse tidak berada di atas ikon delete
            profileImage.classList.remove('darkened');
            deleteIcon.classList.remove('visible');
        }
    });

    deleteIcon.addEventListener('mouseover', function () {
        clearTimeout(hoverTimeout); // Hapus timeout jika mouse berada di atas ikon delete
        profileImage.classList.add('darkened');
        deleteIcon.classList.add('visible');
    });

    deleteIcon.addEventListener('mouseout', function () {
        // Jangan reset jika mouse berada di area gambar atau ikon delete
        if (!profileImage.matches(':hover') && !deleteIcon.matches(':hover')) {
            profileImage.classList.remove('darkened');
            deleteIcon.classList.remove('visible');
        }
    });

    profileImage.addEventListener('click', function () {
        if (deleteIcon.classList.contains('visible')) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus foto ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn-danger', // Kelas untuk tombol konfirmasi
                    cancelButton: 'btn-secondary' // Kelas untuk tombol batal (opsional, jika ingin mengubah warna tombol batal)
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX untuk menghapus foto
                    fetch('<?= base_url('profile/delete_picture') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest' // Menandakan bahwa ini adalah permintaan AJAX
                        },
                        body: new URLSearchParams({
                            'csrf_test_name': '<?= $this->security->get_csrf_hash() ?>' // CSRF token
                        })
                    })
                }
                location.reload();
            });
        }
    });

    deleteIcon.addEventListener('click', function () {
        if (deleteIcon.classList.contains('visible')) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus foto ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn-danger', // Kelas untuk tombol konfirmasi
                    cancelButton: 'btn-secondary' // Kelas untuk tombol batal (opsional, jika ingin mengubah warna tombol batal)
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX untuk menghapus foto
                    fetch('<?= base_url('profile/delete_picture') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest' // Menandakan bahwa ini adalah permintaan AJAX
                        },
                        body: new URLSearchParams({
                            'csrf_test_name': '<?= $this->security->get_csrf_hash() ?>' // CSRF token
                        })
                    })
                }
                location.reload();
            });
        }
    });


</script>

<script>
    document.getElementById('edit-photo').addEventListener('click', function (event) {
        event.preventDefault();
        showPopup();
    });

    function showPopup() {
        const popupOverlay = document.getElementById('popupOverlay');
        popupOverlay.classList.add('active');
        document.body.classList.add('no-scroll'); // Nonaktifkan scroll pada body
    }

    function hidePopup() {
        const popupOverlay = document.getElementById('popupOverlay');
        popupOverlay.classList.remove('active');
        document.body.classList.remove('no-scroll'); // Aktifkan kembali scroll pada body
    }

    document.getElementById('cancelButton').addEventListener('click', function () {
        hidePopup();
    });

    document.getElementById('uploadButton').addEventListener('click', function (event) {
        const fileInput = document.getElementById('profileImage');
        const file = fileInput.files[0];
        if (!file) {
            event.preventDefault(); // Cegah pengiriman form jika file belum dipilih
            Swal.fire({
                icon: 'warning',
                title: 'Tidak ada file dipilih',
                text: 'Silakan pilih file gambar terlebih dahulu!',
                confirmButtonText: 'OK'
            });
        }
    });

    document.getElementById('popupOverlay').addEventListener('click', function (event) {
        if (event.target === this) {
            hidePopup();
        }
    });

    function togglePassword() {
        var passwordInput = document.getElementById('password');
        var toggleIcon = document.querySelector('.toggle-password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.textContent = 'visibility';
        } else {
            passwordInput.type = 'password';
            toggleIcon.textContent = 'visibility_off';
        }
    }
</script>
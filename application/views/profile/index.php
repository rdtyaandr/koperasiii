<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .card-profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .card .card-image img {
            height: 250px;
            object-fit: cover;
        }

        .tabs .tab a {
            color: #26a69a;
        }

        .tabs .tab a.active {
            background-color: #26a69a;
            color: white;
        }

        .edit-form {
            display: none;
            position: fixed;
            top: 0;
            right: -430px;
            /* Mulai dari luar tampilan */
            width: 430px;
            /* Memperbesar lebar form */
            padding: 20px;
            border-left: 1px solid #ddd;
            background-color: #fff;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Menambahkan bayangan */
            transition: right 0.5s ease;
            /* Animasi slide */
        }

        .container {
            display: flex;
            position: relative;
        }

        .profile-card-container {
            flex: 1;
            /* Profil card mengambil sisa ruang */
        }

        .edit-form-container {
            flex: 0 0 430px;
            /* Lebar tetap untuk form edit */
        }

        .btn-edit {
            margin-top: 20px;
        }

        .edit-form .input-field input,
        .edit-form .input-field label {
            width: 100%;
            /* Memperbesar lebar input */
        }

        .edit-form .btn {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-card-container">
            <div class="row">
                <div class="col s12 m8 l8">
                    <div id="profile-card" class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?= base_url('assets/images/office.jpg') ?>" alt="user bg">
                        </div>
                        <div class="card-content">
                            <img src="<?= base_url('assets/upload/dokumen/' . $pengguna['pengguna_picture']) ?>" alt=""
                                class="circle responsive-img activator card-profile-image">
                            <span
                                class="card-title activator grey-text text-darken-4"><?= $pengguna['nama_lengkap'] ?></span>
                            <p class="grey-text"><i class="mdi-action-perm-identity"></i> <?= $pengguna['username'] ?>
                            </p>
                            <p class="grey-text"><i class="mdi-action-store"></i> <?= $pengguna['satker'] ?></p>
                            <p class="grey-text"><i class="mdi-communication-email"></i> <?= $pengguna['email'] ?></p>
                            <p class="grey-text">
                                <i class="mdi-action-date-range"></i> Bergabung sejak:
                                <?= formatTanggall($pengguna['pengguna_date_created']) ?>
                            </p>
                            <p class="grey-text">
                                <i class="mdi-action-date-range"></i> Diperbarui Pada:
                                <?= formatTanggall($pengguna['pengguna_date_update']) ?>
                            </p>
                            <button class="btn waves-effect waves-light btn-edit"
                                onclick="toggleEditForm()">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="edit-form">
            <h5>Edit Profil</h5>
            <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <input type="text" name="nama_lengkap" value="<?= $pengguna['nama_lengkap'] ?>" required>
                    <label>Nama Lengkap</label>
                </div>
                <div class="input-field">
                    <input type="text" name="username" value="<?= $pengguna['username'] ?>" required>
                    <label>Username</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" value="<?= $pengguna['email'] ?>" required>
                    <label>Email</label>
                </div>
                <div class="input-field">
                    <input type="text" name="satker" value="<?= $pengguna['satker'] ?>" required>
                    <label>SATKER</label>
                </div>
                <div class="input-field">
                    <input type="file" name="profile_picture">
                    <label>Foto Profil</label>
                </div>
                <button type="submit" class="btn waves-effect waves-light">Simpan</button>
                <button type="button" class="btn waves-effect waves-light" onclick="toggleEditForm()">Batal</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function toggleEditForm() {
            var form = document.querySelector('.edit-form');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                form.style.right = '0'; // Menggeser form ke dalam tampilan
            } else {
                form.style.right = '-430px'; // Menggeser form keluar tampilan
                setTimeout(function () {
                    form.style.display = 'none'; // Menyembunyikan form setelah animasi selesai
                }, 500); // Durasi animasi
            }
        }
    </script>
</body>

</html>
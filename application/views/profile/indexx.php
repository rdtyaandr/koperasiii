<!-- Link Materialize CSS -->
<link href="<?= base_url() ?>material/css/materialize.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>material/css/account.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container">
    <h4 class="mt-4">Detail Akun</h4>

    <?php if ($this->session->flashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('success'); ?>',
                text: 'Perubahan telah berhasil disimpan!',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('no_change')): ?>
        <script>
            Swal.fire({
                icon: 'question',
                title: '<?= $this->session->flashdata('no_change'); ?>',
                text: 'Mohon lakukan perubahan terlebih dahulu.',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_message')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: '<?= strip_tags($this->session->flashdata('error_message')); ?>',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    <?php endif; ?>

    <div class="row">
        <!-- Profile Card -->
        <div class="col s12 m4">
            <div class="card hoverable">
                <div class="card-image">
                    <img class="circle responsive-img"
                        src="<?= base_url($profile_picture ? $profile_picture : 'material/image/user.jpg') ?>"
                        alt="Profile Picture" style="width: 150px; margin: 20px auto;">
                    <span class="card-title"><?= $this->session->userdata('nama_lengkap'); ?></span>
                </div>
                <div class="card-content center">
                    <p><?= $this->session->userdata('username'); ?></p>
                    <a class="btn-flat blue-text modal-trigger" href="#editProfileModal">
                        <i class="material-icons left">camera_alt</i>Edit Foto
                    </a>
                </div>
            </div>
        </div>

        <!-- Account Details Form -->
        <div class="col s12 m8">
            <div class="card hoverable">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons left">settings</i>Detail Akun
                    </span>
                    <form action="<?= base_url('dashboard/update_account') ?>" method="post">
                        <div class="input-field">
                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                value="<?= $this->session->userdata('nama_lengkap'); ?>" readonly
                                onclick="resetPasswordFields()">
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="username" name="username" value="<?= set_value('username', $username); ?>"
                                class="<?= (form_error('username') != '') ? 'invalid' : '' ?>"
                                onclick="resetPasswordFields()">
                            <label for="username">Username</label>
                            <span class="helper-text" data-error="<?= form_error('username'); ?>"></span>
                        </div>
                        <div class="input-field" id="password-group">
                            <input type="password" id="password" name="password"
                                class="<?= (form_error('password') != '') ? 'invalid' : '' ?>"
                                placeholder="Kosongkan jika tidak ingin mengubah password"
                                onclick="showPasswordFields()">
                            <label for="password">Password</label>
                            <span class="helper-text" data-error="<?= form_error('password'); ?>"></span>
                        </div>
                        <div id="newPasswordFields" style="display: none;">
                            <div class="input-field">
                                <input type="password" id="new_password" name="new_password"
                                    class="<?= (form_error('new_password') != '') ? 'invalid' : '' ?>"
                                    placeholder="Ketik password baru anda disini">
                                <label for="new_password">Masukkan password baru</label>
                                <span class="helper-text" data-error="<?= form_error('new_password'); ?>"></span>
                            </div>
                            <div class="input-field">
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="<?= (form_error('confirm_password') != '') ? 'invalid' : '' ?>"
                                    placeholder="Ketik ulang password baru anda disini">
                                <label for="confirm_password">Masukkan ulang password baru</label>
                                <span class="helper-text" data-error="<?= form_error('confirm_password'); ?>"></span>
                            </div>
                        </div>
                        <button type="submit" class="btn blue right">
                            <i class="material-icons left">save</i>Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Foto Profile -->
<div id="editProfileModal" class="modal">
    <div class="modal-content">
        <h5><i class="material-icons left">camera_alt</i>Edit Foto Profil</h5>
        <form action="<?= base_url('dashboard/upload_profile_picture') ?>" method="post" enctype="multipart/form-data">
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" id="file-upload" name="file-upload" accept="image/*" />
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn blue">
                    <i class="material-icons left">save</i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url() ?>material/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <!-- Materialize CSS -->
    <!-- Custom Styles -->
    <style>
        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .input-field input:focus+label {
            color: #26a69a !important;
        }

        .input-field input:focus {
            border-bottom: 1px solid #26a69a !important;
            box-shadow: 0 1px 0 0 #26a69a !important;
        }

        .btn:hover {
            background-color: #2e7d32 !important;
        }

        .tooltipped {
            cursor: pointer;
        }

        .card-title {
            margin-bottom: 20px;
        }

        .card-content {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card z-depth-4">
            <div class="card-content">
                <span class="card-title blue-text text-darken-3">Tambah Pengajuan Pinjaman</span>
                <form action="<?= base_url('pinjaman/tambah') ?>" method="post">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            
                            <input id="nama_anggota" name="nama_anggota" type="text" class="validate" required>
                            <label for="nama_anggota">Nama Anggota</label>
                        </div>
                        <div class="input-field col s12 m6">
                           
                            <input id="jenis_pinjaman" name="jenis_pinjaman" type="text" class="validate" required>
                            <label for="jenis_pinjaman">Jenis Pinjaman</label>
                        </div>
                        <div class="input-field col s12 m6">
                           
                            <input id="tanggal_pinjam" name="tanggal_pinjam" type="date" class="validate" required>
                            <label for="tanggal_pinjam">Tanggal Pinjaman</label>
                        </div>
                        <div class="input-field col s12 m6">
                           
                            <input id="jumlah_pinjaman" name="jumlah_pinjaman" type="number" class="validate" required>
                            <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                        </div>
                        <div class="input-field col s12">
                          
                            <input id="lama_pinjaman" name="lama_pinjaman" type="text" class="validate" required>
                            <label for="lama_pinjaman">Lama Pinjaman (dalam bulan)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align">
                            <button type="submit" name="tambah" class="btn waves-effect waves-light green darken-1">
                                <i class="material-icons left"></i>Tambah Pinjaman
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Materialize JS and Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Initialize Materialize Components -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            M.AutoInit();
        });
    </script>
</body>

</html>
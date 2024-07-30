<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutasi Pinjaman</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Mutasi Pinjaman Baru</h2>
        <form id="form-mutasi">
            <table class="table table-bordered mt-3">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Gaji</th>
                        <th>Pinjaman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="nama_anggota" id="nama-anggota" class="form-control" required>
                        </td>
                        <td>
                            <input type="number" name="gaji" id="gaji" class="form-control" required>
                        </td>
                        <td>
                            <input type="number" name="pinjaman" id="pinjaman" class="form-control" required>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        <div id="notifikasi" class="alert alert-danger mt-3" style="display: none;">
            Jumlah pinjaman melebihi gaji.
        </div>

        <div id="mutasi-list" style="display: none;">
            <h5 class="mt-4">Daftar Mutasi</h5>
            <table class="table table-bordered mt-3">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Gaji</th>
                        <th>Pinjaman</th>
                        <th>Sisa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="mutasi-list-table">
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            let mutasiData = JSON.parse(localStorage.getItem('mutasiData')) || [];

            $('#form-mutasi').submit(function (e) {
                e.preventDefault();

                var namaAnggota = $('#nama-anggota').val();
                var gaji = parseFloat($('#gaji').val());
                var pinjaman = parseFloat($('#pinjaman').val());

                if (isNaN(gaji) || isNaN(pinjaman)) {
                    $('#notifikasi').text('Masukkan gaji dan pinjaman yang valid.').show();
                    return;
                }

                if (pinjaman > gaji) {
                    $('#notifikasi').text('Jumlah pinjaman melebihi gaji.').show();
                } else {
                    $('#notifikasi').hide();

                    mutasiData.push({
                        nama: namaAnggota,
                        gaji: gaji,
                        pinjaman: pinjaman,
                        sisa: gaji - pinjaman
                    });

                    localStorage.setItem('mutasiData', JSON.stringify(mutasiData));

                    tampilkanDataMutasi();

                    $('#nama-anggota').val('');
                    $('#gaji').val('');
                    $('#pinjaman').val('');
                }
            });

            function tampilkanDataMutasi() {
                $('#mutasi-list-table').empty();
                
                mutasiData.slice().reverse().forEach(function (item, index) {
                    $('#mutasi-list-table').append('<tr>' +
                        '<td>' + item.nama + '</td>' +
                        '<td>' + formatCurrency(item.gaji) + '</td>' +
                        '<td>' + formatCurrency(item.pinjaman) + '</td>' +
                        '<td>' + formatCurrency(item.sisa) + '</td>' +
                        '<td>' +
                        <!--'<button type="button" class="btn btn-sm btn-warning mr-2" onclick="editMutasi(' + (mutasiData.length - 1 - index) + ')">Edit</button>' + -->
                        '<button type="button" class="btn btn-sm btn-danger" onclick="hapusMutasi(' + (mutasiData.length - 1 - index) + ')">Hapus</button>' +
                        '</td>' +
                        '</tr>');
                });

                $('#mutasi-list').show();
            }

            window.editMutasi = function(index) {
                var item = mutasiData[index];
                $('#nama-anggota').val(item.nama);
                $('#gaji').val(item.gaji);
                $('#pinjaman').val(item.pinjaman);
                
                mutasiData.splice(index, 1);
                localStorage.setItem('mutasiData', JSON.stringify(mutasiData));
                tampilkanDataMutasi();
            }

            window.hapusMutasi = function(index) {
                if (confirm('Apakah Anda yakin ingin menghapus mutasi ini?')) {
                    mutasiData.splice(index, 1);
                    localStorage.setItem('mutasiData', JSON.stringify(mutasiData));
                    tampilkanDataMutasi();
                }
            }

            function formatCurrency(amount) {
                return amount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            }

            if (mutasiData.length > 0) {
                tampilkanDataMutasi();
            }
        });
    </script>
</body>

</html>
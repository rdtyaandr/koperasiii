<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Pinjaman</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Pengajuan Pinjaman Baru</h2>
    <table class="bordered">
        <thead>
            <tr>
                <th>Jenis Pinjaman</th>
                <th>Tanggal Pinjam</th>
                <th>Jumlah Pinjaman</th>
                <th>Lama Pinjaman (bulan)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="pinjaman-table">
            <tr>
                <td>
                    <select name="jenis_pinjaman" id="jenis-pinjaman-select" required>
                        <option value="">Pilih Jenis Pinjaman</option>
                        <option value="Jenis1">Jenis 1</option>
                        <option value="Jenis2">Jenis 2</option>
                        <option value="Jenis3">Jenis 3</option>
                    </select>
                </td>
                <td>
                    <input type="date" name="tanggal_pinjam" id="tanggal-pinjam" required>
                </td>
                <td>
                    <input type="number" name="jumlah_pinjaman" id="jumlah-pinjaman" required>
                </td>
                <td>
                    <input type="number" name="lama_pinjaman" id="lama-pinjaman" required>
                </td>
                <td>
                    <button type="button" class="btn-flat waves-effect waves-light" id="simpan-btn">Simpan</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div id="notifikasi" style="display: none; color: red;">
        <p>Jumlah pinjaman melebihi saldo koperasi.</p>
    </div>

    <div id="pinjaman-list" style="display: none;">
        <h5>Daftar Pinjaman</h5>
        <table class="bordered">
            <thead>
                <tr>
                    <th>Jenis Pinjaman</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Lama Pinjaman (bulan)</th>
                </tr>
            </thead>
            <tbody id="pinjaman-list-table">
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            const saldoKoperasi = 5000000; // contoh saldo koperasi
            let pinjamanData = []; // array untuk menyimpan data pinjaman

            $('#simpan-btn').click(function () {
                var jenisPinjaman = $('#jenis-pinjaman-select').val();
                var tanggalPinjam = $('#tanggal-pinjam').val();
                var jumlahPinjaman = parseFloat($('#jumlah-pinjaman').val());
                var lamaPinjaman = $('#lama-pinjaman').val();

                if (jumlahPinjaman > saldoKoperasi) {
                    $('#notifikasi').show();
                } else {
                    $('#notifikasi').hide();

                    // Simpan data ke dalam array
                    pinjamanData.push({
                        jenis: jenisPinjaman,
                        tanggal: tanggalPinjam,
                        jumlah: jumlahPinjaman,
                        lama: lamaPinjaman
                    });

                    // Tampilkan data dalam tabel
                    tampilkanDataPinjaman();

                    // Clear the form inputs after submission
                    $('#jenis-pinjaman-select').val('');
                    $('#tanggal-pinjam').val('');
                    $('#jumlah-pinjaman').val('');
                    $('#lama-pinjaman').val('');
                }
            });

            // Fungsi untuk menampilkan data pinjaman dalam tabel
            function tampilkanDataPinjaman() {
                $('#pinjaman-list-table').empty(); // kosongkan isi tabel terlebih dahulu
                pinjamanData.forEach(function (item, index) {
                    $('#pinjaman-list-table').append('<tr>' +
                        '<td>' + item.jenis + '</td>' +
                        '<td>' + item.tanggal + '</td>' +
                        '<td>' + item.jumlah + '</td>' +
                        '<td>' + item.lama + '</td>' +
                        '</tr>');
                });

                $('#pinjaman-list').show(); // tampilkan div dengan id pinjaman-list
            }
        });
    </script>
</body>

</html>
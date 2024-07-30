<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Pinjaman</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Pengajuan Pinjaman Baru</h2>
        <form id="form-pengajuan">
            <table class="table table-bordered mt-3">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Jenis Pinjaman</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Lama Pinjaman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="nama_anggota" id="nama-anggota" required></td>
                        <td>
                            <select name="jenis_pinjaman" id="jenis-pinjaman-select" required>
                                <option value="">Pilih Jenis Pinjaman</option>
                                <option value="Jenis1">Jenis 1</option>
                                <option value="Jenis2">Jenis 2</option>
                                <option value="Jenis3">Jenis 3</option>
                            </select>
                        </td>
                        <td><input type="date" name="tanggal_pinjam" id="tanggal-pinjam" required></td>
                        <td><input type="number" name="jumlah_pinjaman" id="jumlah-pinjaman" required></td>
                        <td>
                            <select name="lama_pinjaman" id="lama-pinjaman" required>
                                <option value="">Pilih Lama Pinjaman (bulan)</option>
                                <option value="1">1 bulan</option>
                                <option value="2">2 bulan</option>
                                <option value="3">3 bulan</option>
                                <option value="4">4 bulan</option>
                                <option value="5">5 bulan</option>
                                <option value="6">6 bulan</option>
                                <option value="7">7 bulan</option>
                                <option value="8">8 bulan</option>
                                <option value="9">9 bulan</option>
                                <option value="10">10 bulan</option>
                                <option value="11">11 bulan</option>
                                <option value="12">12 bulan</option>
                            </select>
                        </td>
                        <td><button type="submit" class="btn btn-primary">Simpan</button></td>
                    </tr>
                </tbody>
            </table>
        </form>

        <!-- Notifikasi -->
        <div id="notifikasi" class="alert alert-danger mt-3" style="display: none;"></div>

        <!-- Daftar Pinjaman -->
        <div id="pinjaman-list" style="display: none;">
            <h5 class="mt-4">Daftar Pinjaman</h5>
            <!-- Kontrol Tampilan Entries -->
            <div class="d-flex justify-content-between mb-3">
                <div class="form-group mb-0">
                    <input type="text" id="search-input" class="form-control" placeholder="Cari..." />
                </div>
                <!-- Show Entries Dropdown -->
                <div class="form-group mb-0">
                    <select id="entries-dropdown" class="">
                        <option value="5">5 Entries</option>
                        <option value="10">10 Entries</option>
                        <option value="20">20 Entries</option>
                        <option value="all">All Entries</option>
                    </select>
                </div>
            </div>

            <table class="table table-bordered mt-3">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Jenis Pinjaman</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Lama Pinjaman</th>
                        <th>Waktu Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="pinjaman-list-table"></tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            const saldoKoperasi = 10000000; // Contoh saldo koperasi
            let pinjamanData = JSON.parse(localStorage.getItem('pinjamanData')) || []; // Ambil data dari local storage

            let entriesPerPage = 5; // Default entries per page

            // Fungsi untuk format currency
            function formatCurrency(amount) {
                return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            // Fungsi untuk menampilkan data pinjaman dalam tabel
            function tampilkanDataPinjaman(filterText = '') {
                $('#pinjaman-list-table').empty(); // Kosongkan isi tabel terlebih dahulu
                const filteredData = pinjamanData.filter(item => {
                    return item.nama.toLowerCase().includes(filterText.toLowerCase()) ||
                        item.jenis.toLowerCase().includes(filterText.toLowerCase()) ||
                        item.tanggal.toLowerCase().includes(filterText.toLowerCase()) ||
                        item.status.toLowerCase().includes(filterText.toLowerCase());
                });

                // Pembatasan jumlah entries
                const paginatedData = filteredData.slice(0, entriesPerPage === 'all' ? filteredData.length : entriesPerPage);

                paginatedData.forEach(function (item, index) {
                    const formattedJumlah = formatCurrency(item.jumlah);
                    const lamaPinjamanText = item.lama + ' bulan';

                    $('#pinjaman-list-table').append(`
                        <tr>
                            <td>${item.nama}</td>
                            <td>${item.jenis}</td>
                            <td>${item.tanggal}</td>
                            <td>${formattedJumlah}</td>
                            <td>${lamaPinjamanText}</td>
                            <td>${item.waktu}</td>
                            <td>${item.status}</td>
                            <td>
                                <button type="button" class="${getButtonClass(item.status)} mr-2" onclick="approvePinjaman(${pinjamanData.indexOf(item)})">Approve</button>
                                <button type="button" class="btn btn-warning" onclick="batalkanPinjaman(${pinjamanData.indexOf(item)})">Batal</button>
                            </td>
                        </tr>
                    `);
                });

                $('#pinjaman-list').show(); // Tampilkan div dengan id pinjaman-list
            }

            // Fungsi untuk mendapatkan kelas tombol berdasarkan status
            function getButtonClass(status) {
                return status === 'Disetujui oleh Admin' ? 'btn btn-secondary' : 'btn btn-primary';
            }

            // Fungsi untuk menyetujui pinjaman
            window.approvePinjaman = function (index) {
                pinjamanData[index].status = 'Disetujui oleh Admin';
                localStorage.setItem('pinjamanData', JSON.stringify(pinjamanData));
                tampilkanDataPinjaman($('#search-input').val()); // Refresh tampilan tabel setelah disetujui
            };

            // Fungsi untuk membatalkan pinjaman
            window.batalkanPinjaman = function (index) {
                if (confirm('Apakah Anda yakin ingin membatalkan pinjaman ini?')) {
                    pinjamanData[index].status = 'Dibatalkan oleh Admin';
                    localStorage.setItem('pinjamanData', JSON.stringify(pinjamanData));
                    tampilkanDataPinjaman($('#search-input').val()); // Refresh tampilan tabel setelah membatalkan
                }
            };

            // Submit form pengajuan
            $('#form-pengajuan').submit(function (e) {
                e.preventDefault();

                const namaAnggota = $('#nama-anggota').val();
                const jenisPinjaman = $('#jenis-pinjaman-select').val();
                const tanggalPinjam = $('#tanggal-pinjam').val();
                let jumlahPinjaman = $('#jumlah-pinjaman').val();
                const lamaPinjaman = $('#lama-pinjaman').val();
                const waktuPengajuan = new Date().toLocaleString(); // Ambil waktu pengajuan saat ini

                // Validasi jumlah pinjaman
                if (!(/^\d*\.?\d*$/.test(jumlahPinjaman))) {
                    $('#notifikasi').text('Masukkan jumlah pinjaman yang valid.').show();
                    return; // Hentikan eksekusi jika jumlah pinjaman tidak valid
                }
                jumlahPinjaman = parseFloat(jumlahPinjaman);

                if (isNaN(jumlahPinjaman)) {
                    $('#notifikasi').text('Masukkan jumlah pinjaman yang valid.').show();
                    return; // Hentikan eksekusi jika jumlah pinjaman bukan angka
                }

                if (jumlahPinjaman > saldoKoperasi) {
                    $('#notifikasi').text('Jumlah pinjaman melebihi saldo koperasi.').show();
                } else {
                    $('#notifikasi').hide();

                    // Simpan data ke dalam array
                    pinjamanData.unshift({
                        nama: namaAnggota,
                        jenis: jenisPinjaman,
                        tanggal: tanggalPinjam,
                        jumlah: jumlahPinjaman,
                        lama: lamaPinjaman,
                        waktu: waktuPengajuan, // Tambahkan waktu pengajuan ke data pinjaman
                        status: 'Menunggu Persetujuan' // Status default
                    });

                    // Simpan ke local storage
                    localStorage.setItem('pinjamanData', JSON.stringify(pinjamanData));

                    // Tampilkan data dalam tabel
                    tampilkanDataPinjaman();

                    // Clear form inputs after submission
                    $('#form-pengajuan')[0].reset();
                }
            });

            // Event listener untuk dropdown entries
            $('#entries-dropdown').change(function () {
                entriesPerPage = $(this).val();
                tampilkanDataPinjaman($('#search-input').val()); // Refresh tampilan tabel
            });

            // Event listener untuk input pencarian
            $('#search-input').on('input', function () {
                const searchText = $(this).val();
                tampilkanDataPinjaman(searchText); // Refresh tampilan tabel
            });

            // Load data saat dokumen siap
            if (pinjamanData.length > 0) {
                tampilkanDataPinjaman();
            }
        });
    </script>
</body>

<style>
    /* Styling untuk dropdown */
    .custom-dropdown {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #000000;
        /* Warna teks angka putih */
        background-color: #F8F8FF;
        /* Warna latar belakang dropdown */
        background-image: none;
        /* Menghilangkan panah default */
        width: 100%;
        max-width: 200px;
        /* Optional: limit the width */
        cursor: pointer;
        position: relative;
        /* Perlu untuk penyesuaian */
    }

    /* Styling saat dropdown mendapat fokus */
    .custom-dropdown:focus {
        outline: none;
        border-color: #0056b3;
        /* Warna border saat fokus */
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    /* Styling untuk opsi dropdown */
    .custom-dropdown option {
        padding: 0.5rem;
        background-color: #007bff;
        /* Warna latar belakang opsi */
        color: #ffffff;
        /* Warna teks opsi (angka putih) */
    }

    /* Menghilangkan panah dropdown untuk browser yang mendukung */
    .custom-dropdown::-ms-expand {
        display: none;
    }

    /* Menghilangkan panah dropdown untuk browser lainnya */
    .custom-dropdown::after {
        content: none;
        /* Menghapus panah */
    }
</style>

</html>
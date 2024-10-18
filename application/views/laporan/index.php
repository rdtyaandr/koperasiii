<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Laporan</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="card" style="border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                                <div class="card-content" style="padding: 20px;">
                                    <div class="row">
                                        <div class="input-field col s12 m2">
                                            <select id="tahun" name="tahun" class="browser-default" style="border-radius: 8px;">
                                                <option value="" disabled <?= empty($_GET['tahun']) ? 'selected' : '' ?>>Pilih Tahun</option>
                                                <?php
                                                $currentYear = date('Y');
                                                for ($y = $currentYear; $y >= 1960; $y--): ?>
                                                    <option value="<?= $y; ?>" <?= isset($_GET['tahun']) && $_GET['tahun'] == $y ? 'selected' : ($y == $currentYear ? 'selected' : ''); ?>><?= $y; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="bulan" name="bulan" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['bulan']) ? 'selected' : '' ?> style="color: gray;">Pilih Bulan (opsional)</option>
                                                <?php
                                                $bulan = [
                                                    '01' => 'Januari',
                                                    '02' => 'Februari',
                                                    '03' => 'Maret',
                                                    '04' => 'April',
                                                    '05' => 'Mei',
                                                    '06' => 'Juni',
                                                    '07' => 'Juli',
                                                    '08' => 'Agustus',
                                                    '09' => 'September',
                                                    '10' => 'Oktober',
                                                    '11' => 'November',
                                                    '12' => 'Desember'
                                                ];
                                                foreach ($bulan as $num => $name): ?>
                                                    <option value="<?= $num; ?>" <?= isset($_GET['bulan']) && $_GET['bulan'] == $num ? 'selected' : ''; ?>><?= $name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="tanggal" name="tanggal" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['tanggal']) ? 'selected' : '' ?> style="color: gray;">Pilih Tanggal (opsional)</option>
                                                <?php for ($d = 1; $d <= 31; $d++): ?>
                                                    <option value="<?= str_pad($d, 2, '0', STR_PAD_LEFT); ?>" <?= isset($_GET['tanggal']) && $_GET['tanggal'] == str_pad($d, 2, '0', STR_PAD_LEFT) ? 'selected' : ''; ?>><?= $d; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="sampai_tanggal" name="sampai_tanggal" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['sampai_tanggal']) ? 'selected' : '' ?> style="color: gray;">Sampai Tanggal (opsional)</option>
                                                <?php for ($d = 1; $d <= 31; $d++): ?>
                                                    <option value="<?= str_pad($d, 2, '0', STR_PAD_LEFT); ?>" <?= isset($_GET['sampai_tanggal']) && $_GET['sampai_tanggal'] == str_pad($d, 2, '0', STR_PAD_LEFT) ? 'selected' : ''; ?>><?= $d; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2">
                                            <select id="cara_bayar" name="cara_bayar" class="browser-default" style="border-radius: 8px;">
                                                <option value="" <?= empty($_GET['cara_bayar']) ? 'selected' : '' ?> style="color: gray;">Pilih Cara Bayar (opsional)</option>
                                                <option value="Cash" <?= isset($_GET['cara_bayar']) && $_GET['cara_bayar'] == 'Cash' ? 'selected' : ''; ?>>Cash</option>
                                                <option value="Kredit" <?= isset($_GET['cara_bayar']) && $_GET['cara_bayar'] == 'Kredit' ? 'selected' : ''; ?>>Kredit</option>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m2" style="margin-top: 20px;">
                                            <button id="buat-sekarang" class="btn waves-effect waves-light blue darken-2" style="border-radius: 25px;">Buat Sekarang</button>
                                            <a href="<?= base_url('laporan'); ?>" class="btn-floating red">
                                                <i class="large material-icons">refresh</i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="download-buttons" class="row" style="display: none;">
                                        <div class="col s12 center-align">
                                            <a class="btn waves-effect waves-light blue tooltipped" data-position="top" data-tooltip="Download PNG" id="download-png" style="border-radius: 25px;">
                                                <i class="material-icons left">image</i>Download PNG
                                            </a>
                                            <a class="btn waves-effect waves-light green tooltipped" data-position="top" data-tooltip="Download XLSX" id="download-xlsx" style="border-radius: 25px;">
                                                <i class="material-icons left">grid_on</i>Download XLSX
                                            </a>
                                            <a class="btn waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Download PDF" id="download-pdf" style="border-radius: 25px;">
                                                <i class="material-icons left">picture_as_pdf</i>Download PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="area-download" id="area-download">
                        <table id="laporanTable" class="striped highlight responsive-table mt" style="border-radius: 8px; overflow: hidden;">
                            <thead class="blue darken-2 white-text">
                                <tr>
                                    <th class="center-align">No</th>
                                    <th class="center-align">Nama Barang</th>
                                    <th class="center-align">Jenis Barang</th>
                                    <th class="center-align">Cara Bayar</th>
                                    <th class="center-align">Harga Beli</th>
                                    <th class="center-align">Harga Jual</th>
                                    <th class="center-align">Jumlah</th>
                                    <th class="center-align">Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPendapatan = 0;
                                if (!empty($laporan)): ?>
                                    <?php foreach ($laporan as $key => $laporanItem):
                                        $totalPendapatan += $laporanItem['total_pendapatan'];
                                    ?>
                                        <tr>
                                            <td class="center-align"><?= $key + 1 ?></td>
                                            <td class="center-align"><?= htmlspecialchars($laporanItem['nama_barang'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td class="center-align"><?= htmlspecialchars($laporanItem['jenis_barang'] == 'toko' ? 'Toko' : 'Konsinyasi', ENT_QUOTES, 'UTF-8') ?></td>
                                            <td class="center-align"><?= htmlspecialchars($laporanItem['cara_bayar'], ENT_QUOTES, 'UTF-8') ?></td> <!-- Tambahkan kolom ini -->
                                            <td class="center-align"><?= number_format($laporanItem['harga_beli'], 0, ',', '.') ?></td>
                                            <td class="center-align"><?= number_format($laporanItem['harga_jual'], 0, ',', '.') ?></td>
                                            <td class="center-align"><?= number_format($laporanItem['jumlah'], 0, ',', '.') ?></td>
                                            <td class="center-align"><?= number_format($laporanItem['total_pendapatan'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <script>
                                        document.getElementById('download-buttons').style.display = 'block';
                                    </script>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="center-align">Tidak ada data laporan yang dibuat.</td> <!-- Ubah colspan menjadi 7 -->
                                    </tr>
                                    <script>
                                        document.getElementById('download-buttons').style.display = 'none';
                                    </script>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <p class="blue-text text-darken-2 right-align" style="font-size: 1.11em; font-weight: bold; margin-top: 15px; margin-right: 10px;">Total Pendapatan: <strong><?= 'Rp ' . number_format($totalPendapatan, 0, ',', '.') ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Native CSS for additional styling -->
<style>
    .card-content {
        padding-bottom: 0;
    }

    .input-field {
        margin-bottom: 20px;
    }

    .input-field label {
        color: #9e9e9e;
    }

    .input-field input:focus+label {
        color: #1e88e5 !important;
    }

    .input-field input:focus {
        border-bottom: 1px solid #1e88e5 !important;
        box-shadow: 0 1px 0 0 #1e88e5 !important;
    }

    .btn-floating {
        border-radius: 100px !important;
    }

    .tooltipped {
        position: relative;
    }

    .mt {
        margin-top: 15px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .right-align {
        text-align: right;
    }

    .center-align {
        text-align: center;
    }

    .btn-floating[disabled] {
        pointer-events: none;
        background-color: #d6d6d6 !important;
        color: #9e9e9e !important;
        cursor: not-allowed;
    }

    .btn-floating[disabled] i.material-icons {
        color: #9e9e9e !important;
    }

    .status-cell {
        padding: 5px !important;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        color: white;
        font-size: 0.9em;
        text-align: center;
    }

    .status-badge.grey.lighten-2 {
        background-color: #d6d6d6;
    }

    .status-badge.blue.lighten-2 {
        background-color: #64b5f6;
    }

    .status-badge.green.lighten-2 {
        background-color: #81c784;
    }

    .status-badge.red.lighten-2 {
        background-color: #e57373;
    }

    table tbody tr {
        border-bottom: 1px solid #ddd;
    }
</style>

<!-- JavaScript for initializing Materialize components -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });

    document.getElementById('buat-sekarang').addEventListener('click', function() {
        const year = document.getElementById('tahun').value;
        const month = document.getElementById('bulan').value;
        const day = document.getElementById('tanggal').value;
        const endDay = document.getElementById('sampai_tanggal').value;
        const paymentMethod = document.getElementById('cara_bayar').value;

        if (!year) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tahun harus dipilih!',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true
            });
            return;
        }

        if (day && endDay && parseInt(endDay) < parseInt(day)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal akhir tidak boleh sebelum tanggal mulai!',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true
            });
            return;
        }

        const params = new URLSearchParams({
            tahun: year,
            bulan: month,
            tanggal: day,
            sampai_tanggal: endDay,
            cara_bayar: paymentMethod
        });

        window.location.href = `<?= base_url('laporan') ?>?${params.toString()}`;
    });

    function validateDropdownWithUrl() {
        const currentUrl = new URL(window.location.href);
        const currentYear = currentUrl.searchParams.get('tahun');
        const currentMonth = currentUrl.searchParams.get('bulan');
        const currentDay = currentUrl.searchParams.get('tanggal');
        const currentEndDay = currentUrl.searchParams.get('sampai_tanggal');
        const currentPaymentMethod = currentUrl.searchParams.get('cara_bayar');

        const selectedYear = document.getElementById('tahun').value;
        const selectedMonth = document.getElementById('bulan').value;
        const selectedDay = document.getElementById('tanggal').value;
        const selectedEndDay = document.getElementById('sampai_tanggal').value;
        const selectedPaymentMethod = document.getElementById('cara_bayar').value;

        if (currentYear !== selectedYear || currentMonth !== selectedMonth || currentDay !== selectedDay || currentEndDay !== selectedEndDay || currentPaymentMethod !== selectedPaymentMethod) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tolong tekan tombol "Buat Sekarang" terlebih dahulu!',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true
            });
            return false;
        }
        return true;
    }

    document.getElementById('download-png').addEventListener('click', function(event) {
        if (!validateDropdownWithUrl()) {
            event.preventDefault();
            return;
        }
        html2canvas(document.getElementById('area-download'), {
            onclone: function(clonedDoc) {
                clonedDoc.getElementById('area-download').style.padding = '20px';
                const header = document.createElement('div');
                header.style.textAlign = 'center';
                const year = document.getElementById('tahun').value;
                const month = document.getElementById('bulan').value ? document.getElementById('bulan').options[document.getElementById('bulan').selectedIndex].text : '';
                const day = document.getElementById('tanggal').value ? document.getElementById('tanggal').value : '';
                const endDay = document.getElementById('sampai_tanggal').value ? document.getElementById('sampai_tanggal').value : '';
                let dateText = '';

                if (year) {
                    dateText = `Tahun ${year}`;
                    if (month) {
                        dateText += ` Bulan ${month}`;
                        if (day) {
                            dateText = `Tanggal ${day} ${month} ${year}`;
                            if (endDay) {
                                dateText = `Tanggal ${day} sampai ${endDay} ${month} ${year}`;
                            }
                        }
                    }
                }

                header.innerHTML = `
                    <h2 style="color: #1565c0; font-weight: bold; margin-bottom: 5px;">Laporan Penjualan</h2>
                    <p style="color: #1565c0; font-weight: bold;">${dateText}</p>
                `;
                clonedDoc.getElementById('area-download').insertBefore(header, clonedDoc.getElementById('area-download').firstChild);
            }
        }).then(function(canvas) {
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            const now = new Date();
            const formattedDate = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}_${String(now.getHours()).padStart(2, '0')}-${String(now.getMinutes()).padStart(2, '0')}-${String(now.getSeconds()).padStart(2, '0')}`;
            link.download = `laporan_${formattedDate}.png`;
            link.click();
        });
    });

    document.getElementById('download-xlsx').addEventListener('click', function(event) {
        if (!validateDropdownWithUrl()) {
            event.preventDefault();
            return;
        }

        const table = document.getElementById('laporanTable');
        const rows = table.querySelectorAll('tr');
        const data = [];
        let totalPendapatan = 0;

        // Add header information
        const header = [];
        header.push(['Laporan Penjualan']);
        const year = document.getElementById('tahun').value;
        const month = document.getElementById('bulan').value ? document.getElementById('bulan').options[document.getElementById('bulan').selectedIndex].text : '';
        const day = document.getElementById('tanggal').value ? document.getElementById('tanggal').value : '';
        const endDay = document.getElementById('sampai_tanggal').value ? document.getElementById('sampai_tanggal').value : '';
        let dateText = '';

        if (year) {
            dateText = `Tahun ${year}`;
            if (month) {
                dateText += ` Bulan ${month}`;
                if (day) {
                    dateText = `Tanggal ${day} ${month} ${year}`;
                    if (endDay) {
                        dateText = `Tanggal ${day} sampai ${endDay} ${month} ${year}`;
                    }
                }
            }
        }

        header.push([dateText]);
        header.push(['']);

        data.push(...header);

        rows.forEach(function(row, rowIndex) {
            const cols = row.querySelectorAll('td, th');
            const rowData = [];
            cols.forEach(function(col, colIndex) {
                const cellValue = col.innerText.replace(/\./g, '');
                rowData.push(cellValue);
                if (rowIndex > 0 && colIndex === 7) { // Assuming the 7th column is the total pendapatan
                    totalPendapatan += parseFloat(cellValue); // Ubah ini untuk menjumlahkan total pendapatan
                }
            });
            data.push(rowData);
        });

        // Add total pendapatan to the data
        data.push(['', '', '', '', '', '', 'Total Pendapatan', 'Rp ' + totalPendapatan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')]);

        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(data);

        XLSX.utils.book_append_sheet(wb, ws, 'Laporan');
        const now = new Date();
        const formattedDate = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}_${String(now.getHours()).padStart(2, '0')}-${String(now.getMinutes()).padStart(2, '0')}-${String(now.getSeconds()).padStart(2, '0')}`;
        XLSX.writeFile(wb, `laporan_${formattedDate}.xlsx`);
    });

    document.getElementById('download-pdf').addEventListener('click', function(event) {
        if (!validateDropdownWithUrl()) {
            event.preventDefault();
            return;
        }

        var { jsPDF } = window.jspdf;
        var doc = new jsPDF();

        // Styling for the PDF
        doc.setFontSize(18);
        doc.setTextColor(33, 150, 243);
        doc.setFont("helvetica", "bold"); // Membuat teks lebih tebal
        doc.text("Laporan Penjualan", 105, 10, null, null, 'center');

        const year = document.getElementById('tahun').value;
        const month = document.getElementById('bulan').value ? document.getElementById('bulan').options[document.getElementById('bulan').selectedIndex].text : '';
        const day = document.getElementById('tanggal').value ? document.getElementById('tanggal').value : '';
        const endDay = document.getElementById('sampai_tanggal').value ? document.getElementById('sampai_tanggal').value : '';
        let dateText = '';

        if (year) {
            dateText = `Tahun ${year}`;
            if (month) {
                dateText += ` Bulan ${month}`;
                if (day) {
                    dateText = `Tanggal ${day} ${month} ${year}`;
                    if (endDay) {
                        dateText = `Tanggal ${day} sampai ${endDay} ${month} ${year}`;
                    }
                }
            }
        }

        doc.setFontSize(12);
        doc.setTextColor(100, 100, 100);
        doc.text(dateText, 105, 20, null, null, 'center');

        doc.autoTable({
            html: '#laporanTable',
            startY: 28,
            styles: {
                fontSize: 10,
                cellPadding: 3,
                halign: 'center',
                valign: 'middle'
            },
            headStyles: {
                fillColor: [33, 150, 243],
                textColor: [255, 255, 255]
            },
            footStyles: {
                fillColor: [33, 150, 243],
                textColor: [255, 255, 255]
            }
        });

        // Calculate total pendapatan
        let totalPendapatan = 0;
        const rows = document.querySelectorAll('#laporanTable tbody tr');
        rows.forEach(function(row) {
            const cols = row.querySelectorAll('td');
            const pendapatan = parseFloat(cols[7].innerText.replace(/\./g, '')); // Ubah ini untuk menjumlahkan total pendapatan
            totalPendapatan += pendapatan;
        });

        // Add total pendapatan to the PDF
        doc.setFontSize(12);
        doc.setTextColor(100, 100, 100); // Ubah warna teks menjadi abu-abu pudar
        doc.text(`Total Pendapatan: Rp ${totalPendapatan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`, 200, doc.autoTable.previous.finalY + 10, null, null, 'right');

        const now = new Date();
        const formattedDate = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}_${String(now.getHours()).padStart(2, '0')}-${String(now.getMinutes()).padStart(2, '0')}-${String(now.getSeconds()).padStart(2, '0')}`;
        doc.save(`laporan_${formattedDate}.pdf`);
    });
</script>

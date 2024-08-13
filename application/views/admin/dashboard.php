<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="padding: 20px;">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);">
                    <div class="card-content">
                        <div class="row valign-wrapper" style="margin-bottom: 30px;">
                            <div class="col s6">
                                <span class="card-title blue-text text-darken-2"
                                    style="font-size: 2.5em; font-weight: bold; position: relative; display: inline-block;">
                                    Dashboard
                                </span>
                                <div style="width: 14%; height: 3px; background-color: blue; margin-top: 5px; margin-left: 0; border-radius: 2px;"></div>
                            </div>
                            <div class="col s6 right-align">
                                <div id="current-datetime" class="blue darken-3 white-text"
                                    style="display: inline-block; font-size: 1.2em; font-weight: 500; padding: 10px 20px; border-radius: 50px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                                    <i class="material-icons left" style="font-size: 1.2em; margin-right: 10px;">access_time</i>
                                    <span id="date"></span>
                                    <span id="time" style="margin-left: 10px; font-weight: bold;"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Kartu Statistik -->
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card blue darken-2 white-text"
                                    style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                    <div class="card-content" style="padding: 20px;">
                                        <i class="material-icons right" style="font-size: 3em;">assessment</i>
                                        <span class="card-title" style="font-size: 1.2em;">Data</span>
                                        <h4 style="font-size: 2.5em; margin: 10px 0;"><?= number_format($user_count) ?></h4>
                                        <p style="font-size: 1em;">+5% dari minggu lalu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card green darken-2 white-text"
                                    style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                    <div class="card-content" style="padding: 20px;">
                                        <i class="material-icons right" style="font-size: 3em;">people_alt</i>
                                        <span class="card-title" style="font-size: 1.2em;">Anggota</span>
                                        <h4 style="font-size: 2.5em; margin: 10px 0;"><?= number_format($anggota) ?></h4>
                                        <p style="font-size: 1em;">+2% dari minggu lalu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card amber darken-2 white-text"
                                    style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                    <div class="card-content" style="padding: 20px;">
                                        <i class="material-icons right" style="font-size: 3em;">monetization_on</i>
                                        <span class="card-title" style="font-size: 1.2em;">Transaksi</span>
                                        <h4 style="font-size: 2.5em; margin: 10px 0;">$<?= number_format($total_penjualan) ?></h4>
                                        <p style="font-size: 1em;">+10% dari minggu lalu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card red darken-2 white-text"
                                    style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                    <div class="card-content" style="padding: 20px;">
                                        <i class="material-icons right" style="font-size: 3em;">credit_card</i>
                                        <span class="card-title" style="font-size: 1.2em;">Pinjaman</span>
                                        <h4 style="font-size: 2.5em; margin: 10px 0;"><?= number_format($total_pengajuan) ?></h4>
                                        <p style="font-size: 1em;">-5% dari minggu lalu</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Grafik -->
                        <div class="row">
                            <div class="col s12">
                                <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                    <div class="card-content">
                                        <span class="card-title blue-text text-darken-2"
                                            style="font-size: 1.8em; font-weight: 500;">Jumlah Transaksi per Bulan</span>
                                        <div id="sales-chart" style="height: 350px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                    <div class="card-content">
                                        <span class="card-title green-text text-darken-1"
                                            style="font-size: 1.8em; font-weight: 500;">Banyak Pinjaman</span>
                                        <div id="user-growth-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                    <div class="card-content">
                                        <span class="card-title orange-text text-darken-2"
                                            style="font-size: 1.8em; font-weight: 500;">Distribusi Barang</span>
                                        <div id="revenue-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Memperbarui tanggal dan waktu saat ini
        function updateDateTime() {
            var now = new Date();
            var dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

            var formattedDate = now.toLocaleDateString('id-ID', dateOptions);
            var formattedTime = now.toLocaleTimeString('id-ID', timeOptions);

            document.getElementById('date').textContent = formattedDate;
            document.getElementById('time').textContent = formattedTime;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // Grafik Jumlah Transaksi
        var salesOptions = {
            series: [{
                name: 'Penjualan',
                data: <?= json_encode(array_column($monthly_transactions, 'total')) ?> // Data penjualan untuk 12 bulan
            }],
            chart: {
                type

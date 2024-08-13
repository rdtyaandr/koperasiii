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
                            <div
                                style="width: 14%; height: 3px; background-color: blue; margin-top: 5px; margin-left: 0; border-radius: 2px;">
                            </div>
                        </div>
                        <!-- Jam -->
                        <div class="col s6 right-align">
                            <div id="current-datetime" class="blue darken-3 white-text"
                                style="display: inline-block; font-size: 1.2em; font-weight: 500; padding: 10px 20px; border-radius: 50px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                                <i class="material-icons left"
                                    style="font-size: 1.2em; margin-right: 10px;">access_time</i>
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
                                    <span class="card-title" style="font-size: 1.2em;">barang</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;"><?= $barang ?> </h4>
                                    <p style="font-size: 1em;">+5% dari minggu lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card green darken-2 white-text"
                                style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                <div class="card-content" style="padding: 20px;">
                                    <i class="material-icons right" style="font-size: 3em;">people_alt</i>
                                    <span class="card-title" style="font-size: 1.2em;">Pengguna</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;"><?= $user_count ?></h4>
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
                                    <h4 style="font-size: 2.5em; margin: 10px 0;">$<?= $transaksi ?></h4>
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
                                    <h4 style="font-size: 2.5em; margin: 10px 0;">23</h4>
                                    <p style="font-size: 1em;">-5% dari minggu lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .card:hover {
                            transform: translateY(-5px);
                            /* Mengangkat kartu sedikit saat hover */
                            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
                            /* Menambahkan bayangan saat hover */
                        }
                    </style>

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

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125, 110, 95, 130] // Data penjualan untuk 12 bulan
        }],
        chart: {
            type: 'line', // Menggunakan grafik garis
            height: 350,
            zoom: { enabled: true },
            toolbar: { show: true } // Menyembunyikan toolbar
        },
        dataLabels: { enabled: false },
        stroke: {
            curve: 'smooth',
            width: 3 // Lebar garis
        },
        title: {
            align: 'left',
            style: {
                fontSize: '1.5em',
                fontWeight: 'bold',
                color: '#333'
            }
        },
        subtitle: {
           
            align: 'left',
            style: {
                fontSize: '1em',
                color: '#555'
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Kategori untuk 12 bulan
            labels: {
                formatter: function (value) { return value; },
                style: { colors: '#888' }
            },
            title: {
                text: 'Bulan',
                style: {
                    color: '#333'
                }
            },
            axisBorder: {
                show: true,
                color: '#e0e0e0'
            },
            axisTicks: {
                show: true,
                color: '#e0e0e0'
            }
        },
        yaxis: {
            opposite: true,
            labels: {
                formatter: function (value) { return "$" + value.toFixed(2); },
                style: { colors: '#888' }
            },
            title: {
                
                style: {
                    color: '#333'
                }
            },
            axisBorder: {
                show: true,
                color: '#e0e0e0'
            },
            axisTicks: {
                show: true,
                color: '#e0e0e0'
            }
        },
        grid: {
            borderColor: '#e0e0e0',
            row: {
                colors: ['#f3f3f3', 'transparent'], // Alternatif warna untuk baris
                opacity: 0.5
            },
        },
        legend: {
            horizontalAlign: 'left',
            position: 'top'
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (value) { return "$" + value.toFixed(2); }
            },
            style: {
                fontSize: '1em'
            }
        }
    };

    var salesChart = new ApexCharts(document.querySelector("#sales-chart"), salesOptions);
    salesChart.render();


    // Grafik Pinjaman
    var userGrowthOptions = {
        series: [{
            name: 'Setujui',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 70, 75, 80] // Data untuk 12 bulan
        }, {
            name: 'Belum di Setujui',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 100, 110, 120] // Data untuk 12 bulan
        }],
        chart: {
            type: 'line', // Menggunakan grafik garis
            height: 300,
            zoom: { enabled: false },
            toolbar: { show: false } // Menyembunyikan toolbar
        },
        dataLabels: { enabled: false },
        stroke: {
            curve: 'smooth',
            width: 3 // Lebar garis
        },
        title: {
            align: 'left',
            style: {
                fontSize: '1.5em',
                fontWeight: 'bold',
                color: '#333'
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Kategori untuk 12 bulan
            labels: {
                style: { colors: '#888' }
            },
            title: {
                text: 'Bulan',
                style: {
                    color: '#333'
                }
            },
            axisBorder: {
                show: true,
                color: '#e0e0e0'
            },
            axisTicks: {
                show: true,
                color: '#e0e0e0'
            }
        },
        yaxis: {
            title: {
               
                style: {
                    color: '#333'
                }
            },
            labels: {
                style: { colors: '#888' }
            },
            axisBorder: {
                show: true,
                color: '#e0e0e0'
            },
            axisTicks: {
                show: true,
                color: '#e0e0e0'
            }
        },
        grid: {
            borderColor: '#e0e0e0',
            row: {
                colors: ['#f3f3f3', 'transparent'], // Alternatif warna untuk baris
                opacity: 0.5
            },
        },
        legend: {
            horizontalAlign: 'left',
            position: 'top'
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (val) { return val + "anggota"; }
            },
            style: {
                fontSize: '1em'
            }
        }
    };

    var userGrowthChart = new ApexCharts(document.querySelector("#user-growth-chart"), userGrowthOptions);
    userGrowthChart.render();


    // Grafik Distribusi Barang
    var revenueOptions = {
        series: [44, 55, 13, 43],
        chart: { type: 'donut', height: 300 },
        labels: ['Produk A', 'Produk B', 'Produk C', 'Produk D'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: { width: 200 },
                legend: { position: 'bottom' }
            }
        }]
    };

    var revenueChart = new ApexCharts(document.querySelector("#revenue-chart"), revenueOptions);
    revenueChart.render();
</script>
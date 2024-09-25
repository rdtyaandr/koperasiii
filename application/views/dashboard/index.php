<style>
    .card-link {
        display: block;
        text-decoration: none;
    }

    .card-link:hover .card {
        transform: scale(0.97);
    }
</style>
<div class="container-fluid" style="padding: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row valign-wrapper" style="margin-bottom: 10px;">
                        <div class="col s6">
                            <span class="card-title blue-text text-darken-2"
                                style="font-size: 2.5em; font-weight: bold;">Dashboard</span>
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

                    <div class="row">
                        <?php
                        $level = $this->session->userdata('level');
                        $cards = [
                            'admin' => [
                                ['url' => 'barang', 'color' => 'blue darken-2', 'icon' => 'assessment', 'title' => 'Barang', 'total' => $stats['total_barang'], 'change' => $statss['change_barang']],
                                ['url' => 'transaksi', 'color' => 'green darken-2', 'icon' => 'monetization_on', 'title' => 'Transaksi', 'total' => $stats['total_transaksi'], 'change' => $statss['change_transaksi']],
                                ['url' => 'pengguna', 'color' => 'amber darken-2', 'icon' => 'people_alt', 'title' => 'Pengguna', 'total' => $stats['total_anggota'], 'change' => $statss['change_anggota']],
                                ['url' => 'pinjaman', 'color' => 'red darken-2', 'icon' => 'credit_card', 'title' => 'Pinjaman', 'total' => $stats['total_pengajuan'], 'change' => $statss['change_pengajuan']]
                            ],
                            'operator' => [
                                ['url' => 'barang', 'color' => 'blue darken-2', 'icon' => 'assessment', 'title' => 'Barang', 'total' => $stats['total_barang'], 'change' => $statss['change_barang']],
                                ['url' => 'transaksi', 'color' => 'green darken-2', 'icon' => 'monetization_on', 'title' => 'Transaksi', 'total' => $stats['total_transaksi'], 'change' => $statss['change_transaksi']],
                                ['url' => 'pengguna', 'color' => 'amber darken-2', 'icon' => 'people_alt', 'title' => 'Pengguna', 'total' => $stats['total_anggota'], 'change' => $statss['change_anggota']]
                            ]
                        ];

                        foreach ($cards[$level] as $card): ?>
                            <div class="col s12 m6 l<?php echo ($level == 'admin') ? '3' : '4'; ?>">
                                <a href="<?php echo base_url($card['url']); ?>" class="card-link">
                                    <div class="card <?php echo $card['color']; ?> white-text" style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s;">
                                        <div class="card-content" style="padding: 20px;">
                                            <i class="material-icons right" style="font-size: 3em;"><?php echo $card['icon']; ?></i>
                                            <span class="card-title" style="font-size: 1.2em;"><?php echo $card['title']; ?></span>
                                            <h4 style="font-size: 2.5em; margin: 10px 0;"><?php echo $card['total']; ?></h4>
                                            <p style="font-size: 1em;"><?php echo ($card['change'] >= 0 ? '+' : '') . $card['change']; ?> bulan ini</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Grafik -->
                    <div class="row">
                        <?php $level = $this->session->userdata('level'); ?>
                        <div class="col <?php echo ($level == 'admin') ? 's6 m6' : 's12 m12'; ?>" <?php echo ($level == 'operator') ? 'style="display: flex; justify-content: center;"' : ''; ?>>
                            <?php if ($level == 'operator'): ?>
                                <div style="width: 100%;">
                                <?php endif; ?>
                                <div class="cardd" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                    <div class="card-content">
                                        <span class="card-title blue-text text-darken-2" style="font-size: 1.8em; font-weight: 500;">Data Transaksi</span>
                                        <div id="sales-chart"></div>
                                    </div>
                                </div>
                                </div>
                                <?php if ($level == 'admin'): ?>
                                    <div class="col s6 m6">
                                        <div class="cardd" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                            <div class="card-content">
                                                <span class="card-title green-text text-darken-1" style="font-size: 1.8em; font-weight: 500;">Banyak Pinjaman</span>
                                                <div id="user-growth-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            // Update current date and time
            function updateDateTime() {
                var now = new Date();
                var dateOptions = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                var timeOptions = {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };

                var formattedDate = now.toLocaleDateString('id-ID', dateOptions);
                var formattedTime = now.toLocaleTimeString('id-ID', timeOptions);

                document.getElementById('date').textContent = formattedDate;
                document.getElementById('time').textContent = formattedTime;
            }
            setInterval(updateDateTime, 1000);
            updateDateTime();

            // Sales Overview Chart
            var salesOptions = {
                series: [{
                    name: 'Total',
                    data: <?php echo json_encode($monthly_data); ?>
                }],
                chart: {
                    type: 'area',
                    height: 400,
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'Jumlah transaksi perbulan',
                    align: 'left'
                },
                subtitle: {
                    text: 'Total transaksi dari waktu ke waktu',
                    align: 'left'
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    labels: {
                        formatter: function(value) {
                            return value;
                        }
                    }
                },
                yaxis: {
                    opposite: true,
                    labels: {
                        formatter: function(value) {
                            return value;
                        }
                    }
                },
                legend: {
                    horizontalAlign: 'left'
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' Transaksi';
                        }
                    }
                }
            };

            var salesChart = new ApexCharts(document.querySelector("#sales-chart"), salesOptions);
            salesChart.render();

            var userGrowthOptions = {
                series: [{
                    name: 'Menunggu',
                    data: <?php echo json_encode($pending_data); ?>,
                }, {
                    name: 'Disetujui',
                    data: <?php echo json_encode($approved_data); ?>,
                }, {
                    name: 'Ditolak',
                    data: <?php echo json_encode($rejected_data); ?>,
                }],
                chart: {
                    type: 'bar',
                    height: 400
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                },
                yaxis: {
                    title: {
                        text: 'Jumlah'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " User";
                        }
                    }
                }
            };

            var userGrowthChart = new ApexCharts(document.querySelector("#user-growth-chart"), userGrowthOptions);
            userGrowthChart.render();
        </script>
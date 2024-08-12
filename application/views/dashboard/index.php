<div class="container-fluid" style="padding: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <div class="row valign-wrapper" style="margin-bottom: 30px;">
                        <div class="col s6">
                            <span class="card-title blue-text text-darken-2" style="font-size: 2.5em; font-weight: bold;">Dashboard</span>
                        </div>
                        <div class="col s6 right-align">
                            <div id="current-datetime" class="blue darken-3 white-text" style="display: inline-block; font-size: 1.2em; font-weight: 500; padding: 10px 20px; border-radius: 50px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                                <i class="material-icons left" style="font-size: 1.2em; margin-right: 10px;">access_time</i>
                                <span id="date"></span>
                                <span id="time" style="margin-left: 10px; font-weight: bold;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m6 l3">
                            <div class="card blue darken-2 white-text" style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                <div class="card-content" style="padding: 20px;">
                                    <i class="material-icons right" style="font-size: 3em;">assessment</i>
                                    <span class="card-title" style="font-size: 1.2em;">Barang</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;"><?php echo $stats['total_barang']; ?></h4> <!-- Mengambil total barang dari controller -->
                                    <p style="font-size: 1em;">+1 bulan ini</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card green darken-2 white-text" style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                <div class="card-content" style="padding: 20px;">
                                    <i class="material-icons right" style="font-size: 3em;">monetization_on</i>
                                    <span class="card-title" style="font-size: 1.2em;">Transaksi</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;"><?php echo $stats['total_transaksi']; ?></h4> <!-- Mengambil total transaksi dari controller -->
                                    <p style="font-size: 1em;">+1 bulan ini</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card amber darken-2 white-text" style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                <div class="card-content" style="padding: 20px;">
                                    <i class="material-icons right" style="font-size: 3em;">people_alt</i>
                                    <span class="card-title" style="font-size: 1.2em;">Anggota</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;"><?php echo $stats['total_anggota']; ?></h4> <!-- Mengambil total anggota dari controller -->
                                    <p style="font-size: 1em;">+1 bulan ini</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card red darken-2 white-text" style="border-radius: 15px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                <div class="card-content" style="padding: 20px;">
                                    <i class="material-icons right" style="font-size: 3em;">credit_card</i>
                                    <span class="card-title" style="font-size: 1.2em;">Pinjaman</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;"><?php echo $stats['total_pengajuan']; ?></h4> <!-- Mengambil total pengajuan dari controller -->
                                    <p style="font-size: 1em;">-1 bulan ini</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik -->
                    <div class="row">
                        <?php if ($this->session->userdata('level') == 'admin') : ?>
                            <div class="col s6">
                            <?php elseif ($this->session->userdata('level') == 'operator') : ?>
                                <div class="col s12">
                                <?php endif; ?>
                                <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                    <div class="card-content">
                                        <span class="card-title blue-text text-darken-2" style="font-size: 1.8em; font-weight: 500;">Data Transaksi</span>
                                        <div id="sales-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                                </div>
                                <?php if ($this->session->userdata('level') == 'admin') : ?>
                                    <div class="col s6 m6">
                                        <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                            <div class="card-content">
                                                <span class="card-title green-text text-darken-1" style="font-size: 1.8em; font-weight: 500;">Banyak Pinjaman</span>
                                                <div id="user-growth-chart" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
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
                height: 450,
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
        console.log(<?php echo json_encode($monthly_data); ?>);

        var salesChart = new ApexCharts(document.querySelector("#sales-chart"), salesOptions);
        salesChart.render();

        var userGrowthOptions = {
            series: [{
                name: 'Menunggu',
                data: <?php echo json_encode($approved_data); ?>,
            }, {
                name: 'Disetujui',
                data: <?php echo json_encode($pending_data); ?>,
            }, {
                name: 'Ditolak',
                data: <?php echo json_encode($rejected_data); ?>,
            }],
            chart: {
                type: 'bar',
                height: 450
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
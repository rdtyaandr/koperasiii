<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>    
    <link rel="stylesheet" href="<?= base_url('assets/css/chartist.min.css') ?>">
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/materialize.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/chartist.min.js') ?>"></script>
    <style>
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 1.5em;
        }
        .ct-chart {
            height: 250px;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title blue-text" style="font-size: 2em; text-align: center;"><?= $title ?></span>
                        <p id="current-datetime" class="right blue" style="font-size: 1.2em; font-weight: bold; color: #FFFFFF; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); text-align: center;"></p>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col s12 m6 l3">
                                <div class="card blue lighten-1 white-text">
                                    <div class="card-content">
                                        <span class="card-title">Users</span>
                                        <h4 style="font-size: 2em;"><?= $user_count ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card green lighten-1 white-text">
                                    <div class="card-content">
                                        <span class="card-title">Orders</span>
                                        <h4 style="font-size: 2em;"><?= $order_count ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card orange lighten-1 white-text">
                                    <div class="card-content">
                                        <span class="card-title">Sales</span>
                                        <h4 style="font-size: 2em;"><?= $sales_total ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card red darken-1 white-text">
                                    <div class="card-content">
                                        <span class="card-title">Issues</span>
                                        <h4 style="font-size: 2em;"><?= $issue_count ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title">Sales Overview</span>
                                        <div id="sales-chart" class="ct-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title">User Growth</span>
                                        <div id="user-growth-chart" class="ct-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title">Revenue</span>
                                        <div id="revenue-chart" class="ct-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update current date and time
        function updateDateTime() {
            var now = new Date();
            var date = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            var time = now.toLocaleTimeString('id-ID');
            document.getElementById('current-datetime').textContent = date + ' ' + time;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // Sales Overview Chart
        new Chartist.Line('#sales-chart', <?= json_encode($sales_data) ?>, {
            fullWidth: true,
            chartPadding: {
                right: 20
            }
        });

        // User Growth Chart
        new Chartist.Bar('#user-growth-chart', <?= json_encode($user_growth_data) ?>, {
            seriesBarDistance: 8,
            axisX: {
                offset: 40
            },
            axisY: {
                offset: 60,
                scaleMinSpace: 10
            }
        });

        // Revenue Chart
        new Chartist.Pie('#revenue-chart', <?= json_encode($revenue_data) ?>, {
            donut: true,
            donutWidth: 50,
           

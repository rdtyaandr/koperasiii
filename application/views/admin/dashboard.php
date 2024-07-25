<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <span class="card-title blue-text" style="font-size: 2em; text-align: center;"><?= $title ?></span>
                    <p id="current-datetime" class="right blue" style="font-size: 1.2em; font-weight: bold; color: #FFFFFF; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); text-align: center;"></p>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col s12 m6 l3">
                            <div class="card blue lighten-1 white-text" style="border-radius: 8px;">
                                <div class="card-content">
                                    <span class="card-title">Users</span>
                                    <h4 style="font-size: 2em;">1,234</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card green lighten-1 white-text" style="border-radius: 8px;">
                                <div class="card-content">
                                    <span class="card-title">Orders</span>
                                    <h4 style="font-size: 2em;">567</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card orange lighten-1 white-text" style="border-radius: 8px;">
                                <div class="card-content">
                                    <span class="card-title">Sales</span>
                                    <h4 style="font-size: 2em;">$12,345</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card red darken-1 white-text" style="border-radius: 8px;">
                                <div class="card-content">
                                    <span class="card-title">Issues</span>
                                    <h4 style="font-size: 2em;">23</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col s12">
                            <div class="card" style="border-radius: 8px;">
                                <div class="card-content">
                                    <span class="card-title">Sales Overview</span>
                                    <div id="sales-chart" class="ct-chart" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card" style="border-radius: 8px;">
                                <div class="card-content">
                                    <span class="card-title">User Growth</span>
                                    <div id="user-growth-chart" class="ct-chart" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card" style="border-radius: 8px;">
                                <div class="card-content">
                                    <span class="card-title">Revenue</span>
                                    <div id="revenue-chart" class="ct-chart" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/plugins/chartist-js/chartist.min.js') ?>"></script>
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
    new Chartist.Line('#sales-chart', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        series: [
            [12, 9, 7, 8, 5, 6, 10],
            [2, 1, 3.5, 7, 3, 4, 6]
        ]
    }, {
        fullWidth: true,
        chartPadding: {
            right: 20
        }
    });

    // User Growth Chart
    new Chartist.Bar('#user-growth-chart', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [800, 1200, 1400, 1300],
            [200, 400, 500, 300]
        ]
    }, {
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
    new Chartist.Pie('#revenue-chart', {
        series: [20, 10, 30, 40],
        labels: ['Q1', 'Q2', 'Q3', 'Q4']
    }, {
        donut: true,
        donutWidth: 50,
        startAngle: 270,
        total: 200,
        showLabel: true
    });
</script>
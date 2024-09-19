<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <span class="card-title" style="font-size: 2em; color: #00796B; text-align: center;">Dashboard</span>
                    <p id="current-datetime" class="right" style="font-size: 1.2em; font-weight: bold; color: #FFFFFF; background-color: #00796B; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); text-align: center;"></p>
                    
                </div>
                <div class="row">
    <div class="col s12 m5">
      <div class="card-panel #e1f5fe light-blue lighten-5" style="border-radius: 20px; margin-left:1.2em">
      <p>Saldo Pinjaman: Rp. <?= number_format($loan['saldo_pinjaman'], 0, ',', '.') ?></p>
      <p>Batas Pinjaman: Rp. <?= number_format($loan['batas_pinjaman'], 0, ',', '.') ?></p>
        </span>
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
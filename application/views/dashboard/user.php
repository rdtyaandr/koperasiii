<style>
    body {
        background-color: #f4f4f9;
        color: #333;
        font-family: 'Roboto', sans-serif;
    }

    .card-content {
        padding: 20px;
    }

    .card-title {
        font-size: 1.5em;
        font-weight: bold;
    }

    .stat-card {
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        background: white;
    }

    .stat-card h4 {
        font-size: 2em;
        margin: 10px 0;
        color: #333;
    }

    .stat-card p {
        font-size: 1em;
        color: #666;
    }

    #current-datetime {
        font-size: 1.2em;
        font-weight: 500;
        padding: 10px 20px;
        border-radius: 25px;
        background: #1976d2;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .welcome-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background: #ffffff;
        padding: 20px;
        width: 100%;
    }

    .welcome-card .card-content {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .welcome-card .card-text {
        flex: 1;
        padding-right: 20px;
    }

    .welcome-card img {
        max-width: 200px;
        /* Update ukuran gambar SVG */
    }

    .welcome-card .card-title {
        font-size: 1.8em;
        color: #1976d2;
    }

    .welcome-card p {
        font-size: 1.1em;
        color: #444;
    }

    .btn-large {
        margin-top: 8px;
        border-radius: 25px;
        width: 200px;
        /* Set width to 200px */
        height: 40px;
        padding: 10px 0;
        /* Adjust vertical padding */
        font-size: 0.9em;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #1565c0;
        color: white;
        text-decoration: none;
        text-align: center;
        line-height: 1.5;
        /* Adjust line-height for vertical centering */
    }

    .btn-large:hover {
        background-color: #0d47a1;
    }
</style>

<div class="container-fluid" style="padding: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable"
                style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); background: #ffffff;">
                <div class="card-content">
                    <div class="row valign-wrapper" style="margin-bottom: 30px;">
                        <div class="col s6">
                            <span class="card-title blue-text text-darken-2"
                                style="font-size: 2.5em; font-weight: bold;">Dashboard</span>
                        </div>
                        <div class="col s6 right-align">
                            <div id="current-datetime" class="blue darken-3 white-text" style="display: inline-block;">
                                <i class="material-icons left"
                                    style="font-size: 1.2em; margin-right: 10px;">access_time</i>
                                <span id="date"></span>
                                <span id="time" style="margin-left: 10px; font-weight: bold;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="card welcome-card blue lighten-4 hoverable">
                                <div class="card-content">
                                    <div class="card-text">
                                        <span class="card-title">Selamat datang,
                                            <?php echo $this->session->userdata('name'); ?>!</span>
                                        <p>Kami senang Anda kembali.</p>
                                        <a href="<?php echo base_url('pinjaman'); ?>" class="btn-large">Ajukan
                                            peminjaman?</a>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/welcome.svg'); ?>" alt="Welcome">
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
</script>
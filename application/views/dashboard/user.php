    <style>
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
        }

        .stat-card h4 {
            font-size: 2em;
            margin: 10px 0;
        }

        .stat-card p {
            font-size: 1em;
        }

        #current-datetime {
            font-size: 1.2em;
            font-weight: 500;
            padding: 10px;
            border-radius: 50px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
    </head>

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
                            <div class="col s12">
                                <p style="font-size: 1.2em; color: #555;">Di sini Anda dapat melihat statistik dan informasi penting lainnya.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="card blue lighten-4 hoverable" style="border-radius: 10px;">
                                    <div class="card-content">
                                        <span class="card-title blue-text" style="font-weight: bold;">Informasi Terbaru</span>
                                        <p style="font-size: 1.1em;">Ikuti perkembangan terbaru dan berita penting di sini.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="card green lighten-4 hoverable" style="border-radius: 10px;">
                                    <div class="card-content">
                                        <span class="card-title green-text" style="font-weight: bold;">Tips dan Trik</span>
                                        <p style="font-size: 1.1em;">Dapatkan tips dan trik untuk memaksimalkan penggunaan dashboard ini.</p>
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
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
                    
                    <!-- Statistik cards -->
                    <div class="row">
                        <div class="col s12 m6 l3">
                            <div class="card blue darken-1 white-text" style="border-radius: 15px;">
                                <div class="card-content">
                                    <i class="material-icons right" style="font-size: 3em;">person</i>
                                    <span class="card-title" style="font-size: 1.2em;">Users</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;">1,234</h4>
                                    <p style="font-size: 1em;">+5% from last week</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card green darken-1 white-text" style="border-radius: 15px;">
                                <div class="card-content">
                                    <i class="material-icons right" style="font-size: 3em;">shopping_cart</i>
                                    <span class="card-title" style="font-size: 1.2em;">Orders</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;">567</h4>
                                    <p style="font-size: 1em;">+2% from last week</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card amber darken-1 white-text" style="border-radius: 15px;">
                                <div class="card-content">
                                    <i class="material-icons right" style="font-size: 3em;">attach_money</i>
                                    <span class="card-title" style="font-size: 1.2em;">Sales</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;">$12,345</h4>
                                    <p style="font-size: 1em;">+10% from last week</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card red darken-1 white-text" style="border-radius: 15px;">
                                <div class="card-content">
                                    <i class="material-icons right" style="font-size: 3em;">error</i>
                                    <span class="card-title" style="font-size: 1.2em;">Issues</span>
                                    <h4 style="font-size: 2.5em; margin: 10px 0;">23</h4>
                                    <p style="font-size: 1em;">-5% from last week</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Grafik -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                <div class="card-content">
                                    <span class="card-title blue-text text-darken-2" style="font-size: 1.8em; font-weight: 500;">Sales Overview</span>
                                    <div id="sales-chart" style="height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                <div class="card-content">
                                    <span class="card-title green-text text-darken-1" style="font-size: 1.8em; font-weight: 500;">User Growth</span>
                                    <div id="user-growth-chart" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);">
                                <div class="card-content">
                                    <span class="card-title orange-text text-darken-2" style="font-size: 1.8em; font-weight: 500;">Revenue Distribution</span>
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
    // Update current date and time
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

    // Sales Overview Chart
    var salesOptions = {
        series: [{
            name: 'Sales',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        chart: {
            type: 'area',
            height: 350,
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
            text: 'Product Sales by Month',
            align: 'left'
        },
        subtitle: {
            text: 'Total sales over time',
            align: 'left'
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            labels: {
                formatter: function(value) {
                    return value
                }
            }
        },
        yaxis: {
            opposite: true,
            labels: {
                formatter: function (value) {
                    return "$" + value.toFixed(2);
                }
            }
        },
        legend: {
            horizontalAlign: 'left'
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return "$" + value.toFixed(2)
                }
            }
        }
    };

    var salesChart = new ApexCharts(document.querySelector("#sales-chart"), salesOptions);
    salesChart.render();

    // User Growth Chart
    var userGrowthOptions = {
        series: [{
            name: 'New Users',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: 'Active Users',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }],
        chart: {
            type: 'bar',
            height: 300
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
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
            title: {
                text: 'Users'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " users"
                }
            }
        }
    };

    var userGrowthChart = new ApexCharts(document.querySelector("#user-growth-chart"), userGrowthOptions);
    userGrowthChart.render();

    // Revenue Distribution Chart
    var revenueOptions = {
        series: [44, 55, 13, 43],
        chart: {
            type: 'donut',
            height: 300
        },
        labels: ['Product A', 'Product B', 'Product C', 'Product D'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var revenueChart = new ApexCharts(document.querySelector("#revenue-chart"), revenueOptions);
    revenueChart.render();
</script>

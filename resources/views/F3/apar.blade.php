@include('inc.head')
@include('inc.head2')
@include('inc.navbar')
<main id="main" class="main">
    <div class="card-body">
        <h5 class="card-title">Reports <span>Today</span></h5>

        <!-- Line Chart -->
        <div id="reportsChart"></div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                fetch('/ap-ar-fetch-chart-data') // Adjust the route to match your controller method
                    .then(response => response.json())
                    .then(chartData => {
                        const chart = new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [
                                {
                                    name: 'Accounts Receivable',
                                    data: chartData.ar
                                },
                                {
                                    name: 'Accounts Payable',
                                    data: chartData.ap
                                }
                            ],
                            chart: {
                                height: 350,
                                type: 'area',
                                toolbar: {
                                    show: false
                                },
                            },
                            markers: {
                                size: 4
                            },
                            colors: ['#2eca6a', '#4154f1'],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.4,
                                    stops: [0, 90, 100]
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2
                            },
                            xaxis: {
                                type: 'datetime',
                                labels: {
                                    format: 'dd/MM/yy'
                                }
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy'
                                },
                            }
                        });

                        chart.render();
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });
            </script>


        <!-- End Line Chart -->
    </div>

</main>
@include('inc.foot')

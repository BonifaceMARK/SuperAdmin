@include('inc.head')
@include('inc.head2')
@include('inc.navbar')
<main id="main" class="main">
    <div class="card-body">
        <h5 class="card-title">Credit Management <span>Today</span></h5>

        <!-- Line Chart -->
        <div id="reportsChart"></div>

        <script>
          document.addEventListener("DOMContentLoaded", () => {

            const salesData = Array.from({ length: 7 }, () => Math.floor(Math.random() * 100));
            const revenueData = Array.from({ length: 7 }, () => Math.floor(Math.random() * 100));
            const customerData = Array.from({ length: 7 }, () => Math.floor(Math.random() * 50));

            const chart = new ApexCharts(document.querySelector("#reportsChart"), {
              series: [{
                name: 'Sales',
                data: salesData,
              }, {
                name: 'Revenue',
                data: revenueData
              }, {
                name: 'Customers',
                data: customerData
              }],
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
              colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
              },
              tooltip: {
                x: {
                  format: 'dd/MM/yy HH:mm'
                },
              }
            });

            chart.render();
          });
        </script>
        <!-- End Line Chart -->
      </div>

</main>
@include('inc.foot')

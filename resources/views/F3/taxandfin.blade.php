@include('f3.inc.head')
@include('f3.inc.head2')
@include('layouts.appsidebar');
<main id="main" class="main">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tax Management Reports</h5>

            <!-- Pie Chart -->
            <div id="taxrep"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {

                const taxData = [3000, 1500, 2000, 2500, 1800]; // Sample data representing amounts for different real estate categories

                new ApexCharts(document.querySelector("#taxrep"), {
                  series: taxData,
                  chart: {
                    height: 350,
                    type: 'pie',
                    toolbar: {
                      show: true
                    }
                  },
                  labels: ['Residential', 'Commercial', 'Industrial', 'Land', 'Mixed Use']
                }).render();
              });
            </script>
            <!-- End Pie Chart -->

          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Financial Reports</h5>

            <!-- Pie Chart -->
            <div id="finrep"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {

                const financialData = [5000, 4000, 3500, 4500, 3800]; // Sample data representing amounts for different real estate categories

                new ApexCharts(document.querySelector("#finrep"), {
                  series: financialData,
                  chart: {
                    height: 350,
                    type: 'pie',
                    toolbar: {
                      show: true
                    }
                  },
                  labels: ['Residential', 'Commercial', 'Industrial', 'Land', 'Mixed Use']
                }).render();
              });
            </script>
            <!-- End Pie Chart -->

          </div>
        </div>
      </div>

</main>
@include('f3.inc.foot')


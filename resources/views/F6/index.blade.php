
@extends('layout.title')

@section('title', env('APP_NAME'))

@include('layout.title')
<body>

  <!-- ======= Header ======= -->

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('superadmin') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/fmslogo.png')}}" alt="">
        <span class="d-none d-lg-block">Financial Guardians</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>

          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

     <!-- Notifications Nav -->
<li class="nav-item dropdown">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>

    </a>
    <!-- Notification Dropdown Items -->
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">

        </li>
        <li><hr class="dropdown-divider"></li>
        <!-- Notification Items -->
        <div class="notification-scroll">
            <!-- Notification Items for Expenses -->

            <!-- End of Notification Items for Expenses -->

            <!-- Notification Items for RequestBudget -->

            <!-- End of Notification Items for RequestBudget -->

            <!-- Notification Items for CostAllocation -->

            <!-- End of Notification Items for CostAllocation -->
        </div>
        <li class="dropdown-footer">
        </li>
    </ul>
    <!-- End Notification Dropdown Items -->
</li>
<!-- End Notifications Nav -->


          <li class="nav-item dropdown">



          </li><!-- End Messages Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/admin.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>

          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> {{ auth()->user()->email }} </h6>
              <span>{{ auth()->user()->department }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center btn btn-primary btn-notification" data-bs-toggle="modal" data-bs-target="#recentActivityModal">
                        <i class="bi bi-bell-fill"></i> View Recent Activity
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->

        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.appsidebar');

  <main id="main" class="main">


                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container mt-12">
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Report Notification</h4>
        <p >Here is your report:</p>
        <hr>
        <p id="reportContent" class="mb-0"></p>
        <button id="downloadReportButton" class="btn btn-primary mt-2">Download Report</button>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Function to handle displaying the report content
        function displayReport() {
            // Get the content of the report notification
            let reportContent = document.getElementById('reportContent').innerText;

            // Update the report content paragraph
            document.getElementById('reportContent').innerText = reportContent;
        }

        // Add event listener to the download report button
        let downloadReportButton = document.getElementById('downloadReportButton');
        downloadReportButton.addEventListener('click', displayReport);
    });
</script>

<!-- Reports -->
<div class="col-12">
    <div class="card">

      <div class="card-body">
        <h5 class="card-title">Reports <span>/Today</span></h5>

        <!-- Line Chart -->
        <div id="reportsChart"></div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
              let paymentData = @json($paymentData);
              let freightData = @json($freightData);
              let adminData = @json($adminData);

              // Function to check trend
              function checkTrend(data) {
                let trend = 'stable';
                for (let i = 1; i < data.length; i++) {
                  if (data[i] > data[i - 1]) {
                    if (trend === 'down') {
                      return 'mixed'; // Data was previously going down, now going up
                    }
                    trend = 'up';
                  } else if (data[i] < data[i - 1]) {
                    if (trend === 'up') {
                      return 'mixed'; // Data was previously going up, now going down
                    }
                    trend = 'down';
                  }
                }
                return trend;
              }

              // Function to update report content based on trend
              function updateReportContent(trend) {
                let reportContent = document.getElementById('reportContent');
                let trendText = '';
                switch (trend) {
                  case 'up':
                    trendText = 'going up';
                    break;
                  case 'down':
                    trendText = 'going down';
                    break;
                  case 'stable':
                    trendText = 'stable';
                    break;
                  case 'mixed':
                    trendText = 'mixed'; // If the trend is mixed, don't provide a clear trend
                    break;
                  default:
                    trendText = 'unknown';
                    break;
                }
                reportContent.innerHTML = `Here is your report:<br>The chart data is currently ${trendText}.`;
              }

              // Check trend for payment data
              let paymentTrend = checkTrend(paymentData.map(item => item.transactionAmount));
              // Check trend for freight data
              let freightTrend = checkTrend(freightData.map(item => item.freightAmount));
              // Check trend for admin data
              let adminTrend = checkTrend(adminData.map(item => item.amount));

              // Update report content based on the most significant trend
              if (paymentTrend === 'mixed' || freightTrend === 'mixed' || adminTrend === 'mixed') {
                updateReportContent('mixed');
              } else if (paymentTrend === 'up' || freightTrend === 'up' || adminTrend === 'up') {
                updateReportContent('up');
              } else if (paymentTrend === 'down' || freightTrend === 'down' || adminTrend === 'down') {
                updateReportContent('down');
              } else {
                updateReportContent('stable');
              }

              // Render the chart
              new ApexCharts(document.querySelector("#reportsChart"), {
                series: [
                  {
                    name: 'Payment Gateway',
                    data: paymentData.map(item => item.transactionAmount)
                  },
                  {
                    name: 'Freight Payment',
                    data: freightData.map(item => item.freightAmount)
                  },
                  {
                    name: 'Admin Payment',
                    data: adminData.map(item => item.amount)
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
                  categories: paymentData.map(item => item.transactionDate)
                },
                tooltip: {
                  x: {
                    format: 'dd/MM/yy HH:mm'
                  },
                }
              }).render();
            });
          </script>


      </div>

    </div>
  </div><!-- End Reports -->





</main>



@include('layout.footer')

</body>

</html>

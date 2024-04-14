
@extends('layout.title')

@section('title', env('APP_NAME'))

@include('layout.title')
<body>

  <!-- ======= Header ======= -->

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
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


<div class="row">
    <div class="col-12">
        <button type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#financialPlanningModal" style="background-image: url('{{ asset('assets/img/budget.jpg') }}'); background-size: cover; height: 110px; width: 1000px;">
       <strong>Budget Plan</strong>
        </button>
        <!-- Button to trigger the modal -->

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="financialPlanningModal" tabindex="-1" aria-labelledby="financialPlanningModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="financialPlanningModalLabel">Create Budget Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding financial planning -->
                <form action="{{ route('BudgetPlan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Purpose</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="target_revenue" class="form-label">Target Revenue</label>
                        <input type="number" class="form-control" id="target_revenue" name="target_revenue">
                    </div>
                    <div class="mb-3">
                        <label for="target_expense" class="form-label">Target Expense</label>
                        <input type="number" class="form-control" id="target_expense" name="target_expense">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Investments Report <span>/ Today</span></h5>
        <div id="investmentsChart" style="min-height: 365px;"></div>
        <p class="trend-info">Trend: <span id="trendText"></span></p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Fixed Asset Reports <span>/ Today</span></h5>
        <div id="reportsChart" style="min-height: 365px;"></div>
        <p class="trend-info">Trend: <span id="fixedAssetTrendText"></span></p>
    </div>
</div>

<!-- Include libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/csv-export@3.1.1/dist/csv-export.bundle.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Render Investments Chart
        const investmentsData = {!! json_encode($investments->pluck('amount')) !!};
        const investmentsDates = {!! json_encode($investments->pluck('investment_date')) !!};
        new ApexCharts(document.querySelector("#investmentsChart"), {
            series: [{ name: 'Investments', data: investmentsData }],
            chart: { height: 350, type: 'line', toolbar: { show: false } },
            xaxis: { categories: investmentsDates }
        }).render();

        // Render Reports Chart
        const paymentsData = {!! json_encode($payments->pluck('amount')) !!};
        const paymentsDates = {!! json_encode($payments->pluck('payment_date')) !!};
        const seriesData = paymentsData.map((amount, index) => [new Date(paymentsDates[index]).getTime(), amount]);
        const reportsChart = new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{ name: 'Amount', data: seriesData }],
            chart: { height: 350, type: 'line', toolbar: { show: false } },
            xaxis: { type: 'datetime', categories: paymentsDates }
        });
        reportsChart.render();

        // Calculate and display trend for Investments
        const investmentsTrendText = document.getElementById('trendText');
        const investmentsTrend = calculateTrend(investmentsData);
        investmentsTrendText.textContent = investmentsTrend;

        // Calculate and display trend for Fixed Asset Reports
        const fixedAssetTrendText = document.getElementById('fixedAssetTrendText');
        const fixedAssetTrend = calculateTrend(paymentsData);
        fixedAssetTrendText.textContent = fixedAssetTrend;
    });

    function calculateTrend(data) {
        const len = data.length;
        if (len < 2) return "not available";

        const current = data[len - 1];
        const previous = data[len - 2];

        if (current > previous) return "Going Up";
        if (current < previous) return "Going Down";
        return "Stable";
    }
</script>

<style>
    .trend-info { margin-top: 10px; }
</style>



<!-- Include html2pdf library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<!-- Include csv-export library -->
<script src="https://cdn.jsdelivr.net/npm/csv-export@3.1.1/dist/csv-export.bundle.js"></script>









</main>



@include('layout.footer')

</body>

</html>

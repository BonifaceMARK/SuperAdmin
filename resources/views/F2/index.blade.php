
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






<section class="section dashboard">
    <div class="row">

        <div class="card">
            <div class="card-body">

                <h1 class="card-title"><i class="bi bi-grid-1x2-fill"></i> Introduction
                      <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pieChartModal">
        Open Expenses Pie Chart
    </button>
<!-- Button to trigger the modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCostAllocationModal">
    Create Cost Allocation
</button>
    <!-- Modal -->
    <div class="modal fade" id="pieChartModal" tabindex="-1" aria-labelledby="pieChartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pieChartModalLabel">Expenses Overview Pie Chart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <canvas id="pieChart" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                    labels: [
                                        'Tax Expenses',
                                        'HRMS Expenses',
                                        'Freight Expenses',
                                        'Fixed Asset Expenses',
                                        'Admin Expenses',
                                    ],
                                    datasets: [{
                                        label: 'Payment Data',
                                        data: [
                                            {{ $taxPaymentsTotal }},
                                            {{ $paymentGatewayTotal }},
                                            {{ $freightPaymentsTotal }},
                                            {{ $fixedAssetPaymentsTotal }},
                                            {{ $adminPaymentsTotal }},
                                        ],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(153, 102, 255)',
                                        ],
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        });
                    </script><!-- Button to trigger modal -->
                   </h1>

<!-- Modal for creating a new cost allocation -->
<div class="modal fade" id="createCostAllocationModal" tabindex="-1" aria-labelledby="createCostAllocationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCostAllocationModalLabel">Create Cost Allocation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cost-allocations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost:</label>
                        <input type="text" class="form-control" id="cost" name="cost" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost_type" class="form-label">Cost Type:</label>
                        <input type="text" class="form-control" id="cost_type" name="cost_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="budget" class="form-label">Budget:</label>
                        <input type="number" class="form-control" id="budget" name="budget" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="mb-3">
                        <label for="created_by" class="form-label">Created By:</label>
                        <input type="text" class="form-control" id="created_by" name="created_by" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                <!-- Integration of Expense, Budget, Cost, & Forecasting -->
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/img/unsplash4.jpg') }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Integration of Expense, Budget, Cost, & Forecasting</h5>
                                <p class="card-text">In expense budgeting and forecasting, "forecast" refers to the estimation or prediction of future expenses based on historical data, trends, and other relevant factors. This process involves analyzing past expenditure patterns, economic conditions, industry trends, and any other relevant factors to make informed projections about future expenses.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expense Forecasting Process -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">


                            <!-- Step 1: Historical Data Analysis -->
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><i class="bi bi-clock-history"></i> 1. Historical Data Analysis:</strong></h5>
                                            <p> The first step in expense forecasting is to analyze historical expenditure data. This involves examining past expenses over a specific period, such as monthly, quarterly, or annually. By analyzing historical data, organizations can identify patterns, trends, and seasonal variations in expenses.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('assets/img/data.jpg') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Identification of Key Drivers -->
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('assets/img/key.jpg') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><i class="bi bi-search"></i> 2. Identification of Key Drivers:</strong></h5>
                                            <p> After analyzing historical data, the next step is to identify the key drivers that influence expenses. This may include factors such as inflation rates, changes in market conditions, business expansion or contraction, regulatory changes, and other variables that impact expenses.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Forecasting Methods -->
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><i class="bi bi-clipboard2-data-fill"></i> 3. Forecasting Methods:</strong></h5>
                                            <p> There are various methods and techniques used for expense forecasting, including quantitative methods (e.g., time series analysis, regression analysis) and qualitative methods (e.g., expert judgment, market research). The choice of forecasting method depends on factors such as the availability of data, the complexity of the expense patterns, and the level of accuracy required.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('assets/img/forecast.jpg') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Budgeting Process -->
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('assets/img/calculate.jpg') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><i class="bi bi-calculator"></i> 4. Budgeting Process:</strong></h5>
                                            <p> Once the forecasted expenses are determined, they are incorporated into the budgeting process. Budgeting involves allocating financial resources to different expense categories based on the forecasted amounts. This helps organizations plan and allocate resources effectively to meet their financial goals and objectives.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: Monitoring and Adjustments -->
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><i class="bi bi-eye-fill"></i> 5. Monitoring and Adjustments:</strong></h5>
                                            <p> Expense forecasting is an ongoing process that requires regular monitoring and adjustments. As actual expenses are incurred, they are compared to the forecasted amounts, and any significant variances are investigated. Adjustments may be made to the forecast based on new information, changes in business conditions, or other factors that impact expenses.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('assets/img/monitor.jpg') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                </div>
                            </div>


                            <!-- Bootstrap JS -->
                            <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

                        </div>
                    </div>
                </div>
            </div>
        </div>












<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



      </div><!-- End Right side columns -->

    </div>
  </section>



</main>



@include('layout.footer')

</body>

</html>

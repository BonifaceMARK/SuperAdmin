@extends('layout.title')

@section('title', env('APP_NAME'))

@include('layout.title')

<body>

    <!-- ======= Header ======= -->

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('superadmin') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/fmslogo.png') }}" alt="">
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
                        <li>
                            <hr class="dropdown-divider">
                        </li>
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

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/admin.png') }}" alt="Profile" class="rounded-circle">
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
                            <a class="dropdown-item d-flex align-items-center btn btn-primary btn-notification"
                                data-bs-toggle="modal" data-bs-target="#recentActivityModal">
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


        @if (Session::has('success'))
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





    <div class="alert alert-info" role="alert">
        <div id="chart"></div>
             <!-- Progress Bars with labels -->
             @foreach ($riskManagements as $riskManagement)
             <div class="progress mt-3">
                 <div class="progress-bar" role="progressbar" style="width: {{ $riskManagement->severity }}%" aria-valuenow="{{ $riskManagement->severity }}" aria-valuemin="0" aria-valuemax="100">{{ $riskManagement->severity }}%</div>
             </div>
         @endforeach
         <!-- End Progress Bars with labels -->

        <h4 class="alert-heading">Report Notification</h4>
        <p>Here is your report:</p>
        <hr>
        @foreach ($riskManagements as $riskManagement)
            <p class="mb-0">
                Title: {{ $riskManagement->title }} <br>
                Description: {{ $riskManagement->description }} <br>
                Severity: {{ $riskManagement->severity }} <br>
                Status: {{ $riskManagement->status }}
            </p>
        @endforeach
        <div class="card-body">
            <h1 class="card-title">Risk Management Progress</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Target Revenue</th>
                                            <th>Target Expense</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Severity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($budgetPlans as $budgetPlan)
                                        <tr>
                                            <td>{{ $budgetPlan->name }}</td>
                                            <td>{{ $budgetPlan->description }}</td>
                                            <td>{{ $budgetPlan->target_revenue }}</td>
                                            <td>{{ $budgetPlan->target_expense }}</td>
                                            <td>{{ $budgetPlan->start_date }}</td>
                                            <td>{{ $budgetPlan->end_date }}</td>
                                            <td>{{ $budgetPlan->status }}</td>
                                            <td>{{ $budgetPlan->severity }}</td>
                                            <td>

                                                <button type="button" class="btn btn-sm btn-primary modal-button" data-bs-toggle="modal" data-bs-target="#viewModal{{ $budgetPlan->id }}">View</button>
                                            </td>
                                        </tr>
                                        <!-- View Modal for Budget Plan -->
                                        <div class="modal fade" id="viewModal{{ $budgetPlan->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $budgetPlan->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel{{ $budgetPlan->id }}">View Budget Plan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <!-- Add this form inside the modal body to edit severity -->
<form action="{{ route('budget_plans.update_severity', $budgetPlan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="severity" class="form-label">Severity</label>
        <input type="range" class="form-range" id="severity" name="severity" min="0" max="100" value="0">
    </div>
    <div class="progress mt-2">
        <div id="severityProgress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
    </div>

    <script>
        // Get the severity input and progress bar
        const severityInput = document.getElementById('severity');
        const severityProgress = document.getElementById('severityProgress');

        // Update progress bar based on severity input value
        severityInput.addEventListener('input', function() {
            const severityValue = parseInt(severityInput.value);
            severityProgress.style.width = severityValue + '%';
            severityProgress.setAttribute('aria-valuenow', severityValue);
            severityProgress.textContent = severityValue + '%';
        });
    </script>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of View Modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var options = {
        series: [{
            name: 'Amount',
            data: [{{ $taxData }}, {{ $paymentData }}, {{ $budgetData }}, {{ $fixedAssetData }}, {{ $adminData }}],
        }],
        chart: {
            type: 'line',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Tax Payments', 'Payment Gateways', 'Budgets', 'Fixed Asset Payments', 'Admin Payments'],
        },
        title: {
            text: 'Summary of Financial Transactions'
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get budget plan data from the server
        let budgetPlans = @json($budgetPlans);

        // Extract names and severities for chart labels and data
        let names = budgetPlans.map(plan => plan.name);
        let severities = budgetPlans.map(plan => plan.severity);

        // Create the chart
        let ctx = document.getElementById('budgetChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: names,
                datasets: [{
                    label: 'Severity',
                    data: severities,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

      <div class="card-body">
        <h5 class="card-title">Reports <span>/Today</span></h5>
        <div class="container">
            <h1>Budget Plan Severity Chart</h1>
            <canvas id="budgetChart" width="400" height="200"></canvas>
        </div>
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
                                        series: [{
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


            </div>
            </div>

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Risk Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

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






    </main>



    @include('layout.footer')

</body>

</html>

@extends('layout.title')

@section('title', env('APP_NAME'))
@include('layout.title')

<body>

    <!-- ======= Header ======= -->

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
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

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="pagetitle">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Investment Management</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->

                        <!-- Investment Card -->
                        <div class="col-xxl-3 col-md-6 col-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Users </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $userCount }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Investment Card -->

                        <!-- Investment Card -->
                        <div class="col-xxl-3 col-md-6 col-6">
                            <div class="card info-card warning-card">
                                <div class="card-body">
                                    <h5 class="card-title">Withdrawal</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-down"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>${{ number_format($data, 2, '.', ',') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->

                        <!-- Investment Card -->
                        <div class="col-xxl-3 col-md-6 col-12">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Investment </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-lines-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>${{ number_format($investment, 2, '.', ',') }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                                        class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Investment Card -->

                        <!-- Investment Card -->
                        <div class="col-xxl-3 col-md-6 col-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Company Budget</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-up"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>${{ number_format($countBalance, 2, '.', ',') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End Investment Card -->


                        {{-- <div class="pagetitle">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Investment Management</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title --> --}}

                        <!-- Reports -->
                        {{-- <div class="col-12">
                            <div class="card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Reports <span>/Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            fetch('{{ route('fetch.data') }}')
                                                .then(response => response.json())
                                                .then(data => {
                                                    // Extract data for each series
                                                    const investmentData = data.investment.map(item => item.total);
                                                    const balanceData = data.accounts.map(item => item.total);
                                                    const payoutsData = data.payouts.map(item => item.total);

                                                    // Define month labels for all months of the year
                                                    // 'Jan', 'Feb', 'Mar', 
                                                    const monthLabels = [
                                                        'Apr', 'May', 'Jun',
                                                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                                                    ];

                                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                                        series: [{
                                                            name: 'Investment',
                                                            data: investmentData,
                                                        }, {
                                                            name: 'Account',
                                                            data: balanceData,
                                                        }, {
                                                            name: 'Payouts',
                                                            data: payoutsData,
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
                                                            type: 'category', // Use categories as labels
                                                            categories: monthLabels, // Use all months of the year
                                                        },
                                                        tooltip: {
                                                            x: {
                                                                format: 'dd/MM/yy HH:mm'
                                                            },
                                                        }
                                                    }).render();
                                                })
                                                .catch(error => {
                                                    console.error('Error fetching data:', error);
                                                });
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div><!-- End Reports --> --}}


                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i>
    </a>
    @include('layout.footer')

</body>

</html>

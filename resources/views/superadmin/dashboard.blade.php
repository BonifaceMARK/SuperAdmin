
@extends('layout.title')

@section('title','Home')
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
  @include('superadmin.sidebar')

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



    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href="{{ route('payment') }}" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/budget.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Finance 5
                </a>
                <a href="#" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/allocated.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Another Link
                </a>
                <a href="#" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/calculate.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Another Link
                </a>
                <!-- Add more buttons as needed -->
            </div>
            <div class="col-3">
                <a href="{{ route('payment') }}" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/expense.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Finance 5
                </a>
                <a href="#" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/forecast.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Another Link
                </a>
                <a href="#" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/monitor.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Another Link
                </a>
                <!-- Add more buttons as needed -->
            </div>
            <div class="col-3">
                <a href="{{ route('payment') }}" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/budget.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Finance 5
                </a>
                <a href="#" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/budget.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Another Link
                </a>
                <a href="#" class="btn btn-primary mb-3 d-block w-100" style="background-image: url('{{ asset('assets/img/budget.jpg') }}'); background-size: cover; background-position: center; color: white; text-decoration: none; padding: 30px 60px; border: none; cursor: pointer; font-size: 2rem;">
                    Another Link
                </a>
                <!-- Add more buttons as needed -->
            </div>
        </div>
    </div>










</main>



@include('layout.footer')

</body>

</html>

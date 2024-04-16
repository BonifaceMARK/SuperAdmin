
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

<!-- Modal -->
<div class="modal fade" id="bankTransactionModal" tabindex="-1" role="dialog" aria-labelledby="bankTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankTransactionModalLabel">Bank Transaction Reports</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="card-body">
                        <h5 class="card-title">Bank Transaction Details</h5>

                        <div class="activity">

                            <div class="activity-item d-flex">
                                <div class="activite-label">Description:</div>
                                <div class="activity-content">{{ $cashManagement->description }}</div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Revenue:</div>
                                <div class="activity-content">${{ number_format($cashManagement->revenue, 2) }}</div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Outflow:</div>
                                <div class="activity-content">${{ number_format($cashManagement->outflow, 2) }}</div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Net Income:</div>
                                <div class="activity-content">${{ number_format($cashManagement->net_income, 2) }}</div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Financial Health Status:</div>
                                <div class="activity-content">
                                    @if ($financialHealthStatus === 'Healthy')
                                        <span class="text-success">Congratulations! Your financial health is healthy.</span>
                                    @else
                                        <span class="text-danger">Warning! Your financial health is poor. Please take necessary actions to improve it.</span>
                                    @endif
                                </div>
                            </div><!-- End activity item-->
                            <div class="card-body">
                                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                                <div class="activity">
                                    @foreach($activities as $activity)
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">{{ $activity->created_at->diffForHumans() }}</div>
                                        <i class="bi bi-circle-fill activity-badge text-{{ $activity->net_income >= 0 ? 'success' : 'danger' }} align-self-start"></i>
                                        <div class="activity-content">
                                            Description: {{ $activity->description }} <br>
                                            Revenue: ${{ number_format($activity->revenue, 2) }} <br>
                                            Outflow: ${{ number_format($activity->outflow, 2) }} <br>
                                            Net Income: ${{ number_format($activity->net_income, 2) }}
                                        </div>
                                    </div><!-- End activity item-->
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Bank Reconcilation <!-- Button to trigger the modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bankTransactionModal">
                    View Bank Transaction Reports
                </button></h5>
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Phone 1</th>
                        <th>Phone 2</th>
                        <th>Phone 3</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- eto yung pag pasok ng data sa table --}}
                </tbody>
            </table>
        </div>
    </div>
</div>


<tr>
    <td>
        <!-- The Modal -->
        {{-- pagkuha ng ID need baguhin --}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Details for ID: </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- dito papasok ung sa modal data --}}
                    </div>
                    {{-- <div class="modal-footer">

                    </div> --}}
                </div>
            </div>
        </div> <!--  end of modal -->
    </td>
</tr>







<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <large class="card-title">
                    <b>Client Feedback</b>
                </large>
                {{-- <a  class="btn btn-primary btn-block col-md-2 float-right" href="https://docs.google.com/forms/d/e/1FAIpQLSc-Zxf3Ttd_naLtQehBzI5t-4caj_i7KxNxl-ecjucTGW1FVQ/viewform?usp=sf_link"> Report Link</a> --}}
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="loan-list">
                    <colgroup>
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Contact Number</th>
                            <th class="text-center">Comments</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       {{-- data sa table --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    td p {
        margin: unset;
    }
    td img {
        width: 8vw;
        height: 12vh;
    }
    td {
        vertical-align: middle !important;
    }
</style>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Application List</b>
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_borrower"><i class="fa fa-plus"></i> Apply</button>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="borrower-list">
					<colgroup>
						<col width="10%">
						<col width="35%">
						<col width="30%">
						<col width="15%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Client Details</th>
							<th class="text-center">Credit Details</th>
							<!-- <th class="text-center">Next Payment Schedule</th> -->
							<th class="text-center">Client Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						{{--  data --}}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</main>




<script>
    // JavaScript to trigger the modal
    document.getElementById('new_borrower').addEventListener('click', function () {
        $('#applyModal').modal('show');
    });
</script>



@include('layout.footer')

</body>

</html>

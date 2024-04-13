
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

<div class="row">
    <div class="col-12">
        <!-- Button with custom styling -->
        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#servicesModal" style="background-image: url('{{ asset("assets/img/REST.jpg") }}'); background-size: cover; font-size: 35px; padding: 50px 300px;">
            Hotel & Restaurants
        </button>
    </div>
</div>






<!-- Modal -->
<div  class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentGatewayModal" onclick="setService('Accommodation')">Accommodation</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentGatewayModal" onclick="setService('Meals')">Meals</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentGatewayModal" onclick="setService('Beverages')">Beverages</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentGatewayModal" onclick="setService('Service Charges')">Service Charges</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentGatewayModal" onclick="setService('Room Service')">Room Service</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal for adding payment gateway -->
<div class="modal fade" id="addPaymentGatewayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding payment gateway -->
                <form id="paymentGatewayForm" action="{{ route('paymentgateways.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="service" class="form-label">Service</label>
                        <input type="text" class="form-control" id="service" name="service" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName">
                    </div>
                    <div class="mb-3">
                        <label for="transactionName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="transactionName" name="transactionName">
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" id="paymentMethod" name="paymentMethod">
                    </div>
                    <div class="mb-3">
                        <label for="cardType" class="form-label">Card Type</label>
                        <input type="text" class="form-control" id="cardType" name="cardType">
                    </div>
                    <div class="mb-3">
                        <label for="transactionType" class="form-label">Transaction Type</label>
                        <input type="text" class="form-control" id="transactionType" name="transactionType">
                    </div>
                    <div class="mb-3">
                        <label for="transactionAmount" class="form-label">Transaction Amount</label>
                        <input type="number" step="0.01" class="form-control" id="transactionAmount" name="transactionAmount">
                    </div>
                    <div class="mb-3">
                        <label for="transactionDate" class="form-label">Transaction Date</label>
                        <input type="datetime-local" class="form-control" id="transactionDate" name="transactionDate">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="transactionStatus" class="form-label">Transaction Status</label>
                        <input type="text" class="form-control" id="transactionStatus" name="transactionStatus">
                    </div>

                    <button type="submit" class="btn btn-primary">Pay now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <!-- Button with custom styling for Freight -->
        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#freightServicesModal" style="background-image: url('{{ asset("assets/img/freight.jpg") }}'); background-size: cover; font-size: 35px; padding: 50px 335px;">
            Freight Services
        </button>
    </div>
</div>

<!-- Freight Services Modal -->
<div class="modal fade" id="freightServicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Freight Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFreightModal" onclick="setFreightService('Freight Charges')">Freight Charges</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFreightModal" onclick="setFreightService('Customs Duties and Taxes')">Customs Duties and Taxes</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFreightModal" onclick="setFreightService('Insurance Premiums')">Insurance Premiums</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFreightModal" onclick="setFreightService('Handling and Storage Fees')">Handling and Storage Fees</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFreightModal" onclick="setFreightService('Documentation Fees')">Documentation Fees</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFreightModal" onclick="setFreightService('Surcharge Fees')">Surcharge Fees</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFreightModal" onclick="setFreightService('Ancillary Services')">Ancillary Services</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Modal for adding freight payments -->
<div class="modal fade" id="addFreightModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Freight Payment Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding freight payments -->
                <form id="freightPaymentForm" action="{{ route('freightpayments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="freightService" class="form-label">Freight Service</label>
                        <input type="text" class="form-control" id="freightService" name="freightService" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="freightAmount" class="form-label">Freight Amount</label>
                        <input type="number" step="0.01" class="form-control" id="freightAmount" name="freightAmount">
                    </div>
                    <div class="mb-3">
                        <label for="freightDate" class="form-label">Freight Date</label>
                        <input type="datetime-local" class="form-control" id="freightDate" name="freightDate">
                    </div>
                    <div class="mb-3">
                        <label for="freightDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="freightDescription" name="freightDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="freightStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="freightStatus" name="freightStatus">
                    </div>
                    <button type="submit" class="btn btn-primary">Pay now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <!-- Button with custom styling for Administrative Payments -->
        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#adminPaymentsModal" style="background-image: url('{{ asset("assets/img/admin.jpg") }}'); background-size: cover; font-size: 35px; padding: 50px 300px;">
            Administrative Payments
        </button>
    </div>
</div>

<!-- Administrative Payments Modal -->
<div class="modal fade" id="adminPaymentsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Administrative Payments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminPaymentModal" onclick="setAdminPaymentType('Freight Charges')">Freight Charges</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminPaymentModal" onclick="setAdminPaymentType('Customs Duties and Taxes')">Customs Duties and Taxes</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminPaymentModal" onclick="setAdminPaymentType('Insurance Premiums')">Insurance Premiums</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminPaymentModal" onclick="setAdminPaymentType('Handling and Storage Fees')">Handling and Storage Fees</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminPaymentModal" onclick="setAdminPaymentType('Documentation Fees')">Documentation Fees</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminPaymentModal" onclick="setAdminPaymentType('Surcharge Fees')">Surcharge Fees</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminPaymentModal" onclick="setAdminPaymentType('Ancillary Services')">Ancillary Services</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal for adding administrative payments -->
<div class="modal fade" id="addAdminPaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Administrative Payment Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding administrative payments -->
                <form id="adminPaymentForm" action="{{ route('adminpayments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="adminPaymentType" class="form-label">Payment Type</label>
                        <input type="text" class="form-control" id="adminPaymentType" name="adminPaymentType" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentAmount" class="form-label">Payment Amount</label>
                        <input type="number" step="0.01" class="form-control" id="adminPaymentAmount" name="adminPaymentAmount">
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentDate" class="form-label">Payment Date</label>
                        <input type="datetime-local" class="form-control" id="adminPaymentDate" name="adminPaymentDate">
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="adminPaymentDescription" name="adminPaymentDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="adminPaymentStatus" name="adminPaymentStatus">
                    </div>
                    <button type="submit" class="btn btn-primary">Pay now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setAdminPaymentType(paymentType) {
        document.getElementById('adminPaymentType').value = paymentType;
    }
</script>

<script>
    // Function to set the freight service dynamically
    function setFreightService(service) {
        document.getElementById('freightService').value = service;
    }

    // Reset the form when the modal is closed
    $('#addFreightModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
</script>

<script>
    function setService(service) {
        document.getElementById('service').value = service;

        // Automatically fill corresponding fields based on the selected service
        switch (service) {
            case 'Accommodation':
                document.getElementById('productName').value = '';
                document.getElementById('transactionName').value = '';
                document.getElementById('paymentMethod').value = '';
                document.getElementById('cardType').value = '';
                document.getElementById('transactionType').value = '';
                document.getElementById('transactionAmount').value = '';
                document.getElementById('transactionDate').value = '';
                document.getElementById('description').value = '';
                document.getElementById('transactionStatus').value = '';
                break;
            case 'Meals':
                document.getElementById('productName').value = '';
                document.getElementById('transactionName').value = '';
                document.getElementById('paymentMethod').value = '';
                document.getElementById('cardType').value = '';
                document.getElementById('transactionType').value = '';
                document.getElementById('transactionAmount').value = '';
                document.getElementById('transactionDate').value = '';
                document.getElementById('description').value = '';
                document.getElementById('transactionStatus').value = '';
                break;
            case 'Beverages':
                document.getElementById('productName').value = '';
                document.getElementById('transactionName').value = '';
                document.getElementById('paymentMethod').value = '';
                document.getElementById('cardType').value = '';
                document.getElementById('transactionType').value = '';
                document.getElementById('transactionAmount').value = '';
                document.getElementById('transactionDate').value = '';
                document.getElementById('description').value = '';
                document.getElementById('transactionStatus').value = '';
                break;
            case 'Service Charges':
                document.getElementById('productName').value = '';
                document.getElementById('transactionName').value = '';
                document.getElementById('paymentMethod').value = '';
                document.getElementById('cardType').value = '';
                document.getElementById('transactionType').value = '';
                document.getElementById('transactionAmount').value = '';
                document.getElementById('transactionDate').value = '';
                document.getElementById('description').value = '';
                document.getElementById('transactionStatus').value = '';
                break;
            case 'Room Service':
                document.getElementById('productName').value = '';
                document.getElementById('transactionName').value = '';
                document.getElementById('paymentMethod').value = '';
                document.getElementById('cardType').value = '';
                document.getElementById('transactionType').value = '';
                document.getElementById('transactionAmount').value = '';
                document.getElementById('transactionDate').value = '';
                document.getElementById('description').value = '';
                document.getElementById('transactionStatus').value = '';
                break;
            default:
                // Default case
                break;
        }
    }
</script>



@include('layout.footer')

</body>

</html>

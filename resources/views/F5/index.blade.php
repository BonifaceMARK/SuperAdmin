
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




<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    Chat
                </div>
                <div class="card-body">
                    <div class="chat-container overflow-auto">
                        <div class="chat-box" id="chatBox">
                            <!-- Messages will appear here -->
                            @foreach($messages->reverse() as $message)
                            <div class="message{{ $message->user->id == Auth::user()->id ? ' outgoing' : ' incoming' }}">
                                <div class="message-details{{ $message->user->id == Auth::user()->id ? ' text-end' : '' }}">
                                    <span class="message-sender">{{ $message->user->name }}</span>
                                    <span class="message-time">{{ $message->created_at->format('M d, Y H:i A') }}</span>
                                </div>
                                <div class="message-content{{ $message->user->id == Auth::user()->id ? ' outgoing' : ' incoming' }}">{{ $message->message }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('chat.store') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control chat-input" placeholder="Type your message..." id="messageInput" name="message">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i>Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
      <!-- Button to trigger the modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rightSidebarModal" style="background-image: url('{{ asset("assets/img/pay.jpg") }}'); background-size: cover; background-position: center; color: white; padding: 135px 20px;">
    Pay Here !
</button>


            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="rightSidebarModal" tabindex="-1" aria-labelledby="rightSidebarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="rightSidebarModalLabel">Payment Options</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#adminPaymentsModal">
                        Pay Administrative Expenses
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#taxPaymentsModal">
                        Pay Tax
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#fixedAssetPaymentModal">
                        Pay Fixed Asset
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#freightServicesModal">
                        Freight Services
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#servicesModal">
                        Hotel & Restaurants
                    </button>
                </div>
            </div>
        </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Payment Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding freight payments -->
                <form id="freightPaymentForm" action="{{ route('freightpayments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="freightService" class="form-label"> Service</label>
                        <input type="text" class="form-control" id="freightService" name="freightService" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="freightAmount" class="form-label"> Amount</label>
                        <input type="number" step="0.01" class="form-control" id="freightAmount" name="freightAmount">
                    </div>
                    <div class="mb-3">
                        <label for="freightDate" class="form-label"> Date</label>
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


<div class="modal fade" id="fixedAssetPaymentModal" tabindex="-1" aria-labelledby="fixedAssetPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fixedAssetPaymentModalLabel">Add Fixed Asset Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding fixed asset payments -->
                <form id="fixedAssetPaymentForm" action="{{ route('fixedassetpayments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="assetName" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="assetName" name="asset_name">
                    </div>
                    <div class="mb-3">
                        <label for="assetDescription" class="form-label">Asset Description</label>
                        <textarea class="form-control" id="assetDescription" name="asset_description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="mb-3">
                        <label for="paymentDate" class="form-label">Payment Date</label>
                        <input type="datetime-local" class="form-control" id="paymentDate" name="payment_date">
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" id="paymentMethod" name="payment_method">
                    </div>
                    <div class="mb-3">
                        <label for="paymentReference" class="form-label">Payment Reference</label>
                        <input type="text" class="form-control" id="paymentReference" name="payment_reference">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="taxPaymentsModal" tabindex="-1" aria-labelledby="taxPaymentsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taxPaymentsModalLabel">Tax Payments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding tax payments -->
                <form id="taxPaymentForm" action="{{ route('taxpayments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="taxpayerName" class="form-label">Taxpayer Name</label>
                        <input type="text" class="form-control" id="taxpayerName" name="taxpayer_name">
                    </div>
                    <div class="mb-3">
                        <label for="taxType" class="form-label">Tax Type</label>
                        <input type="text" class="form-control" id="taxType" name="tax_type">
                    </div>
                    <div class="mb-3">
                        <label for="paymentAmount" class="form-label">Payment Amount</label>
                        <input type="number" step="0.01" class="form-control" id="paymentAmount" name="amount">
                    </div>
                    <div class="mb-3">
                        <label for="paymentDate" class="form-label">Payment Date</label>
                        <input type="datetime-local" class="form-control" id="paymentDate" name="payment_date">
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" id="paymentMethod" name="payment_method">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status">
                    </div>
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                </form>
            </div>
        </div>
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
                        <input type="text" class="form-control" id="adminPaymentType" name="paymentType" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentAmount" class="form-label">Payment Amount</label>
                        <input type="number" step="0.01" class="form-control" id="adminPaymentAmount" name="amount">
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentDate" class="form-label">Payment Date</label>
                        <input type="datetime-local" class="form-control" id="adminPaymentDate" name="paymentDate">
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="adminPaymentDescription" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="adminPaymentStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="adminPaymentStatus" name="status">
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
<section class="section dashboard">
    <div class="container">
      <div class="row">




        <!-- Card with an image on left -->
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{asset('assets/img/account.jpg')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                  <h3 class="card-title">Introduction to Accounting Standards in the Philippines</h3>
                  <p class="card-text">
                      In the Philippines, accounting standards play a crucial role in ensuring transparency, reliability, and comparability in financial reporting across various entities. These standards provide a framework for how financial transactions are recorded, presented, and disclosed in financial statements, facilitating informed decision-making by stakeholders.
                  </p>
                  <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Philippine Financial Reporting Standards (PFRS).</h5>

                        <!-- Vertical Pills Tabs -->
                        <div class="d-flex align-items-start">
                          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">PFRS</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">SMEs</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">PAS</button>
                          </div>
                          <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              The primary accounting standards governing financial reporting in the Philippines are the Philippine Financial Reporting Standards (PFRS). Aligned with International Financial Reporting Standards (IFRS) issued by the International Accounting Standards Board (IASB), PFRS sets the benchmark for accounting practices in the country. Endorsed by the Financial Reporting Standards Council (FRSC), PFRS applies to all entities reporting under the Philippine Financial Reporting Framework, ensuring consistency with global accounting principles.
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                              For small and medium-sized entities (SMEs), the Philippine Financial Reporting Standards for SMEs (PFRS for SMEs) offer a simplified version of full PFRS, tailored to the specific needs of smaller businesses. This framework provides SMEs with a less complex set of accounting standards while maintaining comparability and reliability in financial reporting.
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                              Additionally, the Philippine Accounting Standards (PAS), though largely superseded by PFRS, were previously utilized in the Philippines and may still be relevant for certain entities that have not transitioned to PFRS.

      To address specific accounting issues and provide guidance on the application of PFRS, the Philippine Interpretations Committee (PIC) issues interpretations and clarifications, ensuring consistent and appropriate application of accounting standards in the Philippine context.

      Enforced by the Securities and Exchange Commission (SEC), compliance with these accounting standards is mandatory for various entities, including publicly traded companies, large corporations, SMEs, and others subject to financial reporting regulations. Adherence to these standards enhances the reliability of financial information, fosters investor confidence, and promotes the efficient functioning of capital markets in the Philippines.
                            </div>
                          </div>
                        </div>
                        <!-- End Vertical Pills Tabs -->

                      </div>
              </div>


            </div>
          </div>

        </div><!-- End Card with an image on left -->



    </div>
    <div class="pdf-viewer">
      <h4>Philippine Financial Reporting Standards / Philippine Accounting Standards</h4>
      <iframe src="{{ asset('assets/img/PAS.pdf') }}" width="100%" height="600px" frameborder="0"></iframe>
  </div>
  </section>


@include('layout.footer')

</body>

</html>

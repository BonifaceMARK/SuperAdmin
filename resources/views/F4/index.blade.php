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



        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item">
                    <button type="button" class="btn btn-primary v-100" data-bs-toggle="modal" data-bs-target="#taxPayersModal" style="background-image: url('{{ asset('assets/img/RE.jpg') }}'); background-size: cover;">
                        Tax Payers
                    </button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item">
                    <button type="button" class="btn btn-primary v-100" data-bs-toggle="modal" data-bs-target="#paymentGatewaysModal" style="background-image: url('{{ asset('assets/img/REST.jpg') }}'); background-size: cover;">
                        Hotel & Restaurant
                    </button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item">
                    <button type="button" class="btn btn-primary v-100" data-bs-toggle="modal" data-bs-target="#freightPaymentsModal" style="background-image: url('{{ asset('assets/img/finance_1.jpg') }}'); background-size: cover;">
                        Freight Payments
                    </button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="gallery-item">
                    <button type="button" class="btn btn-primary v-100" data-bs-toggle="modal" data-bs-target="#fixedAssetPaymentsModal" style="background-image: url('{{ asset('assets/img/account.jpg') }}'); background-size: cover;">
                        Fixed Asset Payments
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-lg-6 col-md-6">
                <div class="gallery-item">
                    <button type="button" class="btn btn-primary v-100" data-bs-toggle="modal" data-bs-target="#paymentModal" style="background-image: url('{{ asset('assets/img/allocated.jpg') }}'); background-size: cover;">
                        Audit Tax Payments
                    </button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="gallery-item">
                    <button type="button" class="btn btn-primary v-100" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-image: url('{{ asset('assets/img/check.jpg') }}'); background-size: cover;">
                        General ledger
                    </button>
                </div>
            </div>
            <!-- Add more buttons as needed -->
        </div>
        



        <!-- Modal -->
        <div class="modal fade" id="fixedAssetPaymentsModal" tabindex="-1"
            aria-labelledby="fixedAssetPaymentsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fixedAssetPaymentsModalLabel">Fixed Asset Payments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                @foreach ($fixedAssetPayments as $fixedAssetPayment)
                                    <div class="col-xxl-4 col-xl-12">
                                        <div class="card info-card customers-card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $fixedAssetPayment->asset_name }} |
                                                    {{ $fixedAssetPayment->payment_date }}</h5>
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <!-- You can replace the icon with your desired icon -->
                                                        <i class="bi bi-cash"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>{{ $fixedAssetPayment->amount }}</h6>
                                                        <!-- Display other fixed asset payment details as needed -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Customers Card -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-custom " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="paymentModalLabel">Payments and Investment</h2>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card">
                            <div class="card-body">
                    
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Name/Description</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Payment Method</th>
                                            <th>Payment Reference</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments->merge($f10) as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td>
                                                <td>{{ isset($payment->tax_type) ? 'Tax Payment' : 'Fixed Asset Payment' }}</td>
                                                <td>{{ isset($payment->tax_type) ? $payment->taxpayer_name : $payment->asset_name }}</td>
                                                <td>{{ $payment->amount }}</td>
                                                <td>{{ $payment->payment_date }}</td>
                                                <td>{{ $payment->payment_method }}</td>
                                                <td>{{ isset($payment->payment_reference) ? $payment->payment_reference : 'N/A' }}</td>
                                                <td id="paymentStatus{{ $payment->id }}">{{ $payment->status }}</td>
                                                <td>
                                                    @if ($payment->status == 'Paid')
                                                        <form action="{{ route('add.revenue', $payment->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary addToRevenueBtn" data-payment-id="{{ $payment->id }}">Add to Revenue</button>
                                                        </form>
                                                    @else
                                                        <span class="text-muted">Not Paid</span>
                                                    @endif
                                                </td>
                                            </tr>
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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Disable "Add to Revenue" button if status is not "Paid"
                var addToRevenueBtns = document.querySelectorAll('.addToRevenueBtn');
                addToRevenueBtns.forEach(function(btn) {
                    btn.addEventListener('click', function(event) {
                        var paymentId = this.getAttribute('data-payment-id');
                        var paymentStatus = document.querySelector('#paymentStatus' + paymentId)
                            .textContent.trim();
                        if (paymentStatus !== 'Paid') {
                            alert('You can only add to revenue for payments with "Paid" status.');
                            event.preventDefault(); // Prevent form submission
                        }
                    });
                });
            });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="freightPaymentsModal" tabindex="-1" aria-labelledby="freightPaymentsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="freightPaymentsModalLabel">Freight Payments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                @foreach ($freightPayments as $freightPayment)
                                    <div class="col-xxl-4 col-xl-12">
                                        <div class="card info-card customers-card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $freightPayment->freightService }} |
                                                    {{ $freightPayment->freightDate }}</h5>
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <!-- You can replace the icon with your desired icon -->
                                                        <i class="bi bi-truck"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>{{ $freightPayment->freightAmount }}</h6>
                                                        <!-- Display other freight payment details as needed -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Customers Card -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="paymentGatewaysModal" tabindex="-1" aria-labelledby="paymentGatewaysModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentGatewaysModalLabel">HRMS Payments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach ($paymentGateways as $paymentGateway)
                                <div class="col-xxl-4 col-xl-12">
                                    <div class="card info-card customers-card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $paymentGateway->productName }} |
                                                {{ $paymentGateway->transactionDate->format('M d, Y') }}</h5>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-credit-card"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $paymentGateway->transactionAmount }}</h6>
                                                    <!-- Display other payment gateway details as needed -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Customers Card -->
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="taxPayersModal" tabindex="-1" aria-labelledby="taxPayersModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taxPayersModalLabel">Tax Payers</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach ($taxPayments as $taxPayment)
                                <div class="col-xxl-4 col-xl-12">
                                    <div class="card info-card customers-card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $taxPayment->taxpayer_name }} |
                                                {{ $taxPayment->payment_date->format('M d, Y') }}</h5>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $taxPayment->amount }}</h6>
                                                    <!-- Display other tax payment details as needed -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Customers Card -->
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">General Ledger</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your content goes here -->
                        <!-- Section 1 -->
                        <section class="section">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Invoice Payment Details</h5>
                                        <div
                                            class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Reference No</th>
                                                            <th>Invoice ID</th>
                                                            <th>Account Holder Name</th>
                                                            <th>Bank Name</th>
                                                            <th>PPTS Code</th>
                                                            <th>Account Number</th>
                                                            <th>Terms & Conditions</th>
                                                            <th>Notes</th>
                                                            <th>Created At</th>
                                                            <th>Updated At</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoicePaymentDetails as $detail)
                                                            <tr>
                                                                <td>{{ $detail->id }}</td>
                                                                <td>{{ $detail->reference_no }}</td>
                                                                <td>{{ $detail->invoice_id }}</td>
                                                                <td>{{ $detail->account_holder_name }}</td>
                                                                <td>{{ $detail->bank_name }}</td>
                                                                <td>{{ $detail->ppts_code }}</td>
                                                                <td>{{ $detail->account_number }}</td>
                                                                <td>{{ $detail->add_terms_and_conditions }}</td>
                                                                <td>{{ $detail->add_notes }}</td>
                                                                <td>{{ $detail->created_at }}</td>
                                                                <td>{{ $detail->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Section 2 -->
                        <section class="section">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Invoice Details</h5>
                                        <div
                                            class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Items</th>
                                                            <th>Category</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Amount</th>
                                                            <th>Discount</th>
                                                            <th>Created At</th>
                                                            <th>Updated At</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoiceDetails as $detail)
                                                            <tr>
                                                                <td>{{ $detail->id }}</td>
                                                                <td>{{ $detail->items }}</td>
                                                                <td>{{ $detail->category }}</td>
                                                                <td>{{ $detail->quantity }}</td>
                                                                <td>{{ $detail->price }}</td>
                                                                <td>{{ $detail->amount }}</td>
                                                                <td>{{ $detail->discount }}</td>
                                                                <td>{{ $detail->created_at }}</td>
                                                                <td>{{ $detail->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Section 3 -->
                        <section class="section">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Invoice Customer Names</h5>
                                        <div class="table-responsive">
                                            <table class="table datatable datatable-table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Reference</th>
                                                        <th>Customer Name</th>
                                                        <th>PO Number</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Enable Tax</th>
                                                        <th>Recurring Invoice</th>
                                                        <th>By Month</th>
                                                        <th>Month</th>
                                                        <th>Amount</th>
                                                        <th>Invoice From</th>
                                                        <th>Invoice To</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($invoiceCustomerNames as $invoiceCustomerName)
                                                        <tr>
                                                            <td>{{ $invoiceCustomerName->customer_name }}</td>
                                                            <td>{{ $invoiceCustomerName->reference }}</td>
                                                            <td>{{ $invoiceCustomerName->customer_name }}</td>
                                                            <td>{{ $invoiceCustomerName->po_number }}</td>
                                                            <td>{{ $invoiceCustomerName->date }}</td>
                                                            <td>{{ $invoiceCustomerName->due_date }}</td>
                                                            <td>{{ $invoiceCustomerName->enable_tax }}</td>
                                                            <td>{{ $invoiceCustomerName->recurring_invoice }}</td>
                                                            <td>{{ $invoiceCustomerName->by_month }}</td>
                                                            <td>{{ $invoiceCustomerName->month }}</td>
                                                            <td>{{ $invoiceCustomerName->amount }}</td>
                                                            <td>{{ implode(', ', $invoiceCustomerName->invoice_from) }}
                                                            </td>
                                                            <td>{{ implode(', ', $invoiceCustomerName->invoice_to) }}
                                                            </td>
                                                            <td>{{ implode(', ', $invoiceCustomerName->status) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Section 4 -->
                        <section class="section">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">AR Invoice Total Amounts</h5>
                                        <div class="table-responsive">
                                            <table class="table datatable datatable-table">
                                                <thead>
                                                    <tr>
                                                        <th>Invoice ID</th>
                                                        <th>Taxable Amount</th>
                                                        <th>Round Off</th>
                                                        <th>Total Amount</th>
                                                        <th>Upload Sign</th>
                                                        <th>Name of the Signatory</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($arInvoiceTotalAmounts as $arInvoiceTotalAmount)
                                                        <tr>
                                                            <td>{{ $arInvoiceTotalAmount->invoice_id }}</td>
                                                            <td>{{ $arInvoiceTotalAmount->taxable_amount }}</td>
                                                            <td>{{ $arInvoiceTotalAmount->round_off }}</td>
                                                            <td>{{ $arInvoiceTotalAmount->total_amount }}</td>
                                                            <td>{{ $arInvoiceTotalAmount->upload_sign }}</td>
                                                            <td>{{ $arInvoiceTotalAmount->name_of_the_signatory }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Section 5 -->
                        <section class="section">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Transaction Investment Total Amounts</h5>
                                        <div class="table-responsive">
                                            <table class="table datatable datatable-table">
                                                <thead>
                                                    <tr>
                                                        <th>Invoice ID</th>
                                                        <th>User ID</th>
                                                        <th>Name</th>
                                                        <th>Amount</th>
                                                        <th>Description</th>
                                                        <th>Type</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transach as $data)
                                                        <tr>
                                                            <td>{{ $data->id }}</td>
                                                            <td>{{ $data->user_id }}</td>
                                                            <td>{{ $data->firstname }} {{ $data->lastname }}</td>
                                                            <td>{{ $data->amount }}</td>
                                                            <td>{{ $data->description }}</td>
                                                            <td>{{ $data->type }}</td>
                                                            <td>{{ $data->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Section 6 -->
                        <section class="section">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Audit Planning</h5>
                                        <div class="table-responsive">
                                            <table class="table datatable datatable-table">
                                                <thead>
                                                    <tr>
                                                        <th>Invoice ID</th>
                                                        <th>User ID</th>
                                                        <th>Name</th>
                                                        <th>Amount</th>
                                                        <th>Description</th>
                                                        <th>Type</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transach as $data)
                                                        <tr>
                                                            <td>{{ $data->id }}</td>
                                                            <td>{{ $data->user_id }}</td>
                                                            <td>{{ $data->firstname }} {{ $data->lastname }}</td>
                                                            <td>{{ $data->amount }}</td>
                                                            <td>{{ $data->description }}</td>
                                                            <td>{{ $data->type }}</td>
                                                            <td>{{ $data->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>






    </main>



    @include('layout.footer')

</body>

</html>

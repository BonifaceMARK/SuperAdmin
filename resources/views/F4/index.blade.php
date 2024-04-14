
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




<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Invoice Payment Details</h5>
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
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
                                    @foreach($invoicePaymentDetails as $detail)
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
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice Details</h5>
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
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
                                        @foreach($invoiceDetails as $detail)
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
        </div>

        <section class="section">
            <div class="row">
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
                                        @foreach($invoiceCustomerNames as $invoiceCustomerName)
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
                                            <td>{{ implode(', ', $invoiceCustomerName->invoice_from) }}</td>
                                            <td>{{ implode(', ', $invoiceCustomerName->invoice_to) }}</td>
                                            <td>{{ implode(', ', $invoiceCustomerName->status) }}</td>
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
        <section class="section">
            <div class="row">
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
                                        @foreach($arInvoiceTotalAmounts as $arInvoiceTotalAmount)
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
            </div>
        </section>



</section>




</main>



@include('layout.footer')

</body>

</html>

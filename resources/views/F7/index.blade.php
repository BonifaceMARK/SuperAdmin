
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
  @include('layouts.appsidebar')

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

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Fixed Asset Payments</div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Asset Name</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Payment Method</th>
                                    <th>Payment Reference</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->asset_name }}</td>
                                    <td>{{ $payment->asset_description }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->payment_date }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ $payment->payment_reference }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal{{$payment->id}}">
                                            View Details
                                        </button>
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


        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title">HRMS Payments</div>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Transaction Name</th>
                                <th>Payment Method</th>
                                <th>Transaction Type</th>
                                <th>Transaction Amount</th>
                                <th>Transaction Date</th>
                                <th>Description</th>
                                <th>Transaction Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentGateways as $paymentGateway)
                            <tr>
                                <td>{{ $paymentGateway->productName }}</td>
                                <td>{{ $paymentGateway->transactionName }}</td>
                                <td>{{ $paymentGateway->paymentMethod }}</td>
                                <td>{{ $paymentGateway->transactionType }}</td>
                                <td>${{ $paymentGateway->transactionAmount }}</td>
                                <td>{{ $paymentGateway->transactionDate }}</td>
                                <td>{{ $paymentGateway->description }}</td>
                                <td>{{ $paymentGateway->transactionStatus }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{ $paymentGateway->id }}">View</button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="viewModal{{ $paymentGateway->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $paymentGateway->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel{{ $paymentGateway->id }}">Payment Gateway Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Reference:</strong> {{ $paymentGateway->reference }}</p>
                                            <p><strong>Product Name:</strong> {{ $paymentGateway->productName }}</p>
                                            <p><strong>Transaction Name:</strong> {{ $paymentGateway->transactionName }}</p>
                                            <p><strong>Payment Method:</strong> {{ $paymentGateway->paymentMethod }}</p>
                                            <p><strong>Transaction Type:</strong> {{ $paymentGateway->transactionType }}</p>
                                            <p><strong>Transaction Amount:</strong> ${{ $paymentGateway->transactionAmount }}</p>
                                            <p><strong>Transaction Date:</strong> {{ $paymentGateway->transactionDate }}</p>
                                            <p><strong>Description:</strong> {{ $paymentGateway->description }}</p>
                                            <p><strong>Transaction Status:</strong> {{ $paymentGateway->transactionStatus }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

                <!-- Fixed Asset Payment Modal -->
                @foreach($payments as $payment)
                <div class="modal fade" id="paymentModal{{$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel{{$payment->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <!-- Modal header -->
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="paymentModalLabel{{$payment->id}}">Invoice - Payment Details</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" id="modalBody{{$payment->id}}">
                                <!-- Invoice Header -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Invoice for: Fixed Assets</h4>
                                        <p><strong>Asset Name:</strong> {{$payment->asset_name}}</p>
                                        <p><strong>Description:</strong> {{$payment->asset_description}}</p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h4>Payment Details:</h4>
                                        <p><strong>Payment Date:</strong> {{$payment->payment_date}}</p>
                                        <p><strong>Payment Method:</strong> {{$payment->payment_method}}</p>
                                        <p><strong>Payment Reference:</strong> {{$payment->payment_reference}}</p>
                                        <p><strong>Status:</strong> {{$payment->status}}</p>
                                    </div>
                                </div>

                                <!-- Invoice Table -->
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$payment->asset_description}}</td>
                                                <td class="text-right">${{$payment->amount}}</td>
                                            </tr>
                                            <!-- Add additional rows for more items if needed -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-right" colspan="1">Total:</th>
                                                <th class="text-right">${{$payment->amount}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="printButton{{$payment->id}}">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
                <script>
                    // Function to print modal content as image
                    function printModalAsImage(id) {
                        // Get modal content element
                        var modalContent = document.getElementById('modalBody' + id);

                        // Use html2canvas to capture modal content as image
                        html2canvas(modalContent, {
                            onrendered: function(canvas) {
                                // Convert canvas to data URL
                                var imageData = canvas.toDataURL('image/png');

                                // Create a new window with the image for printing
                                var printWindow = window.open('');
                                printWindow.document.open();
                                printWindow.document.write('<html><head><title>Print</title></head><body>');
                                printWindow.document.write('<img src="' + imageData + '" style="width:100%;">');
                                printWindow.document.write('</body></html>');
                                printWindow.document.close();

                                // Print the window
                                printWindow.print();
                                printWindow.close();
                            }
                        });
                    }

                    // Event listener for print button
                    @foreach($payments as $payment)
                    document.getElementById('printButton{{$payment->id}}').addEventListener('click', function() {
                        printModalAsImage({{$payment->id}});
                    });
                    @endforeach
                </script>


</main>



@include('layout.footer')

</body>

</html>


@extends('layout.title')

@section('title', env('APP_NAME'))
@include('layout.title')
<body>

  <!-- ======= Header ======= -->

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('superadmin') }}" class="logo d-flex align-items-center">
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">All Payments</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#allPaymentsModal">
                                        Open Modal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="allPaymentsModal" tabindex="-1" aria-labelledby="allPaymentsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="allPaymentsModalLabel">All Payments</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table id="allPaymentsTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Payment Type</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminPayments as $adminPayment)
                                        <tr>
                                            <td>{{ $adminPayment->paymentType }}</td>
                                            <td>{{ $adminPayment->amount }}</td>
                                            <td>{{ $adminPayment->paymentDate }}</td>
                                            <td>{{ $adminPayment->description }}</td>
                                            <td>{{ $adminPayment->status }}</td>
                                        </tr>
                                        @endforeach
                                        @foreach ($fixedAssetPayments as $fixedAssetPayment)
                                        <tr>
                                            <td>{{ $fixedAssetPayment->asset_name }}</td>
                                            <td>{{ $fixedAssetPayment->amount }}</td>
                                            <td>{{ $fixedAssetPayment->payment_date }}</td>
                                            <td>{{ $fixedAssetPayment->asset_description }}</td>
                                            <td>{{ $fixedAssetPayment->status }}</td>
                                        </tr>
                                        @endforeach
                                        @foreach ($freightPayments as $freightPayment)
                                        <tr>
                                            <td>{{ $freightPayment->freightService }}</td>
                                            <td>{{ $freightPayment->freightAmount }}</td>
                                            <td>{{ $freightPayment->freightDate }}</td>
                                            <td>{{ $freightPayment->freightDescription }}</td>
                                            <td>{{ $freightPayment->freightStatus }}</td>
                                        </tr>
                                        @endforeach
                                        @foreach ($paymentGateways as $paymentGateway)
                                        <tr>
                                            <td>{{ $paymentGateway->productName }}</td>
                                            <td>{{ $paymentGateway->transactionAmount }}</td>
                                            <td>{{ $paymentGateway->transactionDate }}</td>
                                            <td>{{ $paymentGateway->description }}</td>
                                            <td>{{ $paymentGateway->transactionStatus }}</td>
                                        </tr>
                                        @endforeach
                                        @foreach ($taxPayments as $taxPayment)
                                        <tr>
                                            <td>{{ $taxPayment->taxpayer_name }}</td>
                                            <td>{{ $taxPayment->amount }}</td>
                                            <td>{{ $taxPayment->payment_date }}</td>
                                            <td>{{ $taxPayment->tax_type }}</td>
                                            <td>{{ $taxPayment->status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#allPaymentsTable').DataTable();
    });
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

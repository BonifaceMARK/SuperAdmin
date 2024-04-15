@extends('layouts.app')

@section('content')
    <!-- ======= Header ======= -->

    @include('layouts.appheader');
    
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.appsidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Investment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">Approval</div>
                                    <div class="table-responsive">
                                    <table id="example" class="table display"  width="100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Budget</th>
                                                <th>Description</th>
                                                <th>Submit By</th>  
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($approve as $row)
                                                <tr class="text-center">
                                                    <th>{{ $row->id }}</th> 
                                                    <td>{{ $row->title }}</td> 
                                                    <td>{{ number_format($row->amount, 2) }}</td>
                                                    <td>{{ $row->description }}</td> 
                                                    <td>{{ $row->submitted_by }}</td>
                                                    <td>
                                                        @if ($row->status == 'approved')
                                                            <span
                                                                class="badge bg-success">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Inactive')
                                                            <span class="badge bg-danger">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Pending')
                                                            <span
                                                                class="badge bg-warning text-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'pending')
                                                            <span
                                                                class="badge bg-primary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Cancelled')
                                                            <span
                                                                class="badge bg-secondary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Suspended')
                                                            <span class="badge bg-info">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Failed')
                                                            <span class="badge bg-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Refunded')
                                                            <span
                                                                class="badge bg-light text-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Approve')
                                                            <span
                                                                class="badge bg-primary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Cancel')
                                                            <span
                                                                class="badge bg-warning text-black">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Delete')
                                                            <span
                                                                class="badge bg-danger text-white">{{ $row->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $row->created_at->format('F d, Y') }}</td>                                              
                                                    <td class="d-flex">
                                                        <a href="{{ route('receiptinvestment', ['id' => $row->id]) }}" class="btn btn-primary btn-sm mr-3" title="Print Receipt">
                                                            <i class="bi bi-print"></i> Print Receipt
                                                        </a>                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>

                                    {{-- <button type="button" class="btn btn-success btn-sm mr-2"><i class="bi bi-check2"></i></button>
                                    <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-x"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button> --}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">Investment</div>
                                    <div class="table-responsive">
                                    <table id="example" class="table display"  width="100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Acc Name</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($investment as $row)
                                                <tr class="text-center">
                                                    <th scope="row">{{ $row->id }}</th>
                                                        <?php
                                                        $firstname = $row->firstname;
                                                        $lastname = $row->lastname;
                                                        
                                                        // Get the first character of the first name
                                                        $firstCharFirstName = substr($firstname, 0, 1);
                                                        
                                                        // Replace all characters of the first name except the first character with '*'
                                                        $asteriskFirstName = $firstCharFirstName . str_repeat('*', strlen($firstname) - 1);
                                                        
                                                        // Get the first character of the last name
                                                        $firstCharLastName = substr($lastname, 0, 1);
                                                        
                                                        // Replace all characters of the last name except the first character with '*'
                                                        $asteriskLastName = $firstCharLastName . str_repeat('*', strlen($lastname) - 1);
                                                        ?>
                                                        
                                                        <td>{{ $asteriskFirstName }} {{ $asteriskLastName }}</td>  
                                                    <td>{{ number_format($row->amount, 2) }}</td>
                                                    <td>{{ ($row->type) }}</td>
                                                    <td>{{ $row->created_at->format('F d, Y') }}</td>
                                                    <td>
                                                        @if ($row->status == 'Active')
                                                            <span
                                                                class="badge bg-success">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Inactive')
                                                            <span class="badge bg-danger">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Pending')
                                                            <span
                                                                class="badge bg-warning text-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Completed')
                                                            <span
                                                                class="badge bg-primary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Cancelled')
                                                            <span
                                                                class="badge bg-secondary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Suspended')
                                                            <span class="badge bg-info">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Failed')
                                                            <span class="badge bg-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Refunded')
                                                            <span
                                                                class="badge bg-light text-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Approve')
                                                            <span
                                                                class="badge bg-primary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Cancel')
                                                            <span
                                                                class="badge bg-warning text-black">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Delete')
                                                            <span
                                                                class="badge bg-danger text-white">{{ $row->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('receiptinvestment', ['id' => $row->id]) }}" class="btn btn-primary btn-sm mr-3" title="Print Receipt">
                                                            <i class="bi bi-print"></i> Print Receipt
                                                        </a>                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>

                                    {{-- <button type="button" class="btn btn-success btn-sm mr-2"><i class="bi bi-check2"></i></button>
                                    <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-x"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button> --}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
        {{-- <div class="modal fade" id="investmentapprove" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Approve</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($InvestmentRequest as $invest)
                            <form id="approveInvestForm{{ $invest->id }}"
                                action="{{ route('investment_requests.approve', $invest->id) }}" method="POST">
                                @csrf
                                @method('POST')

                            </form>
                        @endforeach
                    </div>
                    <h1>Are you sure you want to approve this Investment request?</h1>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary"
                            onclick="approveInvestRequest('approveInvestForm{{ $invest->id }}')">Confirm</button>
                    </div>
                    <script>
                        function approveInvestRequest(formId) {
                            document.getElementById(formId).submit();
                        }
                    </script>

                </div>
            </div>
        </div>

        <div class="modal fade" id="investmentcancel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($InvestmentRequest as $data)
                            <form id="cancelInvestForm{{ $data->id }}"
                                action="{{ route('investment_requests.cancel', ['id' => $data->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endforeach
                        <h1>Are you sure you want to Cancel this Investment request?</h1>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary"
                                onclick="cancelInvestRequest('cancelInvestForm{{ $data->id }}')">Confirm</button>
                        </div>
                    </div>

                    <script>
                        function cancelInvestRequest(formId) {
                            document.getElementById(formId).submit();
                        }
                    </script>

                </div>
            </div>
        </div> --}}
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i>
    </a>
    @include('layout.footer')

@endsection

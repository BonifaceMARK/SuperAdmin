@include('f3.inc.head')
@include('f3.inc.head2')
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


    {{-- <div class="card">
        <div class="card-body">



            <!-- Button to trigger the modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fixedAssetModal">
                Fixed Asset Report
            </button>
            <!-- Button to trigger the modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
                Expenses
            </button>
            <!-- Button to trigger the modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#areaChartModal">
                Predict Tax
            </button>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pieChartModal">
                Expenses Pie Chart
            </button>
            <!-- Button to trigger the modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#createCostAllocationModal">
                Cost Allocation
            </button>
            <!-- Button to trigger the modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#investmentModal">
                Investment Report
            </button>
        </div>
    </div> --}}


    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="filter">
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
                <h5 class="card-title">Recent Sales <span>| Today</span></h5>
                 <table id="example" class="table display" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Submitted by</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingdocux as $docu)
                            <tr>
                                <th scope="row"><a href="#" data-toggle="modal"
                                        data-target="#myModal{{ $docu->id }}">{{ $docu->id }}</a></th>
                                <td>{{ $docu->title }}</td>
                                <td>{{ $docu->description }}</td>
                                <td>
                                    @if ($docu->budget === null)
                                        {{ '' }}
                                    @else
                                        ${{ $docu->budget }}
                                    @endif
                                </td>
                                <td>
                                    @if ($docu->submitted_by)
                                        {{ $docu->submitted_by }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="badge
                                @if ($docu->status == 'approved') bg-success
                                @elseif($docu->status == 'pending')
                                    bg-warning
                                @elseif($docu->status == 'rejected')
                                    bg-danger @endif
                            ">{{ $docu->status }}</span>
                                </td>
                                <td class="d-flex align-items-center justify-content-start">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal{{ $docu->id }}">
                                        View Details
                                    </button>
                                </td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <script>
        function updateStatus(route, status) {

            if (confirm('Are you sure you want to update the status?')) {
                window.location.href = `${route}?status=${status}`;
            }
        }
    </script>
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Add Bootstrap JavaScript library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <!-- sa -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <style>
        .modal-dialog {
            position: fixed;
            margin: auto;
            width: 400px;
            height: 100%;
            right: 0px;
        }

        .modal-content {
            height: 100%;
        }
    </style>
    @foreach ($pendingdocux as $docu)
        <tr>
            <td>
                <!-- Modal -->
                <div class="modal fade" id="myModal{{ $docu->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel{{ $docu->id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel{{ $docu->id }}">Details for ID:
                                    {{ $docu->id }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Type:</strong> {{ $docu->title }}</p>
                                <p><strong>Name:</strong>
                                    @if ($docu->submitted_by)
                                        {{ $docu->submitted_by }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p><strong>Budget:</strong>
                                    @if ($docu->budget === null)
                                        {{ '' }}
                                    @else
                                        ${{ $docu->budget }}
                                    @endif
                                </p>
                                <p><strong>Description:</strong> {{ $docu->description }}</p>
                                <p><strong>Created at: </strong>{{ $docu->submitted_at }}</p>

                                <!-- Display comments -->
                                @if ($docu->comment)
                                    <p><strong>Comment:</strong> {{ $docu->comment->comment }}</p>
                                @endif
                                <!-- End display comments -->
                            </div>
                            <div class="col-12 text-center">
                                @if ($docu->admin_status == 'approved' && $docu->status == 'approved')
                                    <button type="button" class="btn btn-primary"
                                        onclick="doneTransaction('{{ route('done.s') }}')">Done Transaction</button>
                                @elseif ($docu->admin_status == 'approved' && $docu->status == 'rejected')
                                    <button type="button" class="btn btn-primary" id="showChat">Please Contact
                                        Us</button>
                                @else
                                    @switch($docu->status)
                                        @case('approved')
                                        @break

                                        @case('pending')
                                            <form action="{{ route('update', ['id' => $docu->id]) }}" method="POST">
                                                @csrf
                                                <label for="comment" class="form-label">Comment</label>
                                                <textarea name="comment" rows="4" cols="40"></textarea><br>
                                                <button type="submit" class="btn btn-success" name="status"
                                                    value="approved">Approve</button>
                                                <button type="submit" class="btn btn-danger" name="status"
                                                    value="rejected">Reject</button>
                                            </form>

                                            <br>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        @break

                                        @case('rejected')
                                            <button type="button" class="btn btn-danger"
                                                onclick="rejected()">Rejected</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        @break

                                        @default
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                    @endswitch
                                @endif
                            </div>
                        </div>
                    </div>
                </div> <!--  end of model -->

            </td>
        </tr>
    @endforeach

    <script></script>




    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>























    <div class="modal fade" id="fixedAssetModal" tabindex="-1" aria-labelledby="fixedAssetModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fixedAssetModalLabel">Fixed Asset Reports / Today</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="reportsChart" style="min-height: 365px;"></div>
                    <p class="trend-info">Trend: <span id="fixedAssetTrendText"></span></p>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function doneTransaction(route) {

        window.location.href = route;

    }
</script>
@include('f3.inc.foot')

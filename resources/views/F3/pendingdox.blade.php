@include('f3.inc.head')
@include('f3.inc.head2')
@include('layouts.appsidebar');
<style>
    /* Add your styles here */
.reply-input {
width: calc(100% - 80px);
padding: 5px;
margin-top: 5px;
box-sizing: border-box;
border-radius: 5px;
float: left;
}
.chatrepls {
width: 60px;
padding: 5px;
margin-top: 5px;
margin-left: 10px;
border: none;
border-radius: 62px;
background-color: #007bff;
color: white;
cursor: pointer;
float: right;
} */
.chatrepls:hover {
background-color: #0056b3;
}
.chat-message1 {
    width: 100%;
    margin-top:10px;
    height: 400px; /* Limiting height */
    border: 1px solid #ccc;
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 10px;
    margin-bottom: 10px;
}
.chat-message {
    margin-bottom: 10px;
}
</style>
<!-- Add these to the head of your HTML file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



<main id="main" class="main">
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
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Submitted by</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingdocux as $docu)
                                <tr>
                                    <th scope="row"><a href="#" data-toggle="modal" data-target="#myModal{{ $docu->id }}">{{ $docu->id }}</a></th>
                                    <td>{{ $docu->title }}</td>
                                    <td>{{ $docu->description }}</td>
                                    <td>${{ $docu->budget }}</td>
                                    <td>
                                        @if ($docu->submitted_by)
                                        {{ $docu->submitted_by }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge
                                            @if($docu->status == 'approved')
                                                bg-success
                                            @elseif($docu->status == 'pending')
                                                bg-warning
                                            @elseif($docu->status == 'rejected')
                                                bg-danger
                                            @endif
                                        ">{{ $docu->status }}</span>
                                    </td>
                    <td class="d-flex align-items-center justify-content-start">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $docu->id }}">
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
              @foreach($pendingdocux as $docu)
    <tr>
      <td>
<!-- Modal -->
<div class="modal fade" id="myModal{{ $docu->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $docu->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel{{ $docu->id }}">Details for ID: {{ $docu->id }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Type:</strong> {{ $docu->title }}</p>
                <p><strong>Name:</strong>@if ($docu->submitted_by)
                    {{ $docu->submitted_by }}
                @else
                    N/A
                @endif</p>
                <p><strong>Budget:</strong> {{ $docu->budget }}</p>
                <p><strong>Description:</strong> {{ $docu->description }}</p>
                <p><strong>Created at: </strong>{{ $docu->submitted_at }}</p>

                <!-- Display comments -->
                @if($docu->comment)
                    <p><strong>Comment:</strong> {{ $docu->comment->comment }}</p>
                @endif
                <!-- End display comments -->
            </div>
            <div class="col-12 text-center">
                @if ($docu->admin_status == 'approved' && $docu->status == 'approved')
                    <button type="button" class="btn btn-primary" onclick="doneTransaction('{{ route('done.s') }}')">Done Transaction</button>
                @elseif ($docu->admin_status == 'approved' && $docu->status == 'rejected')
                    <button type="button" class="btn btn-primary" id="showChat">Please Contact Us</button>
                    @else
                    @switch($docu->status)
                        @case('approved')

                            @break
                            @case('pending')
                            <form action="{{ route('update', ['id' => $docu->id]) }}" method="POST">
                            @csrf
                            <label for="comment" class="form-label">Comment</label>
                            <textarea name="comment" rows="4" cols="40"></textarea><br>
                            <button type="submit" class="btn btn-success" name="status" value="approved">Approve</button>
                            <button type="submit" class="btn btn-danger" name="status" value="rejected">Reject</button>
                        </form>

                            <br>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            @break
                        @case('rejected')
                            <button type="button" class="btn btn-danger" onclick="rejected()">Rejected</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            @break
                        @default
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @endswitch
                @endif
                                    </div>
                                </div>
                            </div>
                        </div> <!--  end of model -->

                    </td>
                    </tr>
                @endforeach

                <script>

                </script>




            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script>
    function doneTransaction(route) {

            window.location.href = route;

    }
</script>
<!--  -->
            </main><!-- End #main -->
@include('f3.inc.foot')


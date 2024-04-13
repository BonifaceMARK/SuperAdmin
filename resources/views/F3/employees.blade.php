@include('inc.head')
@include('inc.head2')
@include('inc.navbar')
<main id="main" class="main">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Created Date</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($usercli as $userx)
                <tr>
                    <th scope="row">{{$userx->id}}</th>
                    <td>{{$userx->name}}</td>
                    <td>{{$userx->email}}</td>
                    <td>{{$userx->username}}</td>
                    <td>{{$userx->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>

</main><!-- End #main -->
@include('inc.foot')

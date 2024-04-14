@include('f3.inc.head')
@include('f3.inc.head2')
@include('f3.inc.navbar')
<main id="main" class="main">
 <!-- Vertical Form -->
 <form class="row g-3">
              <div class="col-12">
                <label for="inputName4" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName4" >
              </div>
              <div class="col-12">
                <label for="inputName4" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="inputName4" >
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" >
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" >
              </div>
              <div class="col-12">
                <label for="Author" class="form-label">Author</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" >
              </div>
              <div class="text-center">
                <!-- Remove the 'type="submit"' to prevent form submission -->
                <button type="button" class="btn btn-success" >Approve</button>
                <span></span>
                <button type="reject" class="btn btn-danger">Reject</button>
              </div>
              </form><!-- Vertical Form -->

</main><!-- End #main -->
@include('f3.inc.foot')

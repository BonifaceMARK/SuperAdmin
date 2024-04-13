@include('inc/head')

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/fmslogo.png" alt="">
                  <span class="d-none d-lg-block">Financial Guardian</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>
                  @if($errors->any())
                  <div class="col-12">
                  @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach

                  </div>
                  @endif
                  @if(session()->has('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif

                  @if(session()->has('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                  <form  action="{{route('login.code')}}" method="POST"  style="width=500px" id="loginform">

                  @csrf
                    <div class="col-12">
                      <label for="youremail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="youremail" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>
                    <div>
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>

                      </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" onclick="onClick(event)">Login</button>
                        {{-- <button class="g-recaptcha btn btn-primary w-100"
                        data-sitekey="{{config('services.recap.site_key')}}"
                        data-callback='onSubmit'
                        data-action='submit'>Submit</button> --}}
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="{{ asset('#') }}" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js') }}"></script>


  <script>





    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('{{config('services.recap.site_key')}}', {action: 'submit'}).then(function(token) {
            document.getElementById("g-recaptcha-response").value = token;
            document.getElementById("loginform").submit();
          });
        });
      }
</script>

</body>

</html>

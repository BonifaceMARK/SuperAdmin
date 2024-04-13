<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-superadmin" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Super Admin</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-superadmin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/superadmin/dashboard')}}">

          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" href="{{ route('manageRole') }}">
                        <span>User Management</span>
                    </a>
                <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('/superadmin/dashboard')}}">
                    <i class="bi bi-house-door"></i>
                  <span>Home</span>
                </a>
                </li><!-- End Dashboard Nav -->
      


                <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('payment')}}">
                      <i class="bi bi-credit-card"></i><span>Payment Gateways</span>
                  </a>
                </li><!-- End Components Nav -->



            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link collapsed" data-bs-target="#f5" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Finance 5</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="f5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li><a class="dropdown-item" href="{{ route('payment') }}">Payment Gateway</a></li>
                <li><a class="dropdown-item" href="{{route('communication')}}">Communication & Collaboration</a></li>
                <li><a class="dropdown-item" href="{{route('standards')}}">Accounting Standards</a></li>
            </ul>
                    <li class="nav-item">
                      <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('communication')}}">
                          <i class="bi bi-chat-left-dots"></i><span>Communication & Collaboration</span>
                      </a>
                    </li><!-- End Components Nav -->
                    <li class="nav-item">
                      <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('standards')}}">
                          <i class="bi bi-list-columns"></i><span>Accounting Standards</span>
                      </a>
                    </li><!-- End Components Nav -->
              </ul>
        </li>









        @include('finance.sidebar')
        @include('f3.inc.navbar')

        @include('f10.inc.navbar')

















    </ul>

</aside><!-- End Sidebar-->

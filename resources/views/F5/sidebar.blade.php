<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/superadmin/dashboard')}}">
            <i class="bi bi-house-door"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('payment')}}">
            <i class="bi bi-person-fill-gear"></i><span>Payment Gateways</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('communication')}}">
            <i class="bi bi-person-fill-gear"></i><span>Communication & Collaboration</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('standards')}}">
            <i class="bi bi-person-fill-gear"></i><span>Accounting Standards</span>
        </a>
      </li><!-- End Components Nav -->










    </ul>

  </aside><!-- End Sidebar-->

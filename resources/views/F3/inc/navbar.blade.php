  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ asset('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tax-management-reports">
              <i class="bi bi-circle"></i><span>Tax and Financial Reports</span>
            </a>
          </li>
          <li>
            <a href="fix-asset-reports">
              <i class="bi bi-circle"></i><span>Fixed Assets</span>
            </a>
          </li>
          <li>
            <a href="ap-ar-reports">
              <i class="bi bi-circle"></i><span>Account Payable and Account  Receivable (APAR)</span>
            </a>
          </li>
          <li>
            <a href="bank-reconcilation">
              <i class="bi bi-circle"></i><span>Credit Management - Bank Reconcilation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav"  href="{{ asset('clients') }}">
          <i class="bi bi-journal-text"></i><span>Clients</span>
        </a>
      </li><!-- End Forms Nav -->
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link " href="{{ asset('profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{ asset('contact') }}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

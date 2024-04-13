<?php
  $load = array();$c = 1;
  $accessibleFilter = new App\Classes\AccessibleFilterClass;
  $collection = $accessibleFilter->sched();

  // dd(Auth::user());
?>

<!-- Extra Large Modal -->
{{-- <button type="button" class="btn btn-primary" >
  Extra Large Modal
</button> --}}

{{-- @include('asset.report') --}}


<div class="modal fade" id="ExtralargeModalInventory" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      
      <div class="modal-body">
        
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Inventory Asset</h5>
            <table class="table datatable">
              <thead>
                  <tr>
                      {{-- <th>Branch</th> --}}
                      <th>id</th>
                      <th>Stock</th>
                      <th>Quantities</th>
                      <th>Location</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  {{-- <tr>
                      <td>Unity Pugh</td>
                      <td>Unity Pugh</td>
                      <td></td>
                      <td>Active</td>
                      <td colspan="2">
                          <button type="button" class="btn btn-info"><i class="bi bi-eye"></i></button>
                          <button type="button" class="btn btn-primary"><i class="bi bi-pencil"></i></button>
                          <!-- Add more buttons if needed -->
                      </td>
                  </tr> --}}
                  <!-- Add more rows if needed -->
              </tbody>
          </table>

          </div>
        </div>




      </div>
     
    </div>
  </div>
</div>

<div class="modal fade" id="ExtralargeModalAsset" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      
      <div class="modal-body">
        
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tracks maintenance schedules</h5>
            <table class="table datatable">
              <thead>
                  <tr>
                      {{-- <th>Branch</th> --}}
                      <th>no</th>
                      <th>Asset</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  {{-- <tr>
                      <td>Unity Pugh</td>
                      <td>Unity Pugh</td>
                      <td></td>
                      <td>Active</td>
                      <td colspan="2">
                          <button type="button" class="btn btn-info"><i class="bi bi-eye"></i></button>
                          <button type="button" class="btn btn-primary"><i class="bi bi-pencil"></i></button>
                          <!-- Add more buttons if needed -->
                      </td>
                  </tr> --}}
                  <!-- Add more rows if needed -->
              </tbody>
          </table>

          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Asset Disposal</h5>
            <table class="table datatable">
              <thead>
                  <tr>
                      {{-- <th>Branch</th> --}}
                      <th>Sell</th>
                      <th>Donate</th>
                      <th>Disposing</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  {{-- <tr>
                      <td>Unity Pugh</td>
                      <td>Unity Pugh</td>
                      <td></td>
                      <td>Active</td>
                      <td colspan="2">
                          <button type="button" class="btn btn-info"><i class="bi bi-eye"></i></button>
                          <button type="button" class="btn btn-primary"><i class="bi bi-pencil"></i></button>
                          <!-- Add more buttons if needed -->
                      </td>
                  </tr> --}}
                  <!-- Add more rows if needed -->
              </tbody>
          </table>

          </div>
        </div>




      </div>
     
    </div>
  </div>
</div>

<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    
    <li class="nav-item">
      @if( Auth::user()->role == '1' || Auth::user()->role == '0')
      <a class="nav-link " href="{{route('home')}}">
        <i class="bi bi-grid"></i>
        <span style="font-size : 13.5px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Dashboard</span>
      </a>
      {{-- @elseif( auth::user()->role == '2' )
      <a class="nav-link " href="{{route('uhome')}}">
        <i class="bi bi-house"></i>
        <span style="font-size : 13.5px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Home</span>
      </a>
      @elseif( auth::user()->role == '3')
      <a class="nav-link " href="{{route('uhome')}}">
        <i class="bi bi-house"></i>
        <span style="font-size : 13.5px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Home</span>
      </a>
      @else
      <a class="nav-link " href="{{route('shome')}}">
        <i class="bi bi-house"></i>
        <span style="font-size : 13.5px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Home</span>
      </a> --}}
      @endif
    </li><!-- End Dashboard Nav -->

    
    

    


    {{-- @if(Auth::user()->role == '1' || Auth::user()->role == '1')
    <li class="nav-heading"></li>
    <li class="nav-heading">Access Grant</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('user-management') }}">
        <i class="bi bi-people"></i>
        <span style="font-size: 0.8rem;">User Management</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-lock"></i>
        <span style="font-size: 0.8rem;">Security Settings</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-newspaper"></i>
        <span style="font-size: 0.8rem;">Budgeting and Forecasting</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-currency-dollar"></i>
        <span style="font-size: 0.8rem;">Financial Reporting</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="https://fms7-apar.fguardians-fms.com/" target="_self">
        <i class="bi bi-currency-exchange"></i>
        <span style="font-size: 0.8rem;">Account Payable</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="https://fms7-apar.fguardians-fms.com/" target="_self">
        <i class="bi bi-calendar2-minus"></i>
        <span style="font-size: 0.8rem;">Account Receivable</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-bank"></i>
        <span style="font-size: 0.8rem;">General Ledger</span>
      </a>
    </li>
    
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-clock"></i>
        <span style="font-size: 0.8rem;">Maintenance Scheduling</span>
      </a>
    </li>
    @endif --}}


    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('user-management') }}">
        <i class="bi bi-people"></i>
        <span style="font-size: 0.8rem;">User Management</span>
      </a>
    </li>
    <hr>
    <li class="nav-heading">Payment Transaction</li>

      {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('/superadmin/dashboard')}}">
          <i class="bi bi-house-door"></i>
        <span>Home</span>
      </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('manageRole')}}">
            <i class="bi bi-person-fill-gear"></i><span>User Management</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('manageRole')}}">
            <i class="bi bi-person-fill-gear"></i><span>User Management</span>
        </a>
      </li><!-- End Components Nav --> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('payment')}}">
            <i class="bi bi-credit-card"></i><span style="font-size: 0.8rem;">Payment Gateways</span>
        </a>
      </li><!-- End Components Nav -->



          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('communication')}}">
                <i class="bi bi-chat-left-dots"></i><span style="font-size: 0.8rem;">Communication & Collaboration</span>
            </a>
          </li><!-- End Components Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('standards')}}">
                <i class="bi bi-list-columns"></i><span style="font-size: 0.8rem;">Accounting Standards</span>
            </a>
          </li><!-- End Components Nav -->
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-superadmin" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Super Admin</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-superadmin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item">
          <a class="nav-link collapsed" href="{{url('/superadmin/dashboard')}}">
              <i class="bi bi-house-door"></i>
            <span>Home</span>
          </a>
          </li><!-- End Dashboard Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('manageRole')}}">
                <i class="bi bi-person-fill-gear"></i><span>User Management</span>
            </a>
          </li><!-- End Components Nav -->

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('manageRole')}}">
                <i class="bi bi-person-fill-gear"></i><span>User Management</span>
            </a>
          </li><!-- End Components Nav -->

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav"   href="{{route('payment')}}">
                <i class="bi bi-credit-card"></i><span>Payment Gateways</span>
            </a>
          </li><!-- End Components Nav -->



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
      </li> --}}
    
    <hr>
    {{-- @include('f3.inc.navbar') --}}
    <li class="nav-heading">Workflow Approval</li>
    <li class="nav-item">
      <a  class="nav-link collapsed" href="tax-management-reports">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Tax and Financial Reports</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="fix-asset-reports">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Fixed Assets</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="ap-ar-reports">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Account Payable and Account  Receivable (APAR)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="bank-reconcilation">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Credit Management - Bank Reconcilation</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" class="nav-link " data-bs-target="#forms-nav"  href="{{ asset('clients') }}">
        <i class="bi bi-journal-text"></i><span style="font-size: 0.8rem;">Clients</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-reports" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Workflow Approval</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-reports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
        <li class="nav-item">
          <a class="nav-link " data-bs-target="#forms-nav"  href="{{ asset('clients') }}">
            <i class="bi bi-journal-text"></i><span>Clients</span>
          </a>
        </li><!-- End Forms Nav -->

      </ul>
    </li> --}}

    <hr>

    
    <li class="nav-heading">Vendor & Investment</li>
    {{-- @include('f10.inc.navbar') --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('home') }}">
        {{-- <a href="{{ route('index.dashboard') }}"> --}}
        <i class="bi bi-grid-fill fs-5"></i></i><span style="font-size: 0.8rem;">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('vendor.dashboard') }}">
        <i class="bi bi-person-lines-fill fs-5"></i><span style="font-size: 0.8rem;">Vendor Management</span>
      </a>
    </li>

    
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('investment.dashboard') }}">
        <i class="bi bi-person-vcard-fill fs-5"></i><span style="font-size: 0.8rem;">Investment Management</span>
      </a>
    </li>
    <hr>
    <li class="nav-heading">Finance</li>
    {{-- set condition for finance --}}
    @if(Auth::user()->role == '3'|| Auth::user()->role == '1' || Auth::user()->role == '0' )
    <li class="nav-item">
      

      {{-- @dd(!Auth::user()->usertype == '3' && Auth::user()->isSuper == '1' ); --}}
      {{-- {{ dd(Auth::user()) }} --}}
        @if(!Auth::user()->role == '3' || Auth::user()->role == '0' )
        <a class="nav-link collapsed" href="{{ route('user-depreciation') }}">
         
        @else
        {{-- {{ dd(Auth::user()) }} --}}
        <a class="nav-link collapsed" href="{{ route('mdepreciation') }}">
        @endif
        <i class="bi bi-calculator"></i>
        <span style="font-size: 0.8rem;">Depreciation Calculation</span>
      </a>
    </li>
    <li class="nav-item">
      @if(!Auth::user()->role == '3' || !Auth::user()->role == '0' )
        <a class="nav-link collapsed" href="{{ route('mtracking') }}">
      @else
        <a class="nav-link collapsed" href="{{ route('tracking') }}">
      @endif
        <i class="bi bi-tag"></i><span style="font-size: 0.8rem;">Asset Tracking Management</span>
      </a>
    </li>
    
    {{-- <li class="nav-item">
      <a class="nav-link collapsed">
        <i class="bi bi-files"></i><span style="font-size: 0.8rem;">Reports and Analytics</span>
      </a>
    </li> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" href="" data-bs-toggle="modal" data-bs-target="#ExtralargeModalReport">
        <i class="bi bi-files"></i>
        <span style="font-size: 0.8rem;">Reports and Analytics</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-tax" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i></i><span style="font-size: 0.8rem;">Tax Management</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-tax" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a  href="{{ route('taxrate') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Tax Rate</span>
          </a>
        </li>
        <li>
          <a href="{{ route('taxcalculation') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Tax Calculation</span>
          </a>
        </li>
      </ul>
    </li>
    @endif

    {{-- @if(Auth::user()->role == '3' || Auth::user()->role == '0' || Auth::user()->role == '0')
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span style="font-size: 0.8rem;">Services</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      @if(!Auth::user()->role == '3' || !Auth::user()->role == '0' )
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Messaging</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Company File</span>
          </a>
        </li> 
        <li>
          <a href="">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Employee Information</span>
          </a>
        </li>
      </ul>
      @else
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('announcement') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Announcement</span>
          </a>
        </li>
        <li>
          <a href="{{ route('messaging') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Messaging</span>
          </a>
        </li>
        <li>
          <a href="{{ route('company') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Company File</span>
          </a>
        </li>
        
        <li>
          <a href="{{ route('employee') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Employee Information</span>
          </a>
        </li>
        
        <li>
          <a href="{{ route('user-management') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">User Accounts</span>
          </a>
        </li>
        <li>
          <a href="{{ route('user-management') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Reset / Create Account</span>
          </a>
        </li>
      </ul>
      @endif
    </li><!-- End Components Nav -->
    @endif --}}
    <hr>
    @if(Auth::user()->role == '0' || Auth::user()->role == '0')
    <li class="nav-heading">Services</li>


 
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('announcement') }}">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Announcement</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('messaging') }}">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Messaging</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('company') }}">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Company File</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('employee') }}">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Employee Information</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('user-management') }}">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">User Accounts</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('user-management') }}">
        <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Reset / Create Account</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-archive"></i>
        <span style="font-size: 0.8rem;">Audit Trail</span>
      </a>
    </li>
    
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-archive"></i>
        <span style="font-size: 0.8rem;">Audit Trail</span>
      </a>
    </li> --}}






    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span style="font-size: 0.8rem;">Services</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      @if(!Auth::user()->role == '3' || !Auth::user()->role == '0' )
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Messaging</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Company File</span>
          </a>
        </li> 
        <li>
          <a href="">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Employee Information</span>
          </a>
        </li>
      </ul>
      @else
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link collapsed" href="">
            <i class="bi bi-archive"></i>
            <span style="font-size: 0.8rem;">Audit Trail</span>
          </a>
        </li>
        <li>
          <a href="{{ route('announcement') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Announcement</span>
          </a>
        </li>
        <li>
          <a href="{{ route('messaging') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Messaging</span>
          </a>
        </li>
        <li>
          <a href="{{ route('company') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Company File</span>
          </a>
        </li>
        
        <li>
          <a href="{{ route('employee') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Employee Information</span>
          </a>
        </li>
        
        <li>
          <a href="{{ route('user-management') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">User Accounts</span>
          </a>
        </li>
        <li>
          <a href="{{ route('user-management') }}">
            <i class="bi bi-circle"></i><span style="font-size: 0.8rem;">Reset / Create Account</span>
          </a>
        </li>
      </ul>
      @endif
    </li><!-- End Components Nav --> --}}
    @endif
    
  

    
  </ul>
    
</aside><!-- End Sidebar-->
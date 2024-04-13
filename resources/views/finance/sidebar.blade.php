 {{-- set condition for finance --}}
 @if(Auth::user()->role == '3'|| Auth::user()->role == '0'  )
 <li class="nav-item">
   

   {{-- @dd(!Auth::user()->usertype == '3' && Auth::user()->isSuper == '1' ); --}}
     @if(!Auth::user()->role == '3' || !Auth::user()->role == '0' )
       <a class="nav-link collapsed" href="{{ route('mdepreciation') }}">
     @else
       <a class="nav-link collapsed" href="{{ route('user-depreciation') }}">
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


   @if(Auth::user()->role == '3' || Auth::user()->role == '0' || Auth::user()->role == '0')
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
 @endif
 @if(Auth::user()->role == '0' || Auth::user()->role == '0')
 <li class="nav-heading">Pages</li>
 <li class="nav-item">
   <a class="nav-link collapsed" href="">
     <i class="bi bi-archive"></i>
     <span style="font-size: 0.8rem;">Audit Trail</span>
   </a>
 </li>
 @endif


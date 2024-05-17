 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a @class([
        'nav-item', 
        'collapsed' => Route::current()->getName() != 'home'
        ]) href="{{route('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li @class([
      'nav-item', 
      'collapsed' => Route::current()->getName() != 'jobs.index'
                || Route::current()->getName() != 'jobs.create'
      ]) >
      <a class="nav-link" data-bs-target="#job-nav" data-bs-toggle="collapse" href="">
        <i class="bi bi-briefcase"></i><span>Jobs</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="job-nav" @class([
        'nav-content collapse', 
        'show' => Route::current()->getName() == 'jobs.index'
                || Route::current()->getName() == 'jobs.create'
        ]) data-bs-parent="#sidebar-nav">
        <li>
          <a  href="{{route('jobs.index')}}" @class(['text-success' => Route::current()->getName() == 'jobs.index'])>
            <i class="bi bi-circle"></i><span>All Jobs</span>
          </a>
        </li>
        <li>
          <a href="{{route('jobs.create')}}">
            <i class="bi bi-circle"></i><span>Add new Job</span>
          </a>
        </li>
        <li>
          <a href="components-alerts.html">
            <i class="bi bi-circle"></i><span>Job Category</span>
          </a>
        </li>
      </ul>
    </li><!-- End Job -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#aplication-nav" data-bs-toggle="collapse" href="">
        <i class="bi bi-folder2-open"></i><span>Job Applications</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="aplication-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="components-alerts.html">
            <i class="bi bi-circle"></i><span>My Applications</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Inbox</span>
      </a>
    </li><!-- End Contact Page Nav -->


  </ul>
</aside><!-- End Sidebar-->
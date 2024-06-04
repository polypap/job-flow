 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li  @class(['nav-item', 'collapsed' => Route::current()->getName() == 'dashboard'])>
      <a @class([
        'nav-link',
        'collapsed' => Route::current()->getName() != 'dashboard'
        ]) href="{{route('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li @class([
      'nav-item', 
      'collapsed' => Route::current()->getName() == 'jobs.index'
                  || Route::current()->getName() == 'jobs.create'
                  || Route::current()->getName() == 'jobs.edit'
                  || Route::current()->getName() == 'categories.index'
                  || Route::current()->getName() == 'categories.create'              
      ]) >
      <a @class([
        'nav-link', 
        'collapsed' => Route::current()->getName() != 'jobs.index'
                    &&  Route::current()->getName() != 'jobs.create'
                    &&  Route::current()->getName() != 'jobs.edit'
                    && Route::current()->getName() != 'categories.index'
                    && Route::current()->getName() != 'categories.create'
                  
        ]) data-bs-target="#job-nav" data-bs-toggle="collapse" href="">
        <i class="bi bi-briefcase"></i><span>Jobs</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="job-nav" @class([
        'nav-content collapse', 
        'show' => Route::current()->getName() == 'jobs.index'
                || Route::current()->getName() == 'jobs.create'
                || Route::current()->getName() == 'jobs.edit'
                || Route::current()->getName() == 'categories.index'
                || Route::current()->getName() == 'categories.create'
        ]) data-bs-parent="#sidebar-nav">
        <li>
          <a  href="{{route('jobs.index')}}" @class(['text-success active' => Route::current()->getName() == 'jobs.index'])>
            <i class="bi bi-circle"></i><span>All Jobs</span>
          </a>
        </li>
        <li>
          <a href="{{route('jobs.create')}}" @class(['text-success active' => Route::current()->getName() == 'jobs.create'])>
            <i class="bi bi-circle"></i><span>Add new Job</span>
          </a>
        </li>
        <li>
          <a href="{{route('categories.index')}}" @class([
            'text-success active' => Route::current()->getName() == 'categories.index'
            ])>
            <i class="bi bi-circle"></i><span>Job Category</span>
          </a>
        </li>
      </ul>
    </li><!-- End Jobs Nav -->

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
    </li><!-- End Applicatios Nav -->

    <li @class([
      'nav-item', 
      'collapsed' => Route::current()->getName() == 'companies.index'              
      ]) >
      <a @class([
        'nav-link', 
        'collapsed' => Route::current()->getName() != 'companies.index'        
        ]) 
        data-bs-target="#company-nav" data-bs-toggle="collapse" href="">
        <i class="bi bi-folder2-open"></i><span>Companies</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="company-nav" @class([
        'nav-content collapse', 
        'show' => Route::current()->getName() == 'companies.index'
        ])  data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('companies.index')}}" @class([
            'text-success active' => Route::current()->getName() == 'companies.index'
            ])>
            <i class="bi bi-circle"></i><span>All Companies</span>
          </a>
        </li>
      </ul>
    </li><!-- End Companies Nav -->

    <li @class([
      'nav-item', 
      'collapsed' => Route::current()->getName() == 'countries.index'
                  || Route::current()->getName() == 'countries.create'
                  || Route::current()->getName() == 'countries.edit'
                  || Route::current()->getName() == 'states.index'
                  || Route::current()->getName() == 'states.create'
                  || Route::current()->getName() == 'states.edit'                    
      ])>
      <a @class([
        'nav-link', 
        'collapsed' => Route::current()->getName() != 'countries.index'
                  && Route::current()->getName() != 'countries.create'
                  && Route::current()->getName() != 'countries.edit'
                  && Route::current()->getName() != 'states.index'
                  && Route::current()->getName() != 'states.create'
                  && Route::current()->getName() != 'states.edit' 
                  
        ]) collapsed" data-bs-target="#globals-nav" data-bs-toggle="collapse" href="">
        <i class="bi bi-folder2-open"></i><span>Globals</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="globals-nav" @class([
        'nav-content collapse', 
        'show' => Route::current()->getName() == 'countries.index'
                  || Route::current()->getName() == 'countries.create'
                  || Route::current()->getName() == 'countries.edit'
                  || Route::current()->getName() == 'states.index'
                  || Route::current()->getName() == 'states.create'
                  || Route::current()->getName() == 'states.edit'
        ]) data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a href="{{route('countries.index')}}" @class([
            'text-success active' => Route::current()->getName() == 'countries.index'
                  || Route::current()->getName() == 'countries.create'
                  || Route::current()->getName() == 'countries.edit'
            ])>
            <i class="bi bi-circle"></i><span>Countries</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('states.index')}}" @class([
            'text-success active' => Route::current()->getName() == 'states.index'
                  || Route::current()->getName() == 'states.create'
                  || Route::current()->getName() == 'states.edit'
            ])>
            <i class="bi bi-circle"></i><span>States</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="#">
            <i class="bi bi-circle"></i><span>Cities</span>
          </a>
        </li>
      </ul>
    </li><!-- End Companies Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Inbox</span>
      </a>
    </li><!-- End Contact Page Nav -->


  </ul>
</aside><!-- End Sidebar-->
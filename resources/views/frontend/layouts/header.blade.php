<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
  <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
    <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
      <i class="flaticon-043-teddy-bear"></i>
      <span class="text-primary">JobFlow</span>
    </a>
    <button
      type="button"
      class="navbar-toggler"
      data-toggle="collapse"
      data-target="#navbarCollapse"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="collapse navbar-collapse justify-content-between"
      id="navbarCollapse"
    >
      <div class="navbar-nav font-weight-bold mx-auto py-0">
        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
        <a href="#" class="nav-item nav-link">Contact</a>
        @auth
          <a href="{{route('dashboard')}}" class="nav-item nav-link">
            <span class="badge bg-secondary fs-6">My Dashboard</span>
          </a>
        @endauth
      </div>
      @guest
        <a href="{{route('login')}}" class="btn btn-primary px-4 mr-4">Login</a>
        <a href="{{route('register')}}" class="btn btn-primary px-4">Register</a>
      @endguest
      @auth
        <div class="nav-item dropdown d-flex align-items-center ">
          {{-- <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fa fa-user"></i></a> --}}
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle border rounded-circle home-avatar  text-center mr-2 px-0 d-flex align-items-center justify-content-center" style="height:38px; width:38px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <ul class="dropdown-menu ">
              <li>
                <a class="dropdown-item" href="#">Profile</a>
              </li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li class="text-center">
                <form method="post" action="{{route('auth.logout')}}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-primary  px-4">Logout</button>
                </form>
              </li>
            </ul>
          </div>
          <p class="mb-0">{{auth()->user()->name}}</p>
        </div>
      @endauth
      
    </div>
  </nav>
</div>
<!-- Navbar End -->

<!-- Header Start -->
<div class="container-fluid  bg-home-header px-0 px-md-5 mb-5">
  <div class="row align-items-center px-3">
    <div class="col-lg-6 text-center text-lg-left">
      <h4 class="text-white mb-4 mt-5 mt-lg-0">No Fussle Life</h4>
      <h1 class="display-3 font-weight-bold text-white">
        New Approach to Job Search
      </h1>
      <p class="text-white mb-4">
        Sea ipsum kasd eirmod kasd magna, est sea et diam ipsum est amet sed
        sit. Ipsum dolor no justo dolor et, lorem ut dolor erat dolore sed
        ipsum at ipsum nonumy amet. Clita lorem dolore sed stet et est justo
        dolore.
      </p>
      <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
    </div>
    <div class="col-lg-6 text-center text-lg-right">
      <img class="img-fluid mt-5" src="{{asset('images/home-3.png')}}" alt="" />
    </div>
  </div>
</div>
<!-- Header End -->
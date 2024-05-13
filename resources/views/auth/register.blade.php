@extends('auth.layouts.app')
@section('content')
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <a href="{{route('home')}}" class="logo d-flex align-items-center w-auto">
              <img src="assets/img/logo.png" alt="">
              <span class="d-none d-lg-block">Job Flow</span>
            </a>
          </div><!-- End Logo -->

          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Register Your Account</h5>
                <p class="text-center small">required fields are marked with (*).</p>
              </div>
              @include('notifications._messages')
              <form class="row g-3 needs-validation" action="{{route('user.create')}}" method="post">
                @csrf
                <div class="col-12">
                  <label for="name" class="form-label">*Name</label>
                  <div class="input-group has-validation">
                    {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                    <input type="text" name="name" value="{{ old('name')}}" class="form-control" id="name">
                  </div>
                  <div class="text-danger pt-2">{{$errors->first('name')}}</div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">*Email</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" value="{{ old('email')}}" class="form-control" id="email">
                  </div>
                  <div class="text-danger pt-2">{{$errors->first('email')}}</div>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">*Password</label>
                  <input type="password" name="password" class="form-control" id="yourPassword">
                  <div class="text-danger pt-2">{{$errors->first('password')}}</div>
                </div>

                <div class="col-12">
                  <label for="confirmpassword" class="form-label">*Confirm Password</label>
                  <input type="password" name="confirmpassword" class="form-control" id="confirmpassword">
                  <div class="text-danger pt-2">{{$errors->first('confirmpassword')}}</div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terms" id="terms">
                    <label class="form-check-label" for="terms">*I agree with the terms and condtions</label>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <button class="btn btn-primary w-100" type="submit">Register</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">Already have an ccount? <a href="{{route('login')}}">Log into your account</a></p>
                </div>
              </form>
            </div>
          </div>

          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="">Paul</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
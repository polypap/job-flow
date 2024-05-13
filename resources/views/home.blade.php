@extends('frontend.layouts.app')
@section('content')
  <!-- Facilities Start -->
  <div class="container-fluid pt-5">
    <div class="container pb-3">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Latest Jobs</span>
        </p>
        <h1 class="mb-4">Latest Opportunities In Our Database</h1>
      </div>
      <div class="row">
        @forelse($jobs as $job)
          <div class="col-lg-6 col-md-12 pb-1">
            <x-card class="mb-4">
              <div class="card-body bg-light p-2 d-flex flex-column">
                <h4 class="fs-4 text-break text-wrap">{{$job->title}}</h4>
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <div class="d-flex flex-column">
                    <small class="mr-3"><i class="fa-solid fa-building text-primary"></i>  &nbsp;Company</small>
                    <small class="mr-3"><i class="fa-solid fa-location-dot text-primary"></i> &nbsp;<strong>{{$job->location}}</strong></small>
                    
                  </div>
                  <div class="d-flex justify-content-between">
                    <a href="#" class="mr-2">
                      <span class="badge bg-info text-light">{{$job->experience}}</span>
                    </a>
                    <a>
                      <span class="badge bg-info text-light">{{$job->category}}</span>
                    </a>
                  </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <strong class="mr-3 fs-4"><i class="fa-solid fa-money-check-dollar text-primary"></i> &nbsp;<strong>$ {{number_format($job->salary) }}</strong></strong>
                  </div>
                  <div>
                    <a href="" class="btn btn-primary px-4 mx-auto my-2">Check it out</a>
                  </div>
                </div>
              </div>
            </x-card>
          </div>
        @empty
          
        @endforelse
      </div>

      <div class="text-center pb-2 mt-4">
        <a class="btn btn-lg btn-primary" href="{{route('jobs.index')}}">See All Jobs</a>
      </div>
    </div>
  </div>
  <!-- Facilities Start -->

  <!-- About Start -->
  <!--<div class="container-fluid py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          {{-- <img class="img-fluid rounded mb-5 mb-lg-0" src="img/about-1.jpg" alt=""/> --}}
        </div>
        <div class="col-lg-7">
          <p class="section-title pr-5">
            <span class="pr-2">Learn About Us</span>
          </p>
          <h1 class="mb-4">Best School For Your Kids</h1>
          <p>
            Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
            dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
            Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
            dolor
          </p>
          <div class="row pt-2 pb-4">
            <div class="col-6 col-md-4">
              {{-- <img class="img-fluid rounded" src="img/about-2.jpg" alt="" /> --}}
            </div>
            <div class="col-6 col-md-8">
              <ul class="list-inline m-0">
                <li class="py-2 border-top border-bottom">
                  <i class="fa fa-check text-primary mr-3"></i>Labore eos amet
                  dolor amet diam
                </li>
                <li class="py-2 border-bottom">
                  <i class="fa fa-check text-primary mr-3"></i>Etsea et sit
                  dolor amet ipsum
                </li>
                <li class="py-2 border-bottom">
                  <i class="fa fa-check text-primary mr-3"></i>Diam dolor diam
                  elitripsum vero.
                </li>
              </ul>
            </div>
          </div>
          <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
        </div>
      </div>
    </div>
  </div>-->
  <!-- About End -->

  <!-- Class Start -->
  <!--<div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Popular Classes</span>
        </p>
        <h1 class="mb-4">Classes for Your Kids</h1>
      </div>
      <div class="row">
        <div class="col-lg-4 mb-5">
          <div class="card border-0 bg-light shadow-sm pb-2">
            {{-- <img class="card-img-top mb-2" src="img/class-1.jpg" alt="" /> --}}
            <div class="card-body text-center">
              <h4 class="card-title">Drawing Class</h4>
              <p class="card-text">
                Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                ipsum duo et no et, ipsum ipsum erat duo amet clita duo
              </p>
            </div>
            <div class="card-footer bg-transparent py-4 px-5">
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Age of Kids</strong>
                </div>
                <div class="col-6 py-1">3 - 6 Years</div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Total Seats</strong>
                </div>
                <div class="col-6 py-1">40 Seats</div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Class Time</strong>
                </div>
                <div class="col-6 py-1">08:00 - 10:00</div>
              </div>
              <div class="row">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Tution Fee</strong>
                </div>
                <div class="col-6 py-1">$290 / Month</div>
              </div>
            </div>
            <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card border-0 bg-light shadow-sm pb-2">
            {{-- <img class="card-img-top mb-2" src="img/class-2.jpg" alt="" /> --}}
            <div class="card-body text-center">
              <h4 class="card-title">Language Learning</h4>
              <p class="card-text">
                Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                ipsum duo et no et, ipsum ipsum erat duo amet clita duo
              </p>
            </div>
            <div class="card-footer bg-transparent py-4 px-5">
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Age of Kids</strong>
                </div>
                <div class="col-6 py-1">3 - 6 Years</div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Total Seats</strong>
                </div>
                <div class="col-6 py-1">40 Seats</div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Class Time</strong>
                </div>
                <div class="col-6 py-1">08:00 - 10:00</div>
              </div>
              <div class="row">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Tution Fee</strong>
                </div>
                <div class="col-6 py-1">$290 / Month</div>
              </div>
            </div>
            <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card border-0 bg-light shadow-sm pb-2">
            {{-- <img class="card-img-top mb-2" src="img/class-3.jpg" alt="" /> --}}
            <div class="card-body text-center">
              <h4 class="card-title">Basic Science</h4>
              <p class="card-text">
                Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                ipsum duo et no et, ipsum ipsum erat duo amet clita duo
              </p>
            </div>
            <div class="card-footer bg-transparent py-4 px-5">
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Age of Kids</strong>
                </div>
                <div class="col-6 py-1">3 - 6 Years</div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Total Seats</strong>
                </div>
                <div class="col-6 py-1">40 Seats</div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Class Time</strong>
                </div>
                <div class="col-6 py-1">08:00 - 10:00</div>
              </div>
              <div class="row">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Tution Fee</strong>
                </div>
                <div class="col-6 py-1">$290 / Month</div>
              </div>
            </div>
            <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <!-- Class End -->

  <!-- Registration Start -->
  <!--<div class="container-fluid py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 mb-5 mb-lg-0">
          <p class="section-title pr-5">
            <span class="pr-2">Book A Seat</span>
          </p>
          <h1 class="mb-4">Book A Seat For Your Kid</h1>
          <p>
            Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
            dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
            Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
            dolor
          </p>
          <ul class="list-inline m-0">
            <li class="py-2">
              <i class="fa fa-check text-success mr-3"></i>Labore eos amet
              dolor amet diam
            </li>
            <li class="py-2">
              <i class="fa fa-check text-success mr-3"></i>Etsea et sit dolor
              amet ipsum
            </li>
            <li class="py-2">
              <i class="fa fa-check text-success mr-3"></i>Diam dolor diam
              elitripsum vero.
            </li>
          </ul>
          <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a>
        </div>
        <div class="col-lg-5">
          <div class="card border-0">
            <div class="card-header bg-secondary text-center p-4">
              <h1 class="text-white m-0">Book A Seat</h1>
            </div>
            <div class="card-body rounded-bottom bg-primary p-5">
              <form>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control border-0 p-4"
                    placeholder="Your Name"
                    required="required"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control border-0 p-4"
                    placeholder="Your Email"
                    required="required"
                  />
                </div>
                <div class="form-group">
                  <select
                    class="custom-select border-0 px-4"
                    style="height: 47px"
                  >
                    <option selected>Select A Class</option>
                    <option value="1">Class 1</option>
                    <option value="2">Class 1</option>
                    <option value="3">Class 1</option>
                  </select>
                </div>
                <div>
                  <button
                    class="btn btn-secondary btn-block border-0 py-3"
                    type="submit"
                  >
                    Book Now
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <!-- Registration End -->

  <!-- Team Start -->
  <!--<div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Our Teachers</span>
        </p>
        <h1 class="mb-4">Meet Our Teachers</h1>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            {{-- <img class="img-fluid w-100" src="img/team-1.jpg" alt="" /> --}}
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Julia Smith</h4>
          <i>Music Teacher</i>
        </div>
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            {{-- <img class="img-fluid w-100" src="img/team-2.jpg" alt="" /> --}}
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Jhon Doe</h4>
          <i>Language Teacher</i>
        </div>
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            {{-- <img class="img-fluid w-100" src="img/team-3.jpg" alt="" /> --}}
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Mollie Ross</h4>
          <i>Dance Teacher</i>
        </div>
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            {{-- <img class="img-fluid w-100" src="img/team-4.jpg" alt="" /> --}}
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Donald John</h4>
          <i>Art Teacher</i>
        </div>
      </div>
    </div>
  </div>-->
  <!-- Team End -->

  <!-- Testimonial Start -->
  {{-- <div class="container-fluid py-5">
    <div class="container p-0">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Testimonial</span>
        </p>
        <h1 class="mb-4">What Parents Say!</h1>
      </div>
      <!--<div class="owl-carousel testimonial-carousel">
        <div class="testimonial-item px-3">
          <div class="bg-light shadow-sm rounded mb-4 p-4">
            <h3 class="fas fa-quote-left text-primary mr-3"></h3>
            Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
            eirmod clita lorem. Dolor tempor ipsum clita
          </div>
          <div class="d-flex align-items-center">
            <img
              class="rounded-circle"
              src="img/testimonial-1.jpg"
              style="width: 70px; height: 70px"
              alt="Image"
            />
            <div class="pl-3">
              <h5>Parent Name</h5>
              <i>Profession</i>
            </div>
          </div>
        </div>
        <div class="testimonial-item px-3">
          <div class="bg-light shadow-sm rounded mb-4 p-4">
            <h3 class="fas fa-quote-left text-primary mr-3"></h3>
            Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
            eirmod clita lorem. Dolor tempor ipsum clita
          </div>
          <div class="d-flex align-items-center">
            <img
              class="rounded-circle"
              src="img/testimonial-2.jpg"
              style="width: 70px; height: 70px"
              alt="Image"
            />
            <div class="pl-3">
              <h5>Parent Name</h5>
              <i>Profession</i>
            </div>
          </div>
        </div>
        <div class="testimonial-item px-3">
          <div class="bg-light shadow-sm rounded mb-4 p-4">
            <h3 class="fas fa-quote-left text-primary mr-3"></h3>
            Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
            eirmod clita lorem. Dolor tempor ipsum clita
          </div>
          <div class="d-flex align-items-center">
            <img
              class="rounded-circle"
              src="img/testimonial-3.jpg"
              style="width: 70px; height: 70px"
              alt="Image"
            />
            <div class="pl-3">
              <h5>Parent Name</h5>
              <i>Profession</i>
            </div>
          </div>
        </div>
        <div class="testimonial-item px-3">
          <div class="bg-light shadow-sm rounded mb-4 p-4">
            <h3 class="fas fa-quote-left text-primary mr-3"></h3>
            Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
            eirmod clita lorem. Dolor tempor ipsum clita
          </div>
          <div class="d-flex align-items-center">
            <img
              class="rounded-circle"
              src="img/testimonial-4.jpg"
              style="width: 70px; height: 70px"
              alt="Image"
            />
            <div class="pl-3">
              <h5>Parent Name</h5>
              <i>Profession</i>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </div> --}}
  <!-- Testimonial End -->

  <!-- Blog Start -->
  
  <!-- Blog End -->
@endsection
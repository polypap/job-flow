@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Job Application</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('jobs.index')}}"></a>Jobs</li>
        <li class="breadcrumb-item active">view</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section jobs">
    <div class="col-lg-12 text-end mb-4">
      <a href="{{route('jobs.index')}}" class="btn btn-primary">All Jobs</a>
      {{-- <a href="" class="btn btn-primary">Submit Application</a> --}}
    </div>

    <form method="post" action="{{route('job.application.store', $job)}}">
      @csrf
      <div class="card">
        <div class="card-header">
          Profile
        </div>
        <div class="card-body">
          <div class="row mt-4">
            <div class="col-md-4">
              <div class="card">
                <div class="text-center py-2 fs-2">
                  <i class="fa fa-circle-user"></i>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Basic Info</h5>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="d-flex align-content-center gap-3">
                        <div>
                          <i class="fa fa-phone text-success" aria-hidden="true"></i>
                        </div>
                        <div>
                          904-678-9897
                        </div>
                      </div>
                      <div class="d-flex align-content-center gap-3">
                        <div>
                          <i class="fa fa-envelope text-success" aria-hidden="true"></i>
                        </div>
                        <div>
                          {{$user->email}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3>{{$job->title}}</h3>
              <div class="d-flex gap-3">
                <div class="fw-bold">
                  <i class="bi bi-geo-alt-fill"></i> {{$job->city}}, FL
                </div>
                <div>
                  <i class="bi bi-building"></i> Gerp LLC
                </div>
                <div>
                  Posted: {{Helpers::getDateFormat($job->open_date)}}
                </div>
                <div>
                  <i class="bi bi-clock-fill"></i> Full-time
                </div>
              </div>
            </div>
            <div class="d-flex flex-column">
              <div class="d-inline-flex gap-2">
                <div>
                  Category: <strong>IT</strong>
                </div>
                <div>Applicants <span class="badge rounded-pill bg-info text-dark">5</span></div>
              </div>
              
              <div class="text-right mt-1">Closing: <strong>{{Helpers::getDateFormat($job->close_date)}}</strong></div>
            </div>
          </div>
          
        </div>
        <div class="card-body">
          <h5 class="card-title fs-2"><i class="bi bi-currency-dollar"></i> {{$job->salary}}</h5>
          <div class="row">
            <div class="col-sm-12">
              <h4 class="title fw-bold">Job Description</h4>
              <div>
                {!!$job->description!!}
              </div>
            </div>
          </div>
          </div>
          <!-- Multi Columns Form -->
          {{-- <form method="post" action="{{route('jobs.update', $job)}}" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-8">
              <label for="title" class="form-label">Job Title</label>
              <input type="text" value="{{$job->title}}" class="form-control" id="title" name="title">
              @error('title')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="company" class="form-label">Company</label>
              <select id="company" name="company_id" value="{{old('company_id',$job->company_id)}}" class="form-select">
                
              </select>
              @error('company')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="str_address" class="form-control" value="{{old('str_address',$job->str_address)}}" id="address" placeholder="1234 Main St">
              @error('str_address')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="city" class="form-label">City</label>
              <input type="text" name="city" value="{{old('city', $job->city)}}" class="form-control" id="city">
              @error('city')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select id="state" name="state_id" value="{{old('state_id', $job->state_id ?? '')}}" class="form-select">
              
                  
                
              </select>
              @error('state')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-2">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" name="zip" value="{{old('zip', $job->zip)}}" class="form-control" id="zip">
              @error('zip')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-2">
              <label for="opendate" class="form-label">Open Date</label>
              <input type="date" placeholder="04/05/2024" name="open_date" id="opendate" value="{{$job->open_date}}" class="form-control">
              @error('open_date')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-2">
              <label for="opendate" class="form-label">Close Date</label>
              <input type="date" name="close_date" id="closedate" value="{{$job->close_date}}" class="form-control">
              @error('close_date')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-2">
              <label for="status" class="form-label">Status</label>
              <select id="status" name="status" value="{{$job->status}}" class="form-select">
                <option value=1 {{($job->status == 1) ? 'selected' : ''}} >Active</option>
                <option value=0 {{($job->status == 0) ? 'selected' : ''}}>Closed</option>
              </select>
              @error('status')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-2">
              <label for="category" class="form-label">Category</label>
              <select id="category" name="category_id" value="{{old('category_id',$job->category_id)}}" class="form-select">
                
              </select>
            </div>
            <div class="col-md-2">
              <label for="salary"  class="form-label">Salary</label>
              <input type="text" placeholder="0.00" value="{{$job->salary}}" name="salary" class="form-control" id="salary">
              @error('salary')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="col-md-12">
              <label for="opendate" class="form-label">Description</label>
              <textarea class="form-control tinymce-editor" name="description" id="description" style="height: 150px;">{{$job->description}}</textarea>
              @error('description')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form><!-- End Multi Columns Form --> --}}
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit Application</button>
          </div>
        </div>
      </div>
    </form>

  </section>
@endsection

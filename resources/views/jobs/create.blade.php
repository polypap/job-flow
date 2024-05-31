@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Create Job</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('jobs.index')}}"></a>Jobs</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section jobs">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Job</h5>
        <!-- Multi Columns Form -->
        <form method="POST" action="{{route('jobs.store')}}" class="row g-3">
          @csrf
          <div class="col-md-8">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title">
            @error('title')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="company" class="form-label">Company</label>
            <select id="company" name="company_id" value="{{old('company_id')}}" class="form-select">
              @forelse($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
              @empty
                
              @endforelse
              
            </select>
            @error('company')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{old('address')}}" id="address" placeholder="1234 Main St">
            @error('address')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" value="{{old('city')}}" class="form-control" id="city">
            @error('city')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" value="{{old('state')}}" class="form-select">
              <option selected="">Choose...</option>
              <option>...</option>
            </select>
            @error('state')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="zipcode" class="form-label">Zip</label>
            <input type="text" name="zipcode" value="{{old('zipcode')}}" class="form-control" id="zipcode">
            @error('zipcode')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="opendate" class="form-label">Open Date</label>
            <input type="date" name="open_date" id="opendate" value="{{old('open_date')}}" class="form-control">
            @error('open_date')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="opendate" class="form-label">Close Date</label>
            <input type="date" name="close_date" id="closedate" value="{{old('close_date')}}" class="form-control">
            @error('close_date')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
              <option value=1 >Active</option>
              <option value=0>Closed</option>
            </select>
            @error('status')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category_id" class="form-select">
              @forelse($categories as $category)
                <option value="{{$category->id}}" >{{$category->title}}</option>
              @empty
                
              @endforelse
              
            </select>
          </div>
          <div class="col-md-2">
            <label for="salary"  class="form-label">Salary</label>
            <input type="text" placeholder="0.00" name="salary" class="form-control" id="salary">
            @error('salary')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="opendate" class="form-label">Description</label>
            <textarea class="form-control tinymce-editor" name="description" id="description" style="height: 150px;"></textarea>
            @error('description')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form><!-- End Multi Columns Form -->
      </div>
    </div>
  </section>
@endsection

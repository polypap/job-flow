@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Create Company</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('companies.index')}}"></a>Jobs</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('companies.index')}}" class="btn btn-primary"><i class="bi bi-eye"></i> All Companies</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Company</h5>
        <!-- Multi Columns Form -->
        <form method="POST" action="{{route('companies.store')}}" class="row g-3">
          @csrf
          <div class="col-md-6">
            <label for="title" class="form-label">Company Name</label>
            <input type="text" value="{{old('name')}}" class="form-control" id="title" name="name">
            @error('title')
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
            <select id="state" name="state_id" value="{{old('state_id')}}" class="form-select">
              @forelse($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
              @empty
                
              @endforelse
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

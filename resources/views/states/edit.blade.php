@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Edit State</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('countries.index')}}"></a>States</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('states.index')}}" class="btn btn-primary"><i class="bi bi-eye"></i> All States</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">State</h5>
        <!-- Multi Columns Form -->
        <form method="POST" action="{{route('states.update', $state)}}" class="row g-3">
          @csrf
          @method('PUT')
          <div class="col-md-6">
            <label for="title" class="form-label">State Name</label>
            <input type="text" value="{{old('name', $state->name)}}" class="form-control" id="title" name="name">
            @error('name')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="title" class="form-label">State Code</label>
            <input type="text" value="{{old('code', $state->code)}}" class="form-control" id="title" name="code">
            @error('code')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-3">
            <label for="country" class="form-label">Country</label>
            <select id="country" name="country_id" value="{{old('country_id', $state->country_id)}}" class="form-select">
              @forelse($countries as $country)
                <option value="{{$country->id}}" {{old('country_id', $state->country_id) == $country->id ? 'selected' : ''}} >{{$country->name}}</option>
              @empty

              @endforelse
            </select>
            @error('state')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          {{-- <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" style="height: 150px;"></textarea>
            @error('description')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div> --}}
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form><!-- End Multi Columns Form -->
      </div>
    </div>
  </section>
@endsection

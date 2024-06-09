@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Create Country</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('countries.index')}}"></a>Countries</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('countries.index')}}" class="btn btn-primary"><i class="bi bi-eye"></i> All Country</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Country</h5>
        <!-- Multi Columns Form -->
        <form method="POST" action="{{route('countries.store')}}" class="row g-3">
          @csrf
          <div class="col-md-6">
            <label for="name" class="form-label">Country Name</label>
            <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name">
            @error('title')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="code" class="form-label">Country Abbreviation Code</label>
            <input type="text" value="{{old('code')}}" class="form-control" id="code" name="code">
            @error('code')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>      
          <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" style="height: 150px;"></textarea>
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

@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Edit Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}"></a>Categories</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('categories.index')}}" class="btn btn-primary"><i class="bi bi-eye"></i> All Category</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Category</h5>
        <!-- Multi Columns Form -->
        <form method="post" action="{{route('categories.update', $category)}}" class="row g-3">
          @csrf
          @method('PUT')
          <div class="col-md-6">
            <label for="title" class="form-label">Category Name</label>
            <input type="text" value="{{old('title', $category->title)}}" class="form-control" id="title" name="title">
            @error('title')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="category" class="form-label">Status</label>
            <select id="status" name="status" value="{{old('status', $category->status)}}" class="form-select">
              <option value="1" {{old('status', $category->status) ==1 ? 'selected' : ''}}>Active</option>
              <option value="0" {{old('status', $category->status) ==0 ? 'selected' : ''}}>Inactive</option>
            </select>
            @error('status')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          
          <div class="col-md-12">
            <label for="opendate" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" style="height: 150px;">{{old('description', $category->description)}}</textarea>
            @error('description')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form><!-- End Multi Columns Form -->
      </div>
    </div>
  </section>
@endsection
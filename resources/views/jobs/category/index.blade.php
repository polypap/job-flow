@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Category List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">job Categories</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('categories.create')}}" class="btn btn-primary">+ New Category</a>
      </div>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Job Categories</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; ?>
                @forelse($categories as $category)
                <tr>
                  <th scope="row">{{$counter}}</th>
                  <td> {{$category->title}}</td>
                  <td> {{Helpers::booleanToString($category->status,['true'=>'Active','flase'=>'Closed'])}}</td>
                  <td>{!!Helpers::shortenString($category->description, 10)!!}</td>
                  <td>
                    <div class="btn-group gap-1">
                      <a href="{{route('categories.edit',$category)}}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                      <a th:href="@{clients/viewclient(id=${client.id})}" class="btn btn-sm btn-success" id="viewBtn" data-bs-toggle="modal" data-bs-target="#viewClient"><i class="bi bi-ticket-detailed"></i></a>
                      <a href="{{route('categories.destroy', $category)}}" class="btn btn-sm btn-danger" data-bs-toggle="modal" id="deleteBtn" data-bs-target="#deleteCategory" ><i class="bi bi-trash"></i></a>
                    </div>
                  </td>
                </tr>
                <?php $counter+=1; ?>
                @empty
                  <tr>
                    <td colspan="8">No jobs show</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  @include('jobs.category.delete')
</section>
@endsection
@section('script')
  <script type="module">
    jQuery(document).ready(function(){
      let deleteBtn = jQuery('#deleteBtn');
      deleteBtn.on('click', function(event){
        event.preventDefault();
        let action = jQuery(this).attr('href');
        console.log(action);
        let form = jQuery('#deleteCategory #deleteForm');
        form.attr('action', action);
      });
    });
  </script>
@endsection
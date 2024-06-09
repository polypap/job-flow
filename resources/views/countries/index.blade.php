@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Country List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Countries</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('countries.create')}}" class="btn btn-primary">+ New Country</a>
      </div>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Countries</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Code</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; ?>
                @forelse($countries as $country)
                <tr>
                  <th scope="row">{{$counter}}</th>
                  <td> {{$country->name}}</td>
                  <td> {{$country->code}}</td>
                  <td>
                    <div class="btn-group gap-1">
                      <a href="{{route('countries.edit',$country)}}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                      <a th:href="@{clients/viewclient(id=${client.id})}" class="btn btn-sm btn-success" id="viewBtn" data-bs-toggle="modal" data-bs-target="#viewClient"><i class="bi bi-ticket-detailed"></i></a>
                      <a href="{{route('countries.destroy', $country)}}" class="btn btn-sm btn-danger" data-bs-toggle="modal" id="deleteBtn" data-bs-target="#deleteCategory" ><i class="bi bi-trash"></i></a>
                    </div>
                  </td>
                </tr>
                <?php $counter+=1; ?>
                @empty
                  <tr>
                    <td colspan="8">No countries to show</td>
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
@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Job List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">jobs</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('jobs.create')}}" class="btn btn-primary">+ New Job</a>
      </div>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jobs</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">City</th>
                  <th scope="col">State</th>
                  <th scope="col">Company</th>
                  <th scope="col">Status</th>
                  <th scope="col">Open Date</th>
                  <th scope="col">Close Date</th>
                  <th scope="col">Category</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; ?>
                @forelse($jobs as $job)
                <tr>
                  <th scope="row">{{$counter}}</th>
                  <td> {{Helpers::shortenString($job->title, 3)}}</td>
                  <td></td>
                  <td></td>
                  <td>{{$job->company}}</td>
                  <td>
                    {{Helpers::booleanToString($job->status,['true'=>'Active','flase'=>'Closed'])}}</td>
                  <td>{{Helpers::getDateFormat($job->open_date)}}</td>
                  <td>{{Helpers::getDateFormat($job->close_date)}}</td>
                  <td>
                    @foreach($job->category as $cat)
                      {{$cat->title}}
                    @endforeach
                  </td>
                  <td>
                    <div class="btn-group gap-1">
                      <a th:href="@{clients/editclient(id=${client.id})}" class="btn btn-sm btn-primary" id="editBtn" data-bs-toggle="modal" data-bs-target="#editClient"><i class="bi bi-pencil-square"></i></a>
                      <a th:href="@{clients/viewclient(id=${client.id})}" class="btn btn-sm btn-success" id="viewBtn" data-bs-toggle="modal" data-bs-target="#viewClient"><i class="bi bi-ticket-detailed"></i></a>
                      <a  th:href="@{clients/delete(id=${client.id})}" class="btn btn-sm btn-danger" data-bs-toggle="modal" id="deleteBtn" data-bs-target="#deleteClient" ><i class="bi bi-trash"></i></a>
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
</section>

@endsection   
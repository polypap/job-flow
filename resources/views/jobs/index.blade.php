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
                  <td>
                    @if($job->company)
                      {{$job->company->name}}
                    @endif
                  </td>
                  <td>
                    {{Helpers::booleanToString($job->status,['true'=>'Active','flase'=>'Closed'])}}</td>
                  <td>{{Helpers::getDateFormat($job->open_date)}}</td>
                  <td>{{Helpers::getDateFormat($job->close_date)}}</td>
                  <td>
                    {{$job->category_name}}
                  </td>
                  <td>
                    <div class="btn-group gap-1">
                      <a  class="btn btn-sm btn-primary" id="editBtn" href="{{route('jobs.edit',$job)}}"><i class="bi bi-pencil-square"></i></a>
                      <a th:href="@{clients/viewclient(id=${client.id})}" class="btn btn-sm btn-success" id="viewBtn" data-bs-toggle="modal" data-bs-target="#viewClient"><i class="bi bi-ticket-detailed"></i></a>
                      <a  href="{{route('jobs.destroy', $job)}}" class="btn btn-sm btn-danger" data-bs-toggle="modal" id="deleteBtn" data-bs-target="#deleteJob" ><i class="bi bi-trash"></i></a>
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
      @include('jobs.delete')
  </div>
</section>

@endsection  
@section('script')
<script type="module">
  jQuery(document).ready(function(){
    console.log("fjf")
    jQuery('table #deleteBtn').on('click', function(event){
      event.preventDefault();
      console.log(jQuery(this).attr('href'));

      jQuery('#confirmDelete').attr('href', jQuery(this).attr('href'));
      jQuery('#confirmDelete').on('click', function(event){
        event.preventDefault();
        jQuery.ajax({ 
          type: "post",
          url:jQuery(this).attr('href'),
          headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
          data: {_method: 'delete'}, 
          success: function(response) {
            window.location= '/jobs';
          },
          error : function(data) {
            console.log(data);
          }
        });
      })
      
    });
  })
</script>
@endsection
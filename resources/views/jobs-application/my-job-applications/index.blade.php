@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>My Job Applications</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">job Applications</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('jobs.index')}}" class="btn btn-primary">All Jobs</a>
      </div>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Applications</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Job Title</th>
                  <th scope="col">Location</th>
                  <th scope="col">Applied on</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; ?>
                @forelse($applications as $myJobApplication)
                <tr>
                  <th scope="row">{{$counter}}</th>
                  <td> {{Helpers::shortenString($myJobApplication->job->title, 3)}}</td>
                  <td>{{$myJobApplication->job->city}}</td>
                  <td>
                    {{Helpers::getDateFormat($myJobApplication->created_at)}}
                  </td>
                  <td>
                    <div class="btn-group gap-1">
                      <a href="" class="btn btn-sm btn-success"><i class="bi bi-ticket-detailed"></i></a>
                      <a  href="{{route('my-job-application.destroy', $myJobApplication)}}" class="btn btn-sm btn-danger deleteApp" data-bs-toggle="modal" data-bs-target="#cancelApplication" data-job-title="{{$myJobApplication->job->title}}" ><i class="fa fa-times fw-2"></i> Cancel</a>
                    </div>
                  </td>
                </tr>
                <?php $counter+=1; ?>
                @empty
                  <tr>
                    <td colspan="8">No Application found</td>
                  </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  @include('jobs-application.my-job-applications.delete')
</section>
@endsection
@section('script')
  <script type="module">
    jQuery(document).ready(function(){
      let deleteBtn = jQuery('table .deleteApp');
      deleteBtn.on('click', function(event){
        event.preventDefault();
        let action = jQuery(this).attr('href');
        let title = jQuery(this).attr('data-job-title');
        jQuery('#cancelApplication #modalJobTitle').text(title);
        console.log(title);
        let form = jQuery('#cancelApplication #appCancelForm');
        form.attr('action', action);
      });
    });
  </script>
@endsection
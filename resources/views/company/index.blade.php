@extends('backend.layouts.app')
@section('content')
  <div class="pagetitle">
    <h1>Company List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Companies</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section jobs">
    <div class="row">
      <div class="col-lg-12 text-end mb-4">
        <a href="{{route('companies.create')}}" class="btn btn-primary">+ New Company</a>
      </div>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Companies</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">City</th>
                  <th scope="col">State</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; ?>
                @forelse($companies as $company)
                <tr>
                  <th scope="row">{{$counter}}</th>
                  <td> {{$company->name}}</td>
                  <td> {{$company->city}}</td>
                  <td> {{$company->state}}</td>
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
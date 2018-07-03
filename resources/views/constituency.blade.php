@extends('master')
@section('content')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">About
        <small>The System</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('projects.home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>
      <!-- /.row -->

      <!-- Team Members -->
      <h2>Projects in {{ $constituencyName }} Constituency</h2>

      <div class="row">
        @if('projects')
          @foreach($projects as $project)
            <div class="col-lg-4 mb-4">
              <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                  <h4 class="card-title">{{ $project->name }}</h4>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $project->completion }} % Done</h6>
                  <p class="card-text"><strong>Allocated: {{ $project->budget }}</strong></p>
                  <p class="card-text">{{ $project->constituency }} Constituency</p>
                  <p class="card-text">{{ $project->ward }} Ward</p>
                  <p class="card-text">{{ $project->description }}</p>
                </div>
                <div class="card-footer">
                  <p class="card-text">Contractor: {{ $project->contractor }}</p>
                  <p class="card-text">Category: {{ $project->category }}</p>
                </div>
              </div>
            </div>
          @endforeach
        @endif
        </div>
      </div>
      <!-- /.row -->
@endsection
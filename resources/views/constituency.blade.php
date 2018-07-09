@extends('master')
@section('isConstituency')
    active
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">PROJECTS
        <small>By County</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('projects.home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Constituency</li>
      </ol>
      <!-- /.row -->

      <!-- Team Members -->
      <h2>Projects in {{ $constituencyName }} Constituency</h2>

      <div class="row">
        @if('projects')
          @foreach($projects as $project)
                  <a href="{{ url('/projects/'.$project->id) }}">
                    <div class="col-md-4 md-margin-bottom-40">
                      <div class="card small">
                        <div class="card-image">
                          <img class="img-responsive" src="{{ asset($project->path)}}" alt="">
                          <span class="card-title">{{ $project->name }}</span>
                        </div>
                        <div class="card-content">
                            <p>Budget: {{ $project->budget }}</p>
                            <p><strong>{{ $project->completion }}% Completed</strong></p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $project->completion }}"
                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$project->completion}}%">
                                    {{ $project->completion }}%
                                </div>
                            </div>
                            <p>Due: <strong>{{ $project->due_date }}</strong></p>
                            <p>Category: {{ $project->category }}</p>
                            <p>{{ $project->constituency_name }} constituency</p>
                            <p>{{ $project->ward }} ward</p>
                            <p>Contractor: <strong>{{ $project->contractor }}</strong></p>
                        </div>
                      </div>
                    </div>
                  </a>
          @endforeach
        @endif
        </div>
      </div>
      <!-- /.row -->
@endsection
@extends('master')
@section('isProjects')
    active
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Projects
        <small>All</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('projects.home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Projects</li>
      </ol>

      <!-- Team Members -->
      <h2>Our Projects</h2>

      <div class="row">
        @if('projects')
          @foreach($projects as $project)
              {{--TODO fix this--}}
                  <a href="{{ url('/projects/'.$project->project_id) }}">
                      <div class="col-md-4 md-margin-bottom-40">
                      <div class="card small">
                        <div class="card-image">
                          <img class="img-responsive" src="{{ asset($project->photos['photo_path'])}}" alt="">
                          <span class="card-title">{{ $project->project_name }}</span>
                        </div>
                        <div class="card-content">
                            <p>Budget: {{ $project->budget }}</p>
                            <p><strong>{{ $project->completion }}% Completed</strong></p>
                            <div class="progress">
                                <div class="progress-bar col-sm-10 col-md-6 col-lg-6" role="progressbar" aria-valuenow="{{ $project->completion }}"
                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$project->completion}}%">
                                    {{ $project->completion }}%
                                </div>
                            </div>
                            <p>Due: <strong>{{ $project->due_date }}</strong></p>
                            <p>Department: {{ $project->project_category }}</p>
                            <p>{{ $project->constituency_name }} constituency</p>
                            <p>{{ $project->project_ward }} ward</p>
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
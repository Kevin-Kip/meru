@extends('master')
@section('isCategory')
    active
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">PROJECTS
            <small>By Category</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('projects.home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <!-- /.row -->

        <!-- Team Members -->
        <h2>{{ $categoryName }} Category</h2>

        <div class="row">
            @if('projects')
                @foreach($projects as $project)
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
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $project->completion }}"
                                             aria-valuemin="0" aria-valuemax="100" style="width:{{$project->completion}}%">
                                            {{ $project->completion }}%
                                        </div>
                                    </div>
                                    <p>Due: <strong>{{ $project->due_date }}</strong></p>
                                    <p>Department: {{ $project->project_category }}</p>
                                    @foreach($constituencies as $constituency)
                                        @if($project->project_constituency == 1)
                                            <p>{{ $constituency->constituency_name }} constituency</p>
                                        @endif
                                    @endforeach
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
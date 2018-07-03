@extends('users.master')
@section('content')
    <div class="text-white">
        <a class="btn btn-primary" href="#">
            <i class="fa fa-plus"></i>
            Generate Report
        </a>
    </div>
    <p></p>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Projects</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Constituency</th>
                        <th>Budget</th>
                        <th>Completion</th>
                        <th>Due Date</th>
                    </tr>
                    </thead>
                    @if('projects')
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->category }}</td>
                                <td>{{ $project->constituency }}</td>
                                <td>{{ $project->budget }}</td>
                                <td>{{ $project->completion }}</td>
                                <td>{{ $project->due_date }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
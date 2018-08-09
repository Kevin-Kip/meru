@extends('contractor.master')
@section('content')
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
                        <th>Department</th>
                        <th>Budget</th>
                        <th>Balance</th>
                        <th>Completion</th>
                        <th>Due Date</th>
                        <th>Update</th>
                    </tr>
                    </thead>
                    @if('projects')
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->project_name }}</td>
                                <td>{{ $project->project_category }}</td>
                                <td>KSh. {{ $project->budget }}</td>
                                <td>KSh. {{ $project->balance }}</td>
                                <td>{{ $project->completion }}%</td>
                                <td>{{ $project->due_date }}</td>
                                <td>
                                    @if($project->completion < 100)
                                        <a href="{{ route('show.progress',['id'=>$project->project_id]) }}" class="btn btn-primary">
                                            Update Progress
                                        </a>
                                    @elseif($project->completion == 100)
                                        <button class="btn btn-success">Project Completed</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
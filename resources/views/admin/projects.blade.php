@extends('admin.master')
@section('content')

    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Message Deleted Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ooops!</strong> Could Not Delete Message
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
        <div class="text-white">
            <a class="btn btn-primary" href="{{ route('project.create') }}">
                <i class="fa fa-plus"></i>
                Add New Project
            </a>
        </div>
        <p></p>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Projects Table</div>
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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        @if('projects')
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->category }}</td>
                                    <td>{{ $project->constituency_name }}</td>
                                    <td>{{ $project->budget }}</td>
                                    <td>{{ $project->completion }}</td>
                                    <td>{{ $project->due_date }}</td>
                                    <td>
                                        <a href="{{ route('project.edit',['id'=>$project->id]) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('project.delete',['id'=>$project->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
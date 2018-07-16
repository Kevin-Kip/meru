@extends('admin.master')
@section('content')
    @include('admin.cards')

    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Deleted Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Could Not Delete
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif

        <div class="text-white">
            <a class="btn btn-primary" href="{{ route('department.create') }}">
            <i class="fa fa-plus"></i>
                Add New Department
            </a>
        </div>
        <p></p>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Departments Table</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        @if('departments')
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->department_name }}</td>
                                    <td>{{ $department->department_description }}</td>
                                    <td>
                                        <form action="{{ route('department.delete',['id'=>$department->department_id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
{{--                    {{ $departments->links() }}--}}
                </div>
            </div>
        </div>
    @endsection
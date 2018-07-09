@extends('admin.master')
@section('content')

    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Deleted Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ooops!</strong> Could Not Delete
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif

        <div class="text-white">
            <a class="btn btn-primary" href="{{ route('user.create') }}">
            <i class="fa fa-plus"></i>
                Add New User
            </a>
        </div>
        <p></p>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Users Table</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        @if('users')
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name ." ".$user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('user.edit',['id'=>$user->id]) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('user.delete',['id'=>$user->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    @endsection
@extends('admin.master')
@section('content')
        <div class="text-white">
            <a class="btn btn-primary" data-toggle="modal" data-target="#newUserModal">
            <i class="fa fa-plus"></i>
                Add New User
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Constituency</th>
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
                                    <td>{{ $user->constituency }}</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
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
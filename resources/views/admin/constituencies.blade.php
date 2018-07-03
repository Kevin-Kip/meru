@extends('admin.master')
@section('content')
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Constituencies Table</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @if('users')
                        <tbody>
                        @foreach($constituencies as $constituency)
                            <tr>
                                <td>{{ $constituency->name }}</td>
                                <td><button class="btn btn-success">Edit</button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
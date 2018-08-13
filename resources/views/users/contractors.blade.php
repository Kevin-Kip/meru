@extends('users.master')
@section('content')
    @include('users.cards')
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Contractors</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Assigned Projects</th>
                        </tr>
                        </thead>
                        @if('messages')
                            <tbody>
                            @foreach($contractors as $contractor)
                                <tr>
                                    <td>{{ $contractor->first_name ." ".$contractor->last_name }}</td>
                                    <td>{{ $contractor->email }}</td>
                                    <td>{{ $contractor->phone }}</td>
                                    <td>{{ $contractor->assigned_projects }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                    {{--{{ $messages->links() }}--}}
                </div>
            </div>
        </div>
    @endsection
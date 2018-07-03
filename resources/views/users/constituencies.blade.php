@extends('users.master')
@section('content')
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Constituencies</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                    </thead>
                    @if('users')
                        <tbody>
                        @foreach($constituencies as $constituency)
                            <tr>
                                <td>{{ $constituency->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('users.master')
@section('content')
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Messages</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Email</th>
                            <th>Constituency</th>
                            <th>Message</th>
                            <th>Sent On</th>
                        </tr>
                        </thead>
                        @if('messages')
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ $message->sender_first_name ." ".$message->sender_last_name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->constituency }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->created_at }}</td>
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
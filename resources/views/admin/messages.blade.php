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

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Messages Table</div>
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
                            <th>Delete</th>
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
                                    <td>
                                        <form action="{{ route('message.delete',['id'=>$message->id]) }}" method="post">
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
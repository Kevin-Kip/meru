@extends('admin.master')
@section('content')
    @include('admin.cards')

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
                            <th>Reply</th>
                        </tr>
                        </thead>
                        @if('messages')
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ $message->sender_first_name ." ".$message->sender_last_name }}</td>
                                    <td>{{ $message->sender_email }}</td>
                                    <td>{{ $message->sender_constituency }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->created_at }}</td>
                                    <td>
                                        <a href="{{ route('message.reply',['id' => $message->message_id]) }}" class="btn btn-info">Reply</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>

    <!-- Reply Modal-->
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
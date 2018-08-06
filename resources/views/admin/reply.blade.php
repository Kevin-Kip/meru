@extends('admin.master')
@section('content')

    <!-- Message Card-->
    @if('message')
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Email sent successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Unable to send email
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif

    <div class="card mb-3 col-md-10">
        <div class="card-header">
            <i class="fa fa-table"></i> Reply To</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <p>{{ $message[0]->message }}</p>
            </div>
        </div>
    </div>

    <!-- Example DataTables Card-->
    <div class="card mb-3 col-md-10">
        <div class="card-header">
            <i class="fa fa-table"></i>Response</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <form action="{{ route('message.respond',['id'=>$message[0]->message_id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="response"></label>
                        <textarea class="form-control" type="text" name="response" id="response" required autofocus>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input class="form-control" type="email" name="email" value="{{ $message[0]->sender_email }}" id="email" hidden>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="dubmit" value="SEND REPLY" class="col-md-4 btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
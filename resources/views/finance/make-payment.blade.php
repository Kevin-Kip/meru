@extends('finance.master')
@section('content')
    <!-- Message Card-->
    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Saved Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Could not Save
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    <!-- Example DataTables Card-->
    <div class="card mb-3 col-md-10">
        <div class="card-header">
            <i class="fa fa-table"></i> Make Payment</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <div>
                    <br/>
                    <p>Name: {{ $project->project_name }}</p>
                    <p>Budget: KSh. {{ $project->budget }}</p>
                    <p>Amount to Pay: {{ ($project->budget)*2 }}</p>
                </div>
                <form action="{{ route('user.save') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="first_name">Amount to Pay:</label>
                        <input class="form-control" type="number" name="first_name" id="first_name" required autofocus>
                        @if($errors->has('first_name') )
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="dubmit" value="UPDATE" class="col-md-4 btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('admin.master')
@section('content')

    <!-- Message Card-->
    @if('message')
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Saved successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Unable to Save
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif

    <!-- Example DataTables Card-->
    <div class="card mb-3 col-md-10">
        <div class="card-header">
            <i class="fa fa-table"></i>New Constituency</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <form action="{{ route('constituency.save')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="constituency_name"></label>
                        <input class="form-control" type="text" name="constituency_name" id="constituency_name" required autofocus>
                        @if($errors->has('constituency_name') )
                            <span class="text-danger">{{ $errors->first('constituency_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="dubmit" value="SAVE" class="col-md-4 btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
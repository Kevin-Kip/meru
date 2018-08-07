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
            <i class="fa fa-table"></i>Update Ward</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <form action="{{ route('ward.update',['id'=>$ward->ward_id])}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="ward_name"></label>
                        <input class="form-control" type="text" value="{{ $ward->ward_name }}" name="ward_name" id="ward_name" required autofocus>
                        @if($errors->has('ward_name') )
                            <span class="text-danger">{{ $errors->first('ward_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ward_constituency">Constituency:</label>
                        <select name="ward_constituency" id="ward_constituency" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @if('constituencies')
                                @foreach($constituencies as $constituency)
                                    <option value="{{ $constituency->constituency_id }}">{{ $constituency->constituency_name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('ward_constituency') )
                            <span class="text-danger">{{ $errors->first('ward_constituency') }}</span>
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
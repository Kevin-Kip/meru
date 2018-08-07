@extends('finance.master')
@section('content')
    <!-- Message Card-->
    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Payment made Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Unable to complete transaction
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
                    <p>Maximum Payable now:
                        @if($project->balance == 0)
                            {{ $project->budget}}
                        @else
                            {{ $project->balance }}
                        @endif
                    </p>
                </div>
                <form action="{{ route('finance.makepay',['id'=>$project->project_id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="price">Amount to Pay (KSh.):</label>
                        <input class="form-control" type="number" name="price" id="price" required autofocus>
                        @if($errors->has('price') )
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                        @if(session()->has('price_error') )
                            <span class="text-danger">{{ session()->get('price_error') }}</span>
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
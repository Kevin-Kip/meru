@extends('contractor.master')
@section('content')
    <!-- Message Card-->
    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Progress Updated Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Unable to update progress
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    <!-- Example DataTables Card-->
    <div class="card mb-3 col-md-10">
        <div class="card-header">
            <i class="fa fa-table"></i> Update Progress</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <div>
                    <br/>
                    <p>Name: {{ $project->project_name }}</p>
                    <p>Budget: KSh. {{ $project->budget }}</p>
                    <p>
                        @if($project->completion < 100)
                            Current progress: {{ $project->completion }}%
                        @elseif($project->completion == 100)
                            Project Completed
                        @endif
                    </p>
                </div>
                <form action="{{ route('update.progress',['id'=>$project->project_id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    @if($project->completion < 100)
                        <div class="form-group">
                            <label for="completion">Amount to Pay (KSh.):</label>
                            <input class="form-control" type="number" name="completion" id="completion" max="100" value="{{ $project->completion }}" required autofocus>
                            @if($errors->has('completion') )
                                <span class="text-danger">{{ $errors->first('completion') }}</span>
                            @endif
                            @if(session()->has('completion_error') )
                                <span class="text-danger">{{ session()->get('completion_error') }}</span>
                            @endif
                        </div>
                    @endif

                    <div class="form-group">
                        @if($project->completion < 100)
                            <input type="submit" name="submit" id="dubmit" value="UPDATE" class="col-md-4 btn btn-primary">
                        @elseif($project->completion == 100)
                            <button class="col-md-4 btn btn-primary" disabled>Project Completed</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
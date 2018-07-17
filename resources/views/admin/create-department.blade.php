@extends('admin.master')
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
            @elseif(session()->get('message') == "")
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Welcome!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
    @endif
        <!-- Example DataTables Card-->
        <div class="card mb-3 col-md-10">
            <div class="card-header">
                <i class="fa fa-table"></i> New Department</div>
            <div class="card-bodyalign-content-center">
                <div class="col-sm-12">
                    <form action="{{ route('department.save') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="department_name">Department Name:</label>
                            <input class="form-control" type="text" name="department_name" id="department_name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="department_description">Department Description:</label>
                            <input class="form-control" type="text" name="department_description" placeholder="Max 500 words" id="department_description" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Department Photo:</label>
                            <input class="form-control" type="file" name="file" id="photos" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="dubmit" value="SAVE" class="col-md-4 btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@extends('admin.master')
@section('content')
        <!-- Message Card-->
        @if(session()->has('message'))
            @if(session()->get('message') == "success")
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Updated Successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session()->get('message') == "error")
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>Ooops!</strong> Could Not Update
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif
    @if('project')
        <!-- Example DataTables Card-->
        <div class="card mb-3 col-md-10">
            <div class="card-header">
                <i class="fa fa-table"></i> New Project</div>
            <div class="card-bodyalign-content-center">
                <div class="col-sm-12">
                    <form action="{{ route('project.update',['id'=>$project[0]->project_id]) }}" autocomplete="off" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Project Name:</label>
                            <input class="form-control" value="{{ $project[0]->project_name }}" type="text" name="project_name" id="name" required autofocus>
                            @if($errors->has('project_name') )
                                <span class="text-danger">{{ $errors->first('project_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" value="{{ $project[0]->project_description }}" type="text" name="project_description" id="description" required>
                            @if($errors->has('project_description') )
                                <span class="text-danger">{{ $errors->first('project_description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category">Department:</label>
                            <select name="project_category" id="category" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
                                @if('constituencies')
                                    @foreach($departments as $department)
                                        <option value="{{ $department->department_name }}">{{ $department->department_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->has('category') )
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="constituency">Constituency:</label>
                            <select name="project_constituency" id="constituency" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
                                @if('constituencies')
                                    @foreach($constituencies as $constituency)
                                        <option value="{{ $constituency->constituency_id }}">{{ $constituency->constituency_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->has('constituency') )
                                <span class="text-danger">{{ $errors->first('constituency') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="budget">Budget:</label>
                            <input class="form-control" value="{{ $project[0]->budget }}" placeholder="eg. 65.8 Billion" type="text" name="budget" id="budget" required>
                            @if($errors->has('budget') )
                                <span class="text-danger">{{ $errors->first('budget') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="completion">Completion (%):</label>
                            <input class="form-control" value="{{ $project[0]->completion }}" type="number" min="0" max="100" name="completion" id="completion" required>
                            @if($errors->has('completion') )
                                <span class="text-danger">{{ $errors->first('completion') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="contractor">Contractor:</label>
                            <select name="contractor" id="contractor" class="form-control" required>
                                @if('contractors')
                                    @foreach($contractors as $contractor)
                                        <option value="{{ $contractor->first_name." ".$contractor->last_name }}">{{ $contractor->first_name." ".$contractor->last_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->has('contractor') )
                                <span class="text-danger">{{ $errors->first('contractor') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ward">Ward:</label>
                            <select name="project_ward" id="ward" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                            </select>
                            @if($errors->has('ward') )
                                <span class="text-danger">{{ $errors->first('ward') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date:</label>
                            <input class="form-control" value="{{ $project[0]->due_date }}" type="date" name="due_date" id="due_date" required>
                            @if($errors->has('due-date') )
                                <span class="text-danger">{{ $errors->first('due-date') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="added_by">Added By:</label>
                            <input class="form-control" value="Admin" type="text" name="added_by" id="added_by" readonly>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="dubmit" value="UPDATE" class="col-md-4 btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    <!-- /.container-fluid-->
@endsection
@section('customScripts')
    <script>
        let wardList = $('#ward');
        $("#constituency").change(function () {
            let id = document.getElementById('constituency').value;
            wardList.empty();
            $.ajax({
                'url': "/api/constituencies/"+id+"/wards",
                'method': "GET",
                'dataType': 'json',
                success: function (data) {
                    wardList.append("<option disabled selected value> -- select an option -- </option>");
                    for (let i = 0; i < data.length;i++ ){
                        wardList.append("<option value='"+ data[i].ward_name +"'>"+data[i].ward_name+"</option>");
                    }
                },
                error: function (error) {
                    alert("An error occured. Cound not fetch wards");
                    console.log(error)
                }
            })
        })
    </script>
@endsection
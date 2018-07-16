@extends('admin.master')
@section('content')
        <!-- Message Card-->
        @if('message')
            @if($message == "success")
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Saved Successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif($message == "error")
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>Ooops!</strong> Could not Save Item
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif($message = "")
                <div class="alert alert-danger alert-dismissible show" role="alert">
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
                <i class="fa fa-table"></i> New Project</div>
            <div class="card-bodyalign-content-center">
                <div class="col-sm-12">
                    <form action="{{ route('project.save') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Project Name:</label>
                            <input class="form-control" type="text" name="name" id="name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" type="text" name="description" id="description" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Department:</label>
                            <select name="category" id="category" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
                                @if('departments')
                                    @foreach($departments as $department)
                                        <option value="{{ $department->department_name }}">{{ $department->department_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="constituency">Constituency:</label>
                            <select name="constituency" id="constituency" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
                                @if('constituencies')
                                    @foreach($constituencies as $constituency)
                                        <option value="{{ $constituency->constituency_id }}">{{ $constituency->constituency_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="budget">Budget:</label>
                            <input class="form-control" placeholder="eg. 65.8 Billion" type="text" name="budget" id="budget" required>
                        </div>
                        <div class="form-group">
                            <label for="completion">Completion (%):</label>
                            <input class="form-control" type="number" min="0" max="100" name="completion" id="completion" required>
                        </div>
                        <div class="form-group">
                            <label for="contractor">Contractor:</label>
                            <select name="contractor" id="contractor" class="form-control" required>
                                <option disabled selected value> -- select an contractor -- </option>
                                @if('contractors')
                                    @foreach($contractors as $contractor)
                                        <option value="{{ $contractor->first_name." ".$contractor->last_name }}">{{ $contractor->first_name." ".$contractor->last_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ward">Ward:</label>
                            <select name="ward" id="ward" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                @foreach($wards as $ward)
                                    <option value="{{ $ward->ward_name }}">{{ $ward->ward_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date:</label>
                            <input class="form-control" type="date" name="due_date" id="due_date" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Photos:</label>
                            <input class="form-control" type="file" name="file[]" id="photos" multiple required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="dubmit" value="SAVE" class="col-md-4 btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Your Website 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
@section('customScripts')
    <script>
        $("#constituency").change(function () {
            let id = document.getElementById('constituency').value;
            $.ajax({
                'url':"http://127.0.0.1:8000/"+id+"/constituencies/1/wards",
                'method': "GET",
                'dataType': 'json',
                success: function (data) {
                    alert(data);
                    for (let i = 0; i < data.length;i++ ){
                        alert(i)
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
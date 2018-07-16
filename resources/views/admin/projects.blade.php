@extends('admin.master')
@section('content')
    @include('admin.cards')

    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Deleted Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ooops!</strong> Could Not Delete
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
        <div class="text-white">
            <a class="btn btn-primary" href="{{ route('project.create') }}">
                <i class="fa fa-plus"></i>
                Add New Project
            </a>
            <button class="btn btn-warning" id="ongoingButton">
                <i class="fa fa-clock-o"></i>
                Ongoing Projects
            </button>
            <button class="btn btn-success" id="completedButton">
                <i class="fa fa-check"></i>
                Completed Projects
            </button>
        </div>
        <p></p>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Projects Table</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Department</th>
                            <th>Constituency</th>
                            <th>Budget</th>
                            <th>Completion</th>
                            <th>Due Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        @if('projects')
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->project_id }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->project_description }}</td>
                                    <td>{{ $project->project_category }}</td>
                                    <td>{{ $project->constituency_name }}</td>
                                    <td>{{ $project->budget }}</td>
                                    <td>{{ $project->completion }}</td>
                                    <td>{{ $project->due_date }}</td>
                                    <td>
                                        <a href="{{ route('project.edit',['id'=>$project->project_id]) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('project.delete',['id'=>$project->project_id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    <!-- ongoing Modal-->
    <div class="modal fade" id="ongoingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Progress</th>
                            <th>Due Date</th>
                        </tr>
                        </thead>
                        <tbody id="tableBody">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('customScripts')
    <script>
        let modalBody = $('#ongoingModal').find('#modalBody').find('#tableBody');
        $('#ongoingButton').on('click', function () {
            modalBody.empty();
           $.ajax({
              url: 'http://127.0.0.1:8000/api/projects/ongoing',
              method: 'GET',
              dataType: 'json',
              success: function (data) {
                  for (let i=0; i<data.length;i++){
                      modalBody.append('<tr> <td>'+data[i].project_name+'</td> <td>'
                          +data[i].completion+'%</td> <td>'+data[i].due_date+'</td> </tr>')
                  }
                  $('#exampleModalLabel').html('Ongoing Projects');
                  $('#ongoingModal').modal('show');
              },
               error: function (err) {
                   alert('Error! Unable to fetch projects')
               }
           });
        });

        $('#completedButton').on('click', function () {
            modalBody.empty();
            $.ajax({
                url: 'http://127.0.0.1:8000/api/projects/completed',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    for (let i=0; i<data.length;i++){
                        modalBody.append('<tr> <td>'+data[i].project_name+'</td> <td>'
                            +data[i].completion+'%</td> <td>'+data[i].due_date+'</td> </tr>')
                    }
                    $('#exampleModalLabel').html('Completed Projects');
                    $('#ongoingModal').modal('show');
                },
                error: function (err) {
                    alert('Error! Unable to fetch projects')
                }
            });
        });
    </script>
@endsection
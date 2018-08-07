@extends('admin.master')
@section('content')
    @include('admin.cards')

        <div class="text-white">
            <a class="btn btn-primary" href="{{ route('constituency.create') }}">
                <i class="fa fa-plus"></i>
                Add New Constituency
            </a>
        </div>
    <p></p>
    <!-- Message Card-->
    @if('message')
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Deleted successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Unable to Delete
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Constituencies Table</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Wards</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @if('users')
                        <tbody>
                        @foreach($constituencies as $constituency)
                            <tr>
                                <td>{{ $constituency->constituency_name }}</td>
                                <td><button class="btn btn-success" id="val" onclick="showDialog({{ $constituency->constituency_id }})">View Wards</button></td>
                                <td><a href="{{ route('constituency.edit',['id'=>$constituency->constituency_id]) }}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="{{ route('constituency.delete',['id'=>$constituency->constituency_id]) }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
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

    <!-- Wards Modal-->
    <div class="modal fade" id="wardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Wards</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">

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
        function showDialog(id){
            let mBody = $("#wardModal").find("#modalBody");
            $.ajax({
                method: "GET",
                url: "http://127.0.0.1:8000/api/constituencies/"+id+"/wards",
                success: function (data) {
                    mBody.empty();
                    for (let i = 0; i < data.length; i++) {
                        mBody.append("<p>"+data[i].ward_name+"</p>");
                    }
                    $("#wardModal").modal('show');
                },
                error: function (error) {
                    alert("Error");
                    console.log(error)
                }
            });
        }
    </script>
@endsection
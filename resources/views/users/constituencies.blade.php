@extends('users.master')
@section('content')
    <p></p>
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
                    </tr>
                    </thead>
                    @if('users')
                        <tbody>
                        @foreach($constituencies as $constituency)
                            <tr>
                                <td>{{ $constituency->constituency_name }}</td>
                                <td><button class="btn btn-success" id="val" onclick="showDialog({{ $constituency->constituency_id }})">View Wards</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
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
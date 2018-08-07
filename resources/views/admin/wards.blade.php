@extends('admin.master')
@section('content')
    @include('admin.cards')

    <div class="text-white">
        <a class="btn btn-primary" href="{{ route('ward.create') }}">
            <i class="fa fa-plus"></i>
            Add New  Ward
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
            <i class="fa fa-table"></i> Wards Table</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @if('users')
                        <tbody>
                        @foreach($wards as $ward)
                            <tr>
                                <td>{{ $ward->ward_name }}</td>
                                <td><a href="{{ route('ward.edit',['id'=>$ward->ward_id]) }}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="{{ route('ward.delete',['id'=>$ward->ward_id]) }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
                {{ $wards->links() }}
            </div>
        </div>
    </div>
@endsection

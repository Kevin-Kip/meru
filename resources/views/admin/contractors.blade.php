@extends('admin.master')
@section('content')

    @include('admin.cards')

    @if(session()->has('message'))
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Verified Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ooops!</strong> Could Not Verify
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif

    <div class="text-white">
        <a class="btn btn-primary" href="{{ route('user.create') }}">
            <i class="fa fa-plus"></i>
            Add New User
        </a>
    </div>
    <p></p>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Contractor Table</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    @if('users')
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->first_name ." ".$user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->verified == 0)
                                        <form method="post" action="{{ route('contractor.verify',['id'=>$user->contractor_id]) }}">
                                            {{ csrf_field() }}
                                            <input type="submit" value="VERIFY" class="btn btn-primary">
                                        </form>
                                    @elseif($user->verified == 1)
                                        <button class="btn btn-success" disabled>VERIFIED</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
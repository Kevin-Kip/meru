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
            @endif
        @endif
        <!-- Example DataTables Card-->
        <div class="card mb-3 col-md-10">
            <div class="card-header">
                <i class="fa fa-table"></i> New User</div>
            <div class="card-bodyalign-content-center">
                <div class="col-sm-12">
                    <form action="{{ route('user.save') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" required autofocus>
                            @if($errors->has('first_name') )
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" required>
                            @if($errors->has('last_name') )
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                            @if($errors->has('email') )
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input class="form-control" type="text" name="phone" id="phone" required>
                            @if($errors->has('phone') )
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password') )
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="constituency">Constituency</label>
                            <select name="constituency" id="constituency" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
                                @foreach($constituencies as $constituency)
                                    <option value="{{ $constituency->constituency_name }}">{{ $constituency->constituency_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('constituency') )
                                <span class="text-danger">{{ $errors->first('constituency') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" id="role" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Admin">Admin</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Contractor">Contractor</option>
                                <option value="Procurement Manager">Procurement Manager</option>
                                <option value="Procurement Officer">Procurement Officer</option>
                                <option value="Finance Officer">Finance Officer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="dubmit" value="SAVE" class="col-md-4 btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
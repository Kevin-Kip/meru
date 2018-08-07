<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('projects.home') }}">Go Home</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    </div>
</nav>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="post" action="{{ route('user.signin') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" required placeholder="Enter email" autocomplete="false">
                    @if($errors->has('email') )
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" required placeholder="Password" autocomplete="false">
                    @if($errors->has('password') )
                        <span class="text-danger">{{ $errors->first('password') }}</span>
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
                    @if(session()->has('role_error') )
                        <span class="text-danger">{{ session()->get('role_error') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="text-center">
                {{--<a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>--}}
                {{--TODO add password reset--}}
            </div>
        </div>
    </div>
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ asset('admin/js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{ asset('admin/js/sb-admin-charts.js')}}"></script>
</body>

</html>

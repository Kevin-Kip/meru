<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Create New Project</title>
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
    <a class="navbar-brand" href="{{ route('admin.home') }}">Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Projects">
                <a class="nav-link" href="{{ route('admin.projects') }}">
                    <i class="fa fa-fw fa-tasks"></i>
                    <span class="nav-link-text">Projects</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="People">
                <a class="nav-link" href="{{ route('users.all') }}">
                    <i class="fa fa-fw fa-user-o"></i>
                    <span class="nav-link-text">People</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="{{ route('messages.all') }}">
                    <i class="fa fa-fw fa-envelope-o"></i>
                    <span class="nav-link-text">Messages</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="{{ route('constituencies.all') }}">
                    <i class="fa fa-fw fa-envelope-o"></i>
                    <span class="nav-link-text">Constituencies</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
                    <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">New Messages:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>David Miller</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>Jane Smith</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>John Doe</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all messages</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for...">
                        <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
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
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                @if('constituencies')
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
</div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Meru @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://webthemez.com" />
    <!-- css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/materialize/css/materialize.min.css')}}" media="screen,projection" />
    <link href="{{ asset('home/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('home/css/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
    <link href="{{ asset('home/css/flexslider.css')}}" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css')}}" rel="stylesheet" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper" class="home-page">
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="icon-info-blocks material-icons"></i>Meru</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class=@yield('isHome')><a class="waves-effect waves-dark" href="{{ url('/') }}">Home</a></li>
                        <li class=@yield('isProjects')><a class="waves-effect waves-dark" href="{{ url('projects') }}">All Projects</a></li>
                        <li class="dropdown @yield('isConstituency')">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle waves-effect waves-dark">Constituencies<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach($constituencies as $constituency)
                                    <li><a class="waves-effect waves-dark" href="{{ route('projects.constituency',['id'=>$constituency->id]) }}">{{ $constituency->constituency_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown @yield('isCategory')">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle waves-effect waves-dark">Departments<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach($departments as $department)
                                    <li><a class="waves-effect waves-dark" href="{{ route('projects.category',['id'=>$department->id]) }}">{{ $department->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li  class=@yield('isContact')><a class="waves-effect waves-dark" href="{{ url('/contact') }}">Contact</a></li>
                        <li><a class="waves-effect waves-dark" href="{{ url('/auth/login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    @yield('content')


<footer>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; Copyright 2017 All right reserved.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<a href="#" class="scrollup waves-effect waves-dark"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('materialize/js/materialize.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox.pack.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox-media.js')}}"></script>
<script src="{{ asset('js/jquery.flexslider.js')}}"></script>
<script src="{{ asset('js/animate.js')}}"></script>
<!-- Vendor Scripts -->
<script src="{{ asset('js/modernizr.custom.js')}}"></script>
<script src="{{ asset('js/jquery.isotope.min.js')}}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/animate.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
</body>
</html>
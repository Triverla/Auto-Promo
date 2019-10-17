<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Staff-Promotion System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/skin-blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand"><img src="/logo.png" width="30" height="30"/></a>

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{url('staff/dashboard')}}">Home<span class="sr-only">(current)</span></a></li>
                        @if (!Auth::guest())
                        <li><a href="{{url('staff/profile')}}">Profile</a></li>
                            <li><a href="{{url('aper/apply')}}">Apply</a></li>
                        <li><a href="{{url('aper/details')}}">Application Details</a></li>
                        <li><a href="{{url('aper/feedback')}}">Feedback</a></li>
                       @if(auth()->user()->isAdmin == 1)
                        <li><a href="{{url('aper/hod/forms')}}">HOD</a></li>
                        <li><a href="{{url('aper/faculty/forms')}}">Faculty</a></li>
                        <li><a href="{{url('aper/complex/forms')}}">Complex</a></li>
                        <li><a href="{{url('evaluated-forms')}}">E-F</a></li>
                        @endif

                    </ul>
                    @endif
                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Tasks Menu -->
                        @if (Auth::guest())
                        <li><a href="{{route('login')}}" >Login</a></li>
                        <li><a href="{{route('register')}}" >Register</a></li>
                            @else
                            <li class="user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="/passports/{{auth()->user()->passport}}" class="user-image" alt="User Image">
                                    <span class="hidden-xs"></span>
                                </a>
                           <li>
                            <li><a><i class="fa fa-user"></i> <b>{{auth()->user()->sid}}</b></a></li>
                                <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @endif
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">

              @yield('breadcrumb')
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
@include('layouts.footer')
</div>
<!-- ./wrapper -->
<script>
    var BASE_URL = "{{ url('/') }}";
    var REQUEST_URL = "<?=Request::url()?>";
    var CSRF = "{{ csrf_token() }}";

    let dropdown = document.getElementById('states');
    dropdown.length = 0;

    let defaultOption = document.createElement('option');
    defaultOption.text = 'Choose State';

    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;

    const url = BASE_URL + '/states.json';

    fetch(url).then(function (response){
        if (response.status !== 200){
            console.warn('Looks like there was a problem. Status code: ' + response.status);
            return;
        }

        response.json().then(function (data) {
            let option;

            for(let i = 0; i < data.length; i++){
                option = document.createElement('option');
                option.text = data[i].state.name;
                option.value = data[i].state.name;
                dropdown.add(option);
            }
        });
    }).catch(function (err) {
        console.error('Fetch Error - ', err);
    });
</script>
<!-- jQuery 2.2.3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/promotion.js') }}"></script>
@yield('js')
</body>
</html>

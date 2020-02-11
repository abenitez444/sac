<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/now-ui-dashboard.css?v=1.0.1')}}" rel="stylesheet" />
    <!-- custom styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body class="full-height">
    <div id="app" class="wrapper" class="full-height">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                   Nombre
                </a>
            </div>
            @include('layouts.sidebar')
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                @include('layouts.navbar')
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">@yield('card-title')</h5>
                                <p class="category">@yield('card-subtitle')</p>
                            </div>
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                        @include('layouts.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('/js/core/jquery.min.js')}}"></script>
<script src="{{asset('/js/core/popper.min.js')}}"></script>
<script src="{{asset('/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Chart JS -->
<script src="{{asset('/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('/js/now-ui-dashboard.js')}}?v=1.0.1"></script>
<script src="{{asset('/js/function.js')}}"></script>
</html>
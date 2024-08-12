@php
    $desa = App\Desa::find(1);
@endphp
<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <!-- SEO Management-->
    <meta name="author" content="Maulana Kevin Pradana">
    <meta name="keywords" content="desa arjasa,arjasa jember,arjasa,desa,desa.id,arjasa arjasa jember,desa di kecamatan arjasa jember,desa arjasa jember,daerah arjasa,website desa arjasa, web desa arjasa, website arjasa, web arjasa">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link href="{{ asset(Storage::url($desa->logo)) }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet">

    @yield('styles')
</head>

<body class="bg-default">
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="{{ url('') }}">
                    <h2 class="h1 text-white"><b>BANSOS DESA {{ $desa->nama_desa }}</b></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="{{ url('') }}">
                                    <h3 class="h1 text-primary"><b>Desa {{ $desa->nama_desa }}</b></h3>
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar-collapse-main" aria-controls="sidenav-main"
                                    aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar items -->
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars"></i> <span class="nav-link-inner--text">Menu Admin</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right py-0 overflow-hidden">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-fw fa-tachometer-alt text-blue"></i> Dashboard
                                    </a>
                                    <hr class="m-0">
                                    <a class="dropdown-item" href="{{ route('keluar') }}" onclick="event.preventDefault(); document.getElementById('form-keluar').submit();">
                                        <i class="fas fa-fw fa-sign-out-alt"></i> Keluar
                                    </a>
                                    <form id="form-keluar" action="{{ route('keluar') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            @yield('header')
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            @yield('content')
        </div>
        <footer class="py-5">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            © {{ date('Y') }} <a href="{{ url('') }}" class="font-weight-bold ml-1"
                                target="_blank">Desa {{ $desa->nama_desa }}</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!--   Core   -->
    <script src="{{ url('/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!--   Optional JS   -->

    <!--   Argon JS   -->
    <script src="{{ url('/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        const baseURL = $('meta[name="base-url"]').attr('content');
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
    @stack('scripts')
</body>

</html>

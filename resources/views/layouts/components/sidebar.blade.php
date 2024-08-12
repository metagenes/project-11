<div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
        aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="text-center pt-0" href=#>
        <h1 class="text-primary font-weight-900 text-uppercase">Desa {{ $desa->nama_desa }}</h1>
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="{{ asset(Storage::url(auth()->user()->foto_profil)) }}" src="{{ asset(Storage::url(auth()->user()->foto_profil)) }}">
                    </span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <a href="{{ route('profil') }}"  class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>Profil Saya</span>
                </a>
                <a href="{{ route('pengaturan') }}"  class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Pengaturan</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('keluar') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <a href="#">
                        <h1 class="text-primary"><b>Desa {{ $desa->nama_desa }}</b></h1>
                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse"
                        data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                        aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Form -->
        @yield('form-search-mobile')
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt text-blue"></i>
                    <span class="nav-link-inner--text">Dashboard</span>
                </a>
            </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'dtksd' || Request::segment(1) == 'tambah-dtksd') active @endif" href="{{ route('dtksd.index') }}">
                    <i class="fas fa-users text-info"></i>
                    <span class="nav-link-inner--text">Kelola DTKS</span>
                </a>
            </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'bpnt' || Request::segment(1) == 'tambah-bpnt') active @endif" href="{{ route('bpnt.index') }}">
                    <i class="fas fa-id-card text-red"></i>
                    <span class="nav-link-inner--text">Kelola BPNT</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'kisehat' || Request::segment(1) == 'tambah-kisehat') active @endif" href="{{ route('kisehat.index') }}">
                    <i class="fas fa-id-card text-yellow"></i>
                    <span class="nav-link-inner--text">Kelola KIS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'kip' || Request::segment(1) == 'tambah-kip') active @endif" href="{{ route('kip.index') }}">
                    <i class="fas fa-id-card text-green"></i>
                    <span class="nav-link-inner--text">Kelola KIP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'pkh' || Request::segment(1) == 'tambah-pkh') active @endif" href="{{ route('pkh.index') }}">
                    <i class="fas fa-id-card text-blue"></i>
                    <span class="nav-link-inner--text">Kelola PKH</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'bpjs-mandiri' || Request::segment(1) == 'tambah-bpjs-mandiri') active @endif" href="{{ route('bpjs-mandiri.index') }}">
                    <i class="fas fa-id-card text-orange"></i>
                    <span class="nav-link-inner--text">Kelola BPJS Mandiri</span>
                </a>
            </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'profil-desa') active @endif" href="{{ route('profil-desa') }}">
                    <i class="fas fa-users text-info"></i>
                    <span class="nav-link-inner--text">Profil Desa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'profil' || Request::segment(1) == 'pengaturan') active @endif" href="{{ route('profil') }}">
                    <i class="ni ni-single-02 text-yellow"></i>
                    <span class="nav-link-inner--text">Profil Saya</span>
                </a>
            </li>
        </ul>
    </div>
</div>

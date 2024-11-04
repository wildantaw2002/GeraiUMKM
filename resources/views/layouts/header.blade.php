<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" type="image/png">
    {{-- <link href="{{ asset('assets/img/favicon.png') }}" rel="POS UMKM"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Bootstrap 5 CSS -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

     {{-- @vite('resources/css/app.css') --}}
    <title>Post UMKM</title>
    <style>
        .card {
            min-height: 2px;
            /* Sesuaikan sesuai kebutuhan */
        }
    </style>
    <script>

    </script>
</head>

<body>

    <!-- Start Header/Navigation -->
   <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-biru-gelap shadow-lg"
    arial-label="Furni navigation bar" style="background: linear-gradient(to right, #0DBDE5, #2DB08B)">

    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" width="60">
        </a>
        <a class="navbar-brand" href="index.html">Pos<span>UMKM</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                </li>
                {{-- EVENT --}}
                <li class="nav-item {{ request()->routeIs('event') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('event') }}">Artikel</a>
                </li>
                {{-- PROJECT --}}
                {{-- UMKM --}}
                <li class="nav-item {{ request()->routeIs('umkm.index.beranda') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('umkm.index.beranda') }}">UMKM</a>
                </li>
                @if (Auth::check() && Auth::user()->role === 'mahasiswa')
                    <li class="nav-item {{ request()->routeIs('mahasiswa.pekerjaan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('mahasiswa.pekerjaan') }}">Project</a>
                    </li>
                    {{-- CHAT --}}
                    <li class="nav-item {{ request()->routeIs('mahasiswa.chat') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('mahasiswa.chat') }}">Chat</a>
                    </li>
                    {{-- PROFILE --}}
                    <li class="nav-item {{ request()->routeIs('mahasiswa.profile') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('mahasiswa.profile') }}">Profile</a>
                    </li>
                @endif

            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @if (Auth::check())
                    <!-- Jika user sudah login -->
                    <li><a class="nav-link" href="#"><img src="{{ asset('images/user.svg') }}"></a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary me-2">Logout</button>
                        </form>
                    </li>
                @else
                    <!-- Jika user belum login -->
                    <li><a class="nav-link" href="{{ route('login') }}"><img
                                src="{{ asset('images/user.svg') }}"></a></li>
                    <li><a class="btn btn-secondary me-2" href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>

</nav>

    <!-- End Header/Navigation -->

    @yield('content')

</body>

</html>

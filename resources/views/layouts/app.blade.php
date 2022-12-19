<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="{{ asset('js/global.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('JS')
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light shadow vh-100" style="width: 280px; ">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <img src="https://cdn-icons-png.flaticon.com/512/3141/3141991.png" width="48" alt="" />
                </svg>
                <span class="fs-4">Prestamos</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link link-dark " aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><i class="bi bi-house"></i></svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('prestamos.index') }}" class="nav-link link-dark">
                        <svg class="bi pe-none me-2" width="16" height="16"><i class="bi bi-bank"></i></svg>
                        Prestamos
                    </a>
                </li>
                <li>
                    <a href="{{ route('pagos.index') }}" class="nav-link link-dark">
                        <svg class="bi pe-none me-2" width="16" height="16"><i class="bi bi-coin"></i></svg>
                        Pagos
                    </a>
                </li>
                <li>
                    <a href="{{ route('clientes.index') }}" class="nav-link link-dark">
                        <svg class="bi pe-none me-2" width="16" height="16"><i class="bi bi-people"></i></svg>
                        Clientes
                    </a>
                </li>
                <li>
                    <a href="{{ route('reportes') }}" class="nav-link link-dark">
                        <svg class="bi pe-none me-2" width="16" height="16"><i
                                class="bi bi-file-earmark-text"></i></svg>
                        Reportes
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://i.pinimg.com/564x/8f/b1/4e/8fb14e64130f949b48d22d8809ad7d49.jpg" alt=""
                        class="rounded-circle me-2" width="32" height="32">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('signout') }}">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div class="container ">
            <div class="container  bg-white rounded shadow">
                <div class="row aling-items-stretch">
                    <div class="bg-white p-3 rounded-end">
                        <div class="text-end">
                            <img src="https://cdn-icons-png.flaticon.com/512/3141/3141991.png" width="48" alt="">
                        </div>

                        @if (Session::has('message'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

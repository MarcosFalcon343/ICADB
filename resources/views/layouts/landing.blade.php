<!DOCTYPE html>
<html lang="es" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICADB - @yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <style>
        /* Estilos generales para los enlaces de navegación y elementos del menú desplegable */
        .nav-link,
        .dropdown-item {
            color: #adb5bd;
            /* Color gris claro por defecto */
            transition: color 0.3s ease;
            /* Suaviza la transición de color */
        }

        .nav-link:hover,
        .dropdown-item:hover,
        .navbar-dark .dropdown-toggle:hover,
        .navbar-dark .dropdown-toggle:focus {
            color: #f8f9fa;
            /* Blanco al hacer hover o estar enfocado */
            background-color: transparent;
            /* Evita color de fondo azul */
        }

        /* Estilos para el enlace activo */
        .navbar-dark .nav-link.active,
        .navbar-dark .dropdown-item.active {
            color: #ffffff;
            /* Color amarillo para el enlace activo */
        }

        .nav-link.active {
            font-weight: bold;
            /* Resalta el enlace activo */
        }

        /* Estilos para el menú desplegable */
        .dropdown-menu {
            background-color: #343a40;
            /* Fondo oscuro para el menú desplegable */
            border: none;
            /* Sin bordes */
        }

        .nav-item .dropdown-menu .dropdown-item {
            padding-left: 1.5rem;
            /* Espaciado interno en los elementos del menú */
        }

        /* Estilos para el enfoque y el hover de los elementos del menú desplegable */
        .dropdown-item:focus,
        .dropdown-item:hover {
            background-color: #495057;
            /* Fondo más oscuro al hacer hover o foco */
            color: #f8f9fa;
            /* Blanco para el texto */
        }

        /* Estilos para los elementos activos del menú desplegable */
        .dropdown-item.active {
            background-color: #343a40;
            /* Fondo oscuro para el elemento activo */
            color: #ffc107;
            /* Texto en amarillo para el elemento activo */
        }

        /* Estilos para el fondo oscuro del navbar */
        .bg-dark {
            background-color: #212529 !important;
            /* Color de fondo más oscuro */
        }
    </style>
</head>

<body>
    <nav class="p-3 mb-3 border-bottom sticky-top bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                    <img src="{{asset('assets/img/logo.png') }}" alt="logo.png" class="img-fluid"
                        style="width: 80px; height: auto; margin-right: 10px">
                </a>

                <ul class="nav col-12 col-lg-auto mb-2 justify-content-center mb-md-0 navbar-dark">
                    <li><a href="{{ route('index') }}"
                            class="nav-link px-2 {{ Route::is('index') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('events.index') }}"
                            class="nav-link px-2 {{ Request::is('events*') ? 'active' : '' }}">Events</a></li>
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'employee')
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link px-2 dropdown-toggle {{ Request::is('catalogs*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Catalogs
                            </a>
                            <ul class="dropdown-menu  text-small">
                                @if (Auth::user()->role == 'admin')
                                    <li><a class="dropdown-item {{ Route::is('customers.index') ? 'active' : '' }}"
                                            href="{{ route('customers.index') }}">Customer</a></li>
                                    <li><a class="dropdown-item" href="{{route('employees.index')}}">Employee</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{route('facilities.index')}}">Facility</a></li>
                                <li><a class="dropdown-item" href="{{route('locations.index')}}">Location</a></li>
                                <li><a class="dropdown-item" href="{{route('resources.index')}}">Resource</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <div class="dropdown">
                    <a href="#" class="d-block text-decoration-none dropdown-toggle text-white"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-size: 2rem"></i>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Exit</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        @yield('content')
    </main>
</body>

</html>
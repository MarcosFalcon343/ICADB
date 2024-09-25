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
</head>

<body>
    <nav class="p-3 mb-3 border-bottom bg-dark sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="{{asset('assets/img/logo.png') }}" alt="logo.png" class="img-fluid"
                        style="width: 80px; height: auto; margin-right: 10px">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('index') }}"
                            class="nav-link px-2 {{ Request::is('/') ? 'link-secondary' : 'link-body-emphasis' }}">Home</a>
                    </li>
                    <li><a href="{{ route('events') }}"
                            class="nav-link px-2 {{ Request::is('events') ? 'link-secondary' : 'link-body-emphasis' }}">Events</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#"
                            class="nav-link px-2 dropdown-toggle {{ Request::is('catalogs*') ? 'link-secondary' : 'link-body-emphasis' }}"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Catalogs
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item {{ Request::is('customers') ? 'link-secondary' : 'link-body-emphasis' }}"
                                    href="{{ route('customers') }}">Customer</a></li>
                            <li><a class="dropdown-item {{ Request::is('employees') ? 'link-secondary' : 'link-body-emphasis' }}"
                                    href="{{ route('employees') }}">Employee</a></li>
                            <li><a class="dropdown-item {{ Request::is('facilities') ? 'link-secondary' : 'link-body-emphasis' }}"
                                    href="{{route('facilities')}}">Facility</a></li>
                            <li><a class="dropdown-item" href="#">Location</a></li>
                            <li><a class="dropdown-item" href="#">Resource</a></li>
                            <li><a class="dropdown-item" href="#">Customer Report</a></li>
                        </ul>
                    </li>
                </ul>


                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-size: 2rem"></i>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Exit</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>

</html>
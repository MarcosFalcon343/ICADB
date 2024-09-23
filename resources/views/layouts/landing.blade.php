<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICADB - @yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
                    <li><a href="{{route('index')}}" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="{{route('customers')}}" class="nav-link px-2 link-body-emphasis">Customers</a></li>
                    <li><a href="{{route('employees')}}" class="nav-link px-2 link-body-emphasis">Employees</a></li>
                    <li><a href="{{route('events')}}" class="nav-link px-2 link-body-emphasis">Events</a></li>
                    <li><a href="{{route('facilities')}}" class="nav-link px-2 link-body-emphasis">Facilities</a></li>
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
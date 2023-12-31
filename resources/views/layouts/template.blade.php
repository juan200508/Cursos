<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Unicons --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body class="bg-light">
    {{-- Nav Bar --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}"
                            aria-current="page" href="{{ route('services.index') }}">
                            Servicios
                        </a>
                    </li>
                    @if (auth()->user()->role_id === 1)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                                href="{{ route('users.index') }}">
                                Usuarios
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role_id === 2)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('inscriptions') ? 'active' : '' }}"
                            href="{{ route('inscriptions') }}">
                            Mis inscripciones
                        </a>
                    </li>
                    @endif
                </ul>
                <li class="nav-item dropdown d-flex mx-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="uil uil-user icon"></i>
                        <strong>{{ auth()->user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu">
                        @if (auth()->user()->role_id === 2)
                            <li>
                                <a class="dropdown-item" href="{{ route('applicant.edit', auth()->user()->id) }}">
                                    Info
                                </a>
                            </li>
                        @endif
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li><button class="dropdown-item" type="submit">Cerrar Sesión</button></li>
                        </form>
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    {{-- End Nav Bar --}}
    @yield('content')

</body>

</html>

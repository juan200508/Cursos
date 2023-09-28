<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    {{-- CSSS LINK --}}
    <link rel="stylesheet" href="{{ asset('css/loginStyle.css') }}">
    <title>Iniciar sesión</title>

</head>

<body>
    {{-- Style animation background --}}
    <div class="area">
        {{-- Items animation --}}
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        {{-- Content body --}}

        {{-- Main center --}}
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!----------------------- Login Container -------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                    <div class="featured-image mb-3">
                        <img src="{{ asset('img/imgLogin.jpg') }}" class="img-fluid" style="width: 350px;">
                    </div>
                </div>
                {{-- Right Box --}}
                <div class="col-md-6 right-box justify-content-center">
                    <div class="row align-items-center">
                        <form class="mt-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="header-text mb-4 text-center">
                                <h1>Iniciar sesión</h1>
                            </div>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control form-control-lg bg-light fs-6"
                                    placeholder="Correo electrónico" name="email">
                            </div>
                            <div class="input-group mb-4">
                                <input type="password" class="form-control form-control-lg bg-light fs-6"
                                    placeholder="Contraseña" name="password">
                            </div>
                            <div class="input-group mb-2 d-flex justify-content-between">
                            </div>

                            {{-- Button login --}}
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-primary w-100 fs-6">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>






</body>

</html>

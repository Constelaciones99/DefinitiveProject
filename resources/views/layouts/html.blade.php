<?php
    use Illuminate\Support\Facades\Session;
    $username = Session::get('username');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
        @include('_partials.style')
</head>
<body>
    <div class="container-fluid" id="pagina-central">
        <div class="row d-flex justify-content-center">

    @include('_partials.nav')

    <div class="col-12 col-xl-6 py-5 my-5 px-sm-3 mx-md-3 px-lg-5 px-xl-5 d-flex justify-content-center">
        @yield('body')
    </div>

    @include('_partials.foot')

        </div>
    </div>
</body>
</html>

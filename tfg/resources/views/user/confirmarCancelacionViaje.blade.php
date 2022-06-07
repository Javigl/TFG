<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cancelar viaje</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <section>
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
            </div>
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="mb-3"><b>Cancelar viaje</b></h1>
                    <p class="text-muted mb-5">Estás a punto de cancelar tu viaje hacia {{$viaje->destination}} de la mano de {{$viaje->user->name}}</p>
                    <p class="text-muted mb-5">Tenga en cuenta que le será reembolsado el importe por su lugar en el viaje, pero no sus carpoints en caso de que
                        usara.
                    </p>
                    <p style="text-align: left">¿Deseas confirmar la cancelación?</p>
                    <form method="POST" action="/cancelarViaje/{{$viaje->id}}">
                        @csrf
                        <button type="submit" class="btn btn-primary width-100">Sí</button>
                        <a href="javascript: history.go(-1)" role="button" class="btn btn-danger width-100">No</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
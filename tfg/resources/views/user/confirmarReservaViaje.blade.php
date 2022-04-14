<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reservar viaje</title>

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
                    <h1 class="mb-3"><b>Unirse a viaje</b></h1>
                    <p class="text-muted mb-5">Estás a punto de unirte a un viaje hacia {{$viaje->destination}} de la mano de {{$viaje->user->name}}</p>
                    <p style="text-align: left">Introduce el número de carpoints que deseas utilizar en caso de que quieras obtener un descuento en tu viaje(1CP=0,5€/desc)</p>
                    <form method="POST" action="/reservarViaje/{{$viaje->id}}">
                        @csrf
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="carpoints"><b>CarPoints</b></label>
                                <input type="number" class="form-control" id="carpoints" name="carpoints" placeholder="Introduce el número de carpoints" min="0" autofocus>
                                @error('carpoints')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        @if (\Session::has('loginError'))
                            <span class="text-danger" role="alert">
                                <strong>{!! \Session::get('loginError') !!}</strong>
                            </span>
                            <br/>
                            <br/>
                        @endif
                        @if (\Session::has('successReserva'))
                            <span class="text-success" role="alert">
                                <strong>{!! \Session::get('successReserva') !!}</strong>
                            </span>
                            <br/>
                            <br/>
                        @endif
                        <button type="submit" class="btn btn-primary width-100">Confirmar reserva</button>
                        <a href="/viajes" role="button" class="btn btn-danger width-100">Volver</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
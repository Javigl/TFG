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
        <?php
            $valorado = App\Models\User::find($valoracion->user2_id);
        ?>
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
            </div>
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="mb-3"><b>Eliminar valoración</b></h1>
                    <p class="text-muted mb-5">Estás a punto de eliminar tu valoración hacia a {{$valorado->name}}.</p>
                    <p class="text-muted mb-5">En caso de cancelar la eliminación, será redirigid@ a su perfil</p>
                    <p style="text-align: left">¿Deseas confirmar la eliminación?</p>
                    <form method="POST" action="/eliminarValoracion/{{$valoracion->id}}">
                        @csrf
                        <button type="submit" class="btn btn-primary width-100">Sí</button>
                        <a href="/perfil/{{Auth::user()->id}}" role="button" class="btn btn-danger width-100">No</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
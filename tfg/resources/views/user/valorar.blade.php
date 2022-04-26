<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Valorar usuario</title>

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
    <link href="{{ asset('css/estrellas.css') }}" rel="stylesheet">
</head>
<body>
    <section>
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
            </div>
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="mb-3"><b>Añadir valoración</b></h1>
                    <p style="text-align: left">Introduce la valoración que deseas darle a {{$user->name}}</p>
                    <form method="POST" action="/valorar/{{$user->id}}">
                        @csrf
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="opinion"><b>Opinión</b></label>
                                <input type="text" class="form-control" id="opinion" name="opinion" placeholder="Introduce tu opinión sobre el usuario" maxlength="100" required autofocus>
                                @error('opinion')
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
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label><b>Puntuación</b></label>
                                <br/>
                                <div class="stars">
                                    <input type="radio" id="cinco" name="rate" value="5">
                                    <label for="cinco"></label>
                                    <input type="radio" id="cuatro" name="rate" value="4">
                                    <label for="cuatro"></label>
                                    <input type="radio" id="tres" name="rate" value="3">
                                    <label for="tres"></label>
                                    <input type="radio" id="dos" name="rate" value="2">
                                    <label for="dos"></label>
                                    <input type="radio" id="uno" name="rate" value="1" autofocus>
                                    <label for="uno"></label>
                                    <span class="result"></span>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary width-100">Enviar valoración</button>
                        <a href="/perfil/{{$user->id}}" role="button" class="btn btn-danger width-100">Volver</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
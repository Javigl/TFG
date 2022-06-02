<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Editar perfil</title>

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
                    <h1 class="mb-3"><b>Editar perfil</b></h1>
                    <p class="text-muted mb-5">Completa aquellos campos que desees modificar</p>
                    <form method="POST" action="/editarPerfil">
                        @csrf
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="name"><b>Nombre</b></label>
                                <input id="name" name="name" type="text" placeholder="Tu nombre" class="form-control" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname"><b>Apellidos</b></label>
                                <input id="lastname" name="lastname" type="text" placeholder="Tus apellidos" class="form-control">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Email</b></label>
                                <input id="email" name="email" type="email" placeholder="Tu nuevo correo electrónico" class="form-control">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password"><b>Password</b></label>
                                <input id="password" name="password" type="password" placeholder="Tu nueva contraseña" class="form-control">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="birthday"><b>Fecha de nacimiento</b></label>
                                <input id="birthday" name="birthday" type="date" placeholder="Fecha del viaje" class="form-control">
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telephone"><b>Teléfono</b></label>
                                <input id="telephone" type="text" placeholder="Tu teléfono" class="form-control" name="telephone">
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        @if (\Session::has('error'))
                            <span class="text-danger" role="alert">
                                <strong>{!! \Session::get('error') !!}</strong>
                            </span>
                            <br/>
                            <br/>
                        @endif
                        <button type="submit" class="btn btn-primary width-100">Confirmar cambios</button>
                        <a href="/perfil/{{Auth::user()->id}}" role="button" class="btn btn-danger width-100">Volver</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

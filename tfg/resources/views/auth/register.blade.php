<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registro</title>

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
                    <h1 class="mb-3"><b>Crea tu cuenta gratis</b></h1>
                    <p class="text-muted mb-5"> Ingresa la siguiente información para registrarte</p>
                    <span class="text-danger"><b>*Campo obligatorio</b></span>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="name"><b>Nombre</b><span class="text-danger">*</span></label>
                                <input id="name" type="text" placeholder="Tu nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname"><b>Apellidos</b><span class="text-danger">*</span></label>
                                <input id="lastname" type="text" placeholder="Tus apellidos" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email"><b>Email</b><span class="text-danger">*</span></label>
                            <input id="email" type="email" placeholder="Tu email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password"><b>Contraseña</b><span class="text-danger">*</span></label>
                            <input id="password" type="password" placeholder="Tu password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password-confirm"><b>Confirmar contraseña</b><span class="text-danger">*</span></label>
                            <input id="password-confirm" placeholder="Confirma tu contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="dni"><b>DNI</b><span class="text-danger">*</span></label>
                                <input id="dni" type="text" placeholder="Tu DNI" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" autocomplete="dni" autofocus>
                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telephone"><b>Teléfono</b><span class="text-danger">*</span></label>
                                <input id="telephone" type="text" placeholder="Tu teléfono" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" autocomplete="telephone" autofocus>
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary width-100">Continuar</button>
                        <a href="/" role="button" class="btn btn-danger width-100">Volver</a>
                        <a href="/login" role="button" class="btn btn-light width-100">Ya tengo cuenta</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

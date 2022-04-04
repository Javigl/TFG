<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Email password</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/emailPassword.css') }}" rel="stylesheet">
</head>
<body>
    <section>
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
            </div>
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="mb-3"><b>Restablecimiento de contraseña</b></h1>
                    <span class="text-danger"><b>*Campo obligatorio</b></span>
                    <br/>
                    <br/>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email"><b>Email</b><span class="text-danger">*</span></label>
                            <input id="email" type="email" placeholder="Tu email" class="form-control @error('email') is-invalid @else is-valid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (session('status'))
                                <span class="valid-feedback" role="alert">
                                    <strong>{{ session('status') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary width-100">Enviar link de restablecimiento de contraseña</button>
                        <a href="/" role="button" class="btn btn-danger width-100">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nuevo viaje</title>

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
                    <h1 class="mb-3"><b>Subir nuevo viaje</b></h1>
                    <p class="text-muted mb-5"> Ingresa la siguiente información para compartir tu viaje</p>
                    <span class="text-danger"><b>*Campo obligatorio</b></span>
                    <form method="POST" action="/nuevoViaje">
                        @csrf
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="origen"><b>Origen</b><span class="text-danger">*</span></label>
                                <input id="origen" name="origen" type="text" placeholder="Origen del viaje" class="form-control" autofocus required>
                                @error('origen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="destination"><b>Destino</b><span class="text-danger">*</span></label>
                                <input id="destination" name="destination" type="text" placeholder="Destino del viaje" class="form-control" required>
                                @error('destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="fecha"><b>Fecha</b><span class="text-danger">*</span></label>
                                <input id="fecha" name="fecha" type="date" placeholder="Fecha del viaje" class="form-control" required>
                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hora"><b>Hora</b><span class="text-danger">*</span></label>
                                <input id="hora" name="hora" type="time" placeholder="Hora del viaje" class="form-control" required>
                                @error('hora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="numAsientos"><b>Número de asientos</b><span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="numAsientos" name="numAsientos" placeholder="Introduce la cantidad a añadir" min="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="precio"><b>Precio/asiento(€)</b><span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" placeholder="Introduce la cantidad a añadir" min="0" required>
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
                        <button type="submit" class="btn btn-primary width-100">Publicar</button>
                        <a href="/misviajes" role="button" class="btn btn-danger width-100">Volver</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

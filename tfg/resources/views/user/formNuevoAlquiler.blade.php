<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nuevo alquiler</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alquiler.css') }}" rel="stylesheet">
</head>
<body>
    <section>
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
            </div>
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="mb-3"><b>Nuevo anuncio de alquiler</b></h1>
                    <p class="text-muted mb-5"> Ingresa la siguiente información de coche y alquiler</p>
                    <span class="text-danger"><b>*Campo obligatorio</b></span>
                    <form method="POST" action="/nuevoAlquiler" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="brand"><b>Marca</b><span class="text-danger">*</span></label>
                                <input id="brand" type="text" placeholder="Marca del coche" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" autocomplete="brand" autofocus required>
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="model"><b>Modelo</b><span class="text-danger">*</span></label>
                                <input id="model" type="text" placeholder="Modelo del coche" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" autocomplete="model" autofocus required>
                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image"><b>Imagen</b><span class="text-danger">*</span></label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept=".png,.jpg,.jpeg" required>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="city"><b>Ciudad</b><span class="text-danger">*</span></label>
                            <input id="city" type="text" placeholder="Ciudad" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus required> 
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="mat"><b>Matrícula</b><span class="text-danger">*</span></label>
                                <input id="mat" type="text" placeholder="Matrícula del coche(1111AAA)" class="form-control @error('mat') is-invalid @enderror" name="mat" value="{{ old('mat') }}" autocomplete="mat" autofocus required>
                                @error('mat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="typeCar"><b>Tipo de coche</b><span class="text-danger">*</span></label>
                                <br>
                                <select style="padding: 12px; width: 410px" name="typeCar" required>
                                    <option value="Familiar" selected>Familiar</option>
                                    <option value="Berlina">Berlina</option>
                                    <option value="Monovolumen">Monovolumen</option>
                                    <option value="Deportivo">Deportivo</option>
                                    <option value="Furgoneta">Furgoneta</option>
                                    <option value="Limusina">Limusina</option>
                                </select>
                                @error('typeCar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="fuel"><b>Tipo de combustible</b><span class="text-danger">*</span></label>
                                <br>
                                <select style="padding: 12px; width: 410px" name="fuel" required>
                                    <option value="Gasolina" selected>Gasolina</option>
                                    <option value="Diésel">Diésel</option>
                                    <option value="Híbrido">Híbrido</option>
                                    <option value="Eléctrico">Eléctrico</option>
                                </select>
                                @error('fuel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="transmision"><b>Transmisión del coche</b><span class="text-danger">*</span></label>
                                <br>
                                <select style="padding: 12px; width: 410px" name="transmision" required>
                                    <option value="Manual" selected>Manual</option>
                                    <option value="Automático">Automático</option>
                                </select>
                                @error('transmision')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="numPlazas"><b>Número de plazas del vehículo</b></label>
                                <input type="number" class="form-control" id="numPlazas" name="numPlazas" placeholder="Introduce el número de plazas del vehículo" min="1" autofocus required>
                                @error('numPlazas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="precio"><b>Precio diario</b></label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" placeholder="Introduce el precio del alquiler" min="0" autofocus required>
                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label for="fechaR"><b>Fecha de recogida</b><span class="text-danger">*</span></label>
                                <input id="fechaR" type="date" placeholder="Fecha de recogida" class="form-control @error('fechaR') is-invalid @enderror" name="fechaR" value="{{ old('fechaR') }}" autocomplete="fechaR" autofocus required>
                                @error('fechaR')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fechaD"><b>Fecha de devolución</b><span class="text-danger">*</span></label>
                                <input id="fechaD" type="date" placeholder="Fecha de devolución" class="form-control @error('fechaD') is-invalid @enderror" name="fechaD" value="{{ old('fechaD') }}" autocomplete="fechaD" autofocus required>
                                @error('fechaD')
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
                        <button type="submit" class="btn btn-primary width-100">Crear alquiler</button>
                        <a href="/misAlquileres" role="button" class="btn btn-danger width-100">Volver</a>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Derechos reservados &copy; Javier García Lillo</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

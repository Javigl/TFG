<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detalles alquiler</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/detallesAlquiler.css') }}" rel="stylesheet">
</head>
<body>
    <div class="card">
        <div class="imgBox">
            <img src="/images/cars/{{$coche->image}}">
        </div>
        <div class="details">
            <div class="title">
                <h3>{{$coche->brand}} {{$coche->model}}<br/>
                    <small>{{$anfitrion->name}} {{$anfitrion->lastname}}</small>
                </h3>
                <br/>
            </div>
            <div class="description">
                <h4>Tipo de coche:</h4>
                <p>{{$coche->carType}}</p>
                <h4>Combustible:</h4>
                <p>{{$coche->fuelType}}</p>
                <h4>Transmisión:</h4>
                <p>{{$coche->transmission}}</p>
                <h4>Número de plazas:</h4>
                <p>{{$coche->places}}</p>
                <br/>
                <br/>
            </div>
            
            <div class="buy">
                <div class="price">
                    <span>{{$precio}}€</span>
                </div>
                @if (is_null($alquiler->user_id))
                    @if (Auth::user()->id == $coche->user_id)
                        <div class="btn">
                            <a href="/eliminarAlquiler/{{$alquiler->id}}">Eliminar alquiler</a>
                        </div>
                    @else
                        <div class="btn">
                            <a href="/reservarAlquiler/{{$alquiler->id}}">Alquilar</a>
                        </div>
                    @endif
                @else
                    @if (Auth::user()->id == $alquiler->user_id)
                        <div class="btn">
                            <a href="/cancelarAlquiler/{{$alquiler->id}}">Cancelar alquiler</a>
                        </div>
                    @else
                        <div class="btn">
                            <a>Alquilado</a>
                        </div>
                    @endif
                @endif                
                @if (Auth::user()->id == $coche->user_id)
                    <div class="btn">
                        <a href="/perfil/{{Auth::user()->id}}">Mi perfil</a>
                    </div>
                @else
                    <div class="btn">
                        <a href="/perfil/{{$coche->user_id}}">Ver perfil</a>
                    </div>
                @endif
                <div class="btn">
                    <a href="javascript: history.go(-1)">Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
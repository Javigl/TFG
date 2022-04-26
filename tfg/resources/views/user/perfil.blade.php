<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="{{ asset('images/perfil.png') }}" alt="img-avatar">
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <?php
                $edad = \Carbon\Carbon::parse($user->birthday)->age;
            ?>
            <div class="perfil-usuario-bio">
                <h3 class="titulo">{{$user->name}} {{$user->lastname}}</h3>
                <p class="text-muted">Usuario de CarSite</p>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i> Dirección de email: {{$user->email}}</li>
                    <li><i class="icono fas fa-phone-alt"></i> Telefono: {{$user->telephone}}</li>
                    <li><i class="icono fas fa-rv"></i> Viajes compartidos: {{$numViajesSubidos}}</li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-calendar-alt"></i> Edad: {{$edad}}</li>
                    <li><i class="icono fas fa-user-check"></i>Registro: {{$user->created_at}}</li>
                    <li><i class="icono fas fa-code"></i> Viajes contratados: {{$numViajesContratados}}</li>
                </ul>
                @if (\Session::has('success'))
                    <p style="color:#06c730b6; font-size: 20px; margin-left:200px"><strong>{!! \Session::get('success') !!}</strong></p>
                    <br/>
                    <br/>
                @endif
                @if (\Session::has('delete'))
                    <p style="color:#ee0c0cb6; font-size: 20px; margin-left:200px"><strong>{!! \Session::get('delete') !!}</strong></p>
                    <br/>
                    <br/>
                @endif
                <div class="center">
                    @if(Auth::user()->id == $user->id)
                        <a href="/misviajes" style="margin: 1.25rem;margin-left: 130px;" role="button" class="btn btn-dark">Mis viajes</a>
                        <a href="#" style="margin: 1.25rem" role="button" class="btn btn-dark">Mis alquileres</a>
                        <a href="/valoraciones/{{Auth::user()->id}}" style="margin: 1.25rem" role="button" class="btn btn-dark">Mis valoraciones</a>
                    @else
                        <a href="/valorar/{{$user->id}}" style="margin: 1.25rem;margin-left: 190px;" role="button" class="btn btn-dark">Dejar valoración</a>
                        <a href="/valoraciones/{{$user->id}}" style="margin: 1.25rem" role="button" class="btn btn-dark">Opiniones del anfitrión</a>
                    @endif
                </div>
            </div>
        </div>

        <a href="/" style="margin: 1.25rem;" role="button" class="btn btn-danger">Volver</a>
    </section>
</body>
</html>
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
                    <li><i class="icono fas fa-calendar-alt"></i> Fecha nacimiento: {{$user->birthday}}</li>
                    <li><i class="icono fas fa-user-check"></i> Registro: {{$user->created_at}}</li>
                    <li><i class="icono fas fa-code"></i> Viajes contratados: {{$numViajesContratados}}</li>
                </ul>
                <div class="center">
                    <a href="/misviajes" style="margin: 1.25rem;margin-left: 220px;" role="button" class="btn btn-dark">Mis viajes</a>
                    <a href="#" style="margin: 1.25rem" role="button" class="btn btn-dark">Mis alquileres</a>
                </div>
            </div>
        </div>

        <a href="/" style="margin: 1.25rem;" role="button" class="btn btn-danger">Volver</a>
    </section>
</body>
</html>
@extends('admin.menuAdmin')
@section('content')
<div class="search valoraciones">
    <form method="GET">
        <input id="param" name="param" type="text" placeholder="Buscar alquiler(ciudad, idCoche, idUsuario)">
        <div class="btnSearch">
            <button type="submit" class="btnsend"><ion-icon name="search-outline"></ion-icon></button>
        </div>
    </form>
</div>
@if (\Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong style="font-size: 25px; margin-left: 500px">{!! \Session::get('success') !!}</strong>
    </div>
@endif
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Alquileres</h2>
            <a href="/administrarAlquileres" class="btn">View All</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td>Ciudad</td>
                    <td>Fecha recogida</td>
                    <td>Fecha devolución</td>
                    <td>Precio</td>
                    <td>Coche(id)</td>
                    <td>Anfitrión(id)</td>
                    <td>Usuario solicitante(id)</td>
                    <td>Eliminar anuncio</td>
                </tr>
            </thead>
            <tbody>
                @foreach($alquileres as $a)
                    <?php
                        $coche = App\Models\Car::find($a->car_id);
                        $anfitrion = App\Models\User::find($coche->user_id);
                        $usuario = App\Models\User::find($a->user_id);
                    ?>
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->city }}</td>
                        <td>{{ $a->pickUpDate }}</td>
                        <td>{{ $a->returnDate }}</td>
                        <td>{{ $a->price }}</td>
                        <td>{{ $coche->brand }} {{$coche->model}}({{ $coche->id }})</td>
                        <td>{{ $anfitrion->name }}({{ $anfitrion->id }})</td>
                        @if (!is_null($usuario))
                            <td>{{ $usuario->name }}({{ $usuario->id }})</td>
                        @else
                            <td>Vehículo NO alquilado</td>
                        @endif
    
                        <td>
                            <a style="text-decoration:none; margin-left: 28px;" href="/eliminarAlquilerAdmin/{{$a->id}}"> 
                                <button class="btn lock" title="Eliminar anuncio"><ion-icon name="close-circle-outline"></ion-icon></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
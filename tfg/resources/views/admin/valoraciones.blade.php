@extends('admin.menuAdmin')
@section('content')
<div class="search valoraciones">
    <form method="GET">
        <input id="param" name="param" type="text" placeholder="Buscar valoracion(id, id valorador, id valorado)">
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
            <h2>Valoraciones</h2>
            <a href="/administrarValoraciones" class="btn">View All</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td>Puntuación</td>
                    <td>Valoración</td>
                    <td>Valorador</td>
                    <td>Valorado</td>
                    <td>Eliminar valoracion</td>
                </tr>
            </thead>
            <tbody>
                @foreach($opiniones as $o)
                    <?php
                        $valorador = App\Models\User::find($o->user1_id);
                        $valorado = App\Models\User::find($o->user2_id);
                    ?>
                    <tr>
                        <td>{{ $o->id }}</td>
                        <td>{{ $o->mark }}</td>
                        <td>{{ $o->opinion }}</td>
                        <td>{{ $valorador->name }}({{ $o->user1_id }})</td>
                        <td>{{ $valorado->name }}({{ $o->user2_id }})</td>
                        <td>
                            <a style="text-decoration:none; margin-left: 28px;" href="/eliminarValoracionAdmin/{{$o->id}}"> 
                                <button class="btn lock" title="Eliminar valoracion"><ion-icon name="close-circle-outline"></ion-icon></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
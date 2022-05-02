@extends('admin.menuAdmin')
@section('content')
<div class="search">
    <form method="GET">
        <input id="param" name="param" type="text" placeholder="Buscar viajes(id, origen, destino, fecha)">
        <div class="btnSearch">
            <button type="submit" class="btnsend"><ion-icon name="search-outline"></ion-icon></button>
        </div>
    </form>
</div>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Viajes</h2>
            <a href="/admin" class="btn">View All</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td>Origen</td>
                    <td>Destino</td>
                    <td>Fecha</td>
                    <td>Huecos</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach($viajes as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->origin }}</td>
                        <td>{{ $v->destination }}</td>
                        <td>{{ $v->date }}</td>
                        <td>{{ $v->places }}</td>
                        <td>
                            <a style="text-decoration:none; margin-left: 28px;" href="/eliminarViaje/{{$v->id}}"> 
                                <button class="btn lock" title="Eliminar viaje"><ion-icon name="lock-closed-outline"></ion-icon></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
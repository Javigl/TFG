@extends('admin.menuAdmin')
@section('content')
<div class="search viajes">
    <form method="GET">
        <input id="param" name="param" type="text" placeholder="Buscar viajes(id, origen, destino, fecha)">
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
            <h2>Viajes</h2>
            <a href="/administrarViajes" class="btn">View All</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td>Origen</td>
                    <td>Destino</td>
                    <td>Fecha</td>
                    <td>Huecos</td>
                    <td>Anfitrion(id)</td>
                    <td>Pasajeros(id's)</td>
                    <td>Eliminar viaje</td>
                </tr>
            </thead>
            <tbody>
                @foreach($viajes as $v)
                    <?php
                        $anfitrion = App\Models\User::find($v->user_id);
                        $pasajeros = App\Models\TravelUser::where('travel_id', '=', $v->id)->get(); 
                    ?>
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->origin }}</td>
                        <td>{{ $v->destination }}</td>
                        <td>{{ $v->date }}</td>
                        <td>{{ $v->places }}</td>
                        <td>{{ $anfitrion->name }} ({{ $anfitrion->id }})</td>
                        <td>
                            @if (sizeof($pasajeros) > 0)
                                @foreach ($pasajeros as $p)
                                    {{ $p->user_id }}
                                @endforeach
                            @else
                                Sin pasajeros
                            @endif
                        </td>
                        <td>
                            <a style="text-decoration:none; margin-left: 28px;" href="/eliminarViajeAdmin/{{$v->id}}"> 
                                <button class="btn lock" title="Eliminar viaje"><ion-icon name="close-circle-outline"></ion-icon></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
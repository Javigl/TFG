@extends('admin.menuAdmin')
@section('content')
<div class="search">
    <form method="GET">
        <input id="param" name="param" type="text" placeholder="Buscar usuario(nombre, id, email)">
        <div class="btnSearch">
            <button type="submit" class="btnsend"><ion-icon name="search-outline"></ion-icon></button>
        </div>
    </form>
</div>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Usuarios</h2>
            <a href="/admin" class="btn">View All</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Email</td>
                    <td>Points</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    @if(!$u->admin)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->lastname }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->points }}</td>
                            <td>
                                @if($u->blocked)
                                    <a style="text-decoration:none; margin-left: 28px;" href="/habilitarUsuario/{{$u->id}}"> 
                                        <button class="btn lock" title="Desbloquear usuario"><ion-icon name="lock-closed-outline"></ion-icon></button>
                                    </a>
                                @else
                                    <a style="text-decoration:none; margin-left: 28px;" href="/bloquearUsuario/{{$u->id}}"> 
                                        <button class="btn unlock" title="Bloquear usuario"><ion-icon name="lock-open-outline"></ion-icon></button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
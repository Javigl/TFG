@extends('user.menuUser')
@section('content')
<section class="travels container">
    @if (\Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 20px">{!! \Session::get('success') !!}</strong>
        </div>
        <br/>
        <br/>
    @endif
    <a href="/nuevoViaje" class="cta">Subir nuevo viaje</a>
    <h2 class="subtitle">VIAJES PUBLICADOS</h2>
    @if(sizeof($viajesSubidos) > 0)
        <div class="price__table">
            @foreach($viajesSubidos as $v)
                <div class="price__element">
                    <p class="price__name"><b>{{ $v->origin }} > {{ $v->destination }}</b></p>
                    <h3 class="price__price">{{ $v->price }}€</h3>

                    <div class="price__items">
                        <p class="price__features">Fecha: {{ $v->date }}/{{ $v->hour }}h</p>
                        <p class="price__features">Huecos disponibles: {{ $v->places }}</p>
                        <p class="price__features">Anfitrión: {{ $v->user->name }}</p>
                    </div>
                    <a href="/eliminarViaje/{{$v->id}}" class="price__cta desunirme">Eliminar viaje</a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 20px; margin-left: 425px">No has publicado viajes todavía</strong>
        </div>
        <br/>
        <br/>
    @endif
    <br/>
    <br/>
    <h2 class="subtitle">VIAJES CONTRATADOS</h2>
    <br/>
    <br/>
    @if(sizeof($viajesContratados) > 0)
        <br/>
        <br/>
        <div class="price__table">
            @foreach($viajesContratados as $v)
                <div class="price__element">
                    <p class="price__name"><b>{{ $v->origin }} > {{ $v->destination }}</b></p>
                    <h3 class="price__price">{{ $v->price }}€</h3>
                    <div class="price__items">
                        <p class="price__features">Fecha: {{ $v->date }}/{{ $v->hour }}h</p>
                        <p class="price__features">Huecos disponibles: {{ $v->places }}</p>
                        <p class="price__features">Anfitrión: {{ $v->user->name }}</p>
                    </div>
                    <a href="/cancelarViaje/{{$v->id}}" class="price__cta desunirme">Desunirme</a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 20px; margin-left: 425px">No has contratado viajes todavía</strong>
        </div>
        <br/>
        <br/>
    @endif
</section>
@endsection
@extends('user.menuUser')
@section('content')
<section class="travels container">
    <h2 class="subtitle">TUS VIAJES</h2>
    <br/>
    <br/>
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
            </div>
        @endforeach
    </div>
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
</section>
@endsection
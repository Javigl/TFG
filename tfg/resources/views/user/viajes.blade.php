@extends('user.menuUser')
@section('content')
<section class="travels container">
    <h2 class="subtitle">Obtén tu viaje ideal</h2>
    <br/>
    <br/>
    <br/>
    <div class="buscar">
        <form method="GET">
            <input type="text" id="origen" name="origen" placeholder="Origen">
            <input type="text" id="destino" name="destino" placeholder="Destino">
            <br/>
            <br/>
            <div class="btnSearch">
                <button type="submit" class="btnsend"><i class="fa fa-search icon"></i></button>
            </div>
        </form>
        <br/>
    </div>
    <br/>
    <br/>
    @if (\Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 20px">{!! \Session::get('success') !!}</strong>
        </div>
        <br/>
        <br/>
    @endif
    <br/>
    <br/>
    <div>
        @if(sizeof($viajes) > 0) 
            <div class="price__table">
                @foreach($viajes as $v)
                <?php
                    $travelUser = App\Models\TravelUser::where('user_id', '=', Auth::user()->id)->where('travel_id','=', $v->id)->first();  
                ?>
                <div class="price__element">
                    <p class="price__name"><b>{{ $v->origin }} > {{ $v->destination }}</b></p>
                    <h3 class="price__price">{{ $v->price }}€</h3>

                    <div class="price__items">
                        <p class="price__features">Fecha: {{ $v->date }}/{{ $v->hour }}h</p>
                        <p class="price__features">Huecos disponibles: {{ $v->places }}</p>
                        <p class="price__features">Anfitrión: {{ $v->user->name }}</p>
                    </div>

                    @if(Auth::user()->id != $v->user_id)
                        @if(!is_null($travelUser))
                            <a href="/cancelarViaje/{{$v->id}}" class="price__cta desunirme">Desunirme</a>
                        @elseif($v->places > 0)
                            <a href="/reservarViaje/{{$v->id}}" class="price__cta free">Unirme</a>
                        @else
                            <a class="price__cta full">Completo</a>
                        @endif
                        <br/>
                        <a href="/perfil/{{$v->id}}" class="price__cta perfilUser">Ver perfil del anfitrión</a>
                    @else
                        <a href="/perfil/{{Auth::user()->id}}" class="price__cta perfilUser">Mi perfil</a>
                    @endif
                </div>
                @endforeach
            </div>
            <br/>
            <br/>
            <div style="text-align: center; font-size: 20px">  
                {!! $viajes->links() !!}
            <div>
        @else
            <div class="alert alert-success" style="text-align: center;" role="alert">
                <strong style="font-size: 20px">No hay resultados para su búsqueda</strong>
            </div>
        @endif
    </div>
</section>
@endsection
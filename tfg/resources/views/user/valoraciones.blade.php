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

    @if(Auth::user()->id == $id)
        <h2 class="subtitle">VALORACIONES REALIZADAS</h2>
        @if(sizeof($valoracionesDadas) > 0)
            <div class="price__table">
                @foreach($valoracionesDadas as $v)
                    <?php
                        $valorado = App\Models\User::find($v->user2_id);
                    ?>
                    <div class="price__element">
                        <h3 class="price__price">{{ $valorado->name }}</h3>

                        <div class="price__items">
                            <p class="price__features">Opinión: {{ $v->opinion }}</p>
                            <p class="price__features">Puntuación: {{ $v->mark }}</p>
                        </div>
                        <a href="/perfil/{{$valorado->id}}" class="price__cta perfilUser">Ver perfil del usuario</a>
                        <br/>
                        <a href="/eliminarValoracion/{{$v->id}}" class="price__cta desunirme">Eliminar valoración</a>
                    </div>
                @endforeach
            </div>
            <br/>
            <br/>
            <br/>
        @else
            <div class="alert alert-success" role="alert">
                <br/>
                <br/>
                <strong style="font-size: 20px; margin-left: 450px">Actualmente sin valoraciones</strong>
            </div>
            <br/>
            <br/>
        @endif
    @endif

    <h2 class="subtitle">VALORACIONES RECIBIDAS</h2>
    @if(sizeof($valoracionesRecibidas) > 0)
        <div class="price__table">
            @foreach($valoracionesRecibidas as $v)
                <?php
                    $valorador = App\Models\User::find($v->user1_id);
                ?>
                <div class="price__element">
                    <h3 class="price__price">{{ $valorador->name }}</h3>
                    <div class="price__items">
                        <p class="price__features">Opinión: {{ $v->opinion}}</p>
                        <p class="price__features">Puntuación: {{ $v->mark }}</p>
                    </div>

                    <a href="/perfil/{{$valorador->id}}" class="price__cta perfilUser">Ver perfil del usuario</a>
                    @if($valorador->id == Auth::user()->id)
                        <br/>
                        <a href="/eliminarValoracion/{{$v->id}}" class="price__cta desunirme">Eliminar valoración</a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <br/>
        <br/>
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 20px; margin-left: 450px">Actualmente sin valoraciones</strong>
        </div>
        <br/>
        <br/>
    @endif
</section>
@endsection
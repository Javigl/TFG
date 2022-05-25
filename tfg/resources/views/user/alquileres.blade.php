@extends('user.menuUser')
@section('content')
<section class="travels container">
    <h2 class="subtitle">Catálogo de coches para alquilar</h2>
    <!--<div class="buscar">
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
    </div>!-->
    <br/>
    <br/>
    @if (\Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 20px">{!! \Session::get('success') !!}</strong>
        </div>
        <br/>
        <br/>
    @endif
    <div>
        @if(sizeof($alquileres) > 0) 
            <div class="price__table">
                @foreach($alquileres as $a)
                <?php
                    $car = App\Models\Car::where('id', '=', $a->car_id)->first();  
                    $rentUser = App\Models\User::where('id', '=', $a->user_id)->first();  
                    $anfitrion = App\Models\User::where('id', '=', $car->user_id)->first();  
                ?>
                <div class="price__element">
                    <p class="price__name"><b>{{ $a->pickUpDate }} > {{ $a->returnDate }}</b></p>
                    <h3 class="price__price" style="font-size: 30px">{{ $a->price }}€/día</h3>

                    <div class="price__items">
                        <img src="/images/cars/{{$car->image}}" alt="220px" width="220px" style="margin-left: 20px; padding: 10px">
                        <br/>
                        <p class="price__features" style="font-size: 30px"><b>{{ $car->brand }}</b></p>
                        <p class="price__features" style="font-size: 25px"><b>{{ $car->model }}</b></p>
                        <p class="price__features">Anfitrión: {{ $anfitrion->name }}</p>
                    </div>
                    @if(is_null($rentUser))
                        <a href="" class="price__cta free">Alquilar vehículo</a>
                    @else
                        @if(Auth::user()->id != $rentUser->id)
                            <a href="" class="price__cta full">Completo</a>                
                        @else
                            <a href="" class="price__cta desunirme">Cancelar alquiler</a> 
                        @endif
                    @endif
                    <br>
                    <a href="" class="price__cta perfilUser">Más detalles</a>
                </div>
                @endforeach
            </div>
            <br/>
            <br/>
        @else
            <div class="alert alert-success" style="text-align: center;" role="alert">
                <strong style="font-size: 20px">No hay resultados para su búsqueda</strong>
            </div>
        @endif
    </div>
</section>
@endsection
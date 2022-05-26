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
    <a href="/nuevoAlquiler" class="cta">Subir nuevo anuncio de vehículo</a>
    <h2 class="subtitle">ALQUILERES PUBLICADOS</h2>
    @if(sizeof($alquileresSubidos) > 0)
        <div class="price__table">
            @foreach($alquileresSubidos as $a)
                <?php
                    $car = App\Models\Car::find($a->car_id);
                ?>
                <div class="price__element">
                    <p class="price__name"><b>{{ $a->pickUpDate }} > {{ $a->returnDate }}</b></p>
                    <h3 class="price__price" style="font-size: 30px">{{ $a->price }}€/día</h3>

                    <div class="price__items">
                        <img src="/images/cars/{{$car->image}}" alt="250px" width="250px" style="margin-left: 5px; padding: 10px; border-radius: 20px">
                        <br/>
                        <p class="price__features" style="font-size: 20px"><b>{{ $car->brand }}</b></p>
                        <p class="price__features" style="font-size: 25px"><b>{{ $car->model }}</b></p>
                    </div>
                    <a href="/eliminarAlquiler/{{$a->id}}" class="price__cta desunirme">Eliminar anuncio</a>
                    <br/>
                    <a href="/detallesAlquiler/{{$a->id}}" class="price__cta perfilUser">Más detalles</a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 20px; margin-left: 425px">No has publicado alquileres todavía</strong>
        </div>
        <br/>
        <br/>
    @endif
    <br/>
    <br/>
    <br/>
    <h2 class="subtitle">ALQUILERES CONTRATADOS</h2>
    @if(sizeof($alquileresContratados) > 0)
        <div class="price__table">
            @foreach($alquileresContratados as $a)
                <?php
                    $car = App\Models\Car::find($a->car_id);
                    $anfitrion = App\Models\User::find($car->user_id)
                ?>
                <div class="price__element">
                    <p class="price__name"><b>{{ $a->pickUpDate }} > {{ $a->returnDate }}</b></p>
                    <h3 class="price__price" style="font-size: 30px">{{ $a->price }}€/día</h3>

                    <div class="price__items">
                        <img src="/images/cars/{{$car->image}}" alt="250px" width="250px" style="margin-left: 5px; padding: 10px; border-radius: 20px">
                        <br/>
                        <p class="price__features" style="font-size: 20px"><b>{{ $car->brand }}</b></p>
                        <p class="price__features" style="font-size: 25px"><b>{{ $car->model }}</b></p>
                        <p class="price__features">Anfitrión: {{ $anfitrion->name }}</p>
                    </div>
                    <a href="/cancelarAlquiler/{{$a->id}}" class="price__cta desunirme">Cancelar alquiler</a>
                    <br/>
                    <a href="/detallesAlquiler/{{$a->id}}" class="price__cta perfilUser">Más detalles</a>
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
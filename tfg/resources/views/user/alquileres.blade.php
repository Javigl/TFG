@extends('user.menuUser')
@section('content')
<section class="travels container">
    <h2 class="subtitle">Catálogo de coches para alquilar</h2>
    <br/>
    <br/>
    <div class="buscar" style="margin-left: 100px">
        <form method="GET">
            <input type="text" id="brand" name="brand" placeholder="Marca" style="margin-left: 60px">
            <input type="text" id="model" name="model" placeholder="Modelo">
            <br/>
            <br/>
            <select style="padding: 5px; width: 300px; height:40px; background-color: white; border: 1px solid silver;border-radius: 30px" name="typeCar" required>
                <option value="Familiar" selected>Familiar</option>
                <option value="Berlina">Berlina</option>
                <option value="Monovolumen">Monovolumen</option>
                <option value="Descapotable">Descapotable</option>
                <option value="Utilitario">Utilitario</option>
                <option value="Todoterreno">Todoterreno</option>
            </select>
            <select style="padding: 5px; width: 300px; height:40px; background-color: white; border: 1px solid silver;border-radius: 30px" name="fuel" required>
                <option value="Gasolina" selected>Gasolina</option>
                <option value="Diésel">Diésel</option>
                <option value="Híbrido">Híbrido</option>
                <option value="Eléctrico">Eléctrico</option>
            </select>
            <select style="padding: 5px; width: 300px; height:40px; background-color: white; border: 1px solid silver;border-radius: 30px"  name="transmision" required>
                <option value="Manual" selected>Manual</option>
                <option value="Automático">Automático</option>
            </select>
            <div class="btnSearch">
                <button type="submit" class="btnsend"><i class="fa fa-search icon"></i></button>
            </div>
        </form>
        <br/>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    @if (\Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong style="font-size: 25px; margin-left: 345px">{!! \Session::get('success') !!}</strong>
        </div>
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
                        <img src="/images/cars/{{$car->image}}" alt="250px" width="250px" style="margin-left: 5px; padding: 10px; border-radius: 20px">
                        <br/>
                        <p class="price__features" style="font-size: 20px"><b>{{ $car->brand }}</b></p>
                        <p class="price__features" style="font-size: 25px"><b>{{ $car->model }}</b></p>
                        <p class="price__features">Anfitrión: {{ $anfitrion->name }}</p>
                    </div>
                    @if(is_null($rentUser))
                        @if (Auth::user()->id == $anfitrion->id)
                            <a href="/eliminarAlquiler/{{$a->id}}" class="price__cta desunirme">Eliminar alquiler</a>
                        @else
                            <a href="/reservarAlquiler/{{$a->id}}" class="price__cta free">Alquilar vehículo</a>
                        @endif
                    @else
                        @if(Auth::user()->id != $rentUser->id)
                            <a class="price__cta full">Vehículo alquilado</a>                
                        @else
                            <a href="/cancelarAlquiler/{{$a->id}}" class="price__cta desunirme">Cancelar alquiler</a> 
                        @endif
                    @endif
                    <br>
                    <a href="/detallesAlquiler/{{$a->id}}" class="price__cta perfilUser">Más detalles</a>
                </div>
                @endforeach
            </div>
            <br/>
            <br/>
            <div style="text-align: center; font-size: 20px">  
                {!! $alquileres->links() !!}
            <div>
        @else
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="alert alert-success" style="text-align: center;" role="alert">
                <strong style="font-size: 20px">No hay resultados para su búsqueda</strong>
            </div>
        @endif
    </div>
</section>
@endsection
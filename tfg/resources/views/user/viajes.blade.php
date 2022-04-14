@extends('user.menuUser')
@section('content')
<section class="travels container">
    <h2 class="subtitle">Obtén tu viaje ideal</h2>
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

                @if(!is_null($travelUser))
                    <form name="formEliminar" action="/cancelarViaje/{{$v->id}}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <a type="button" class="javascript: submitForm() price__cta desunirme">Desunirme</a>
                    </form>
                @elseif($v->places > 0)
                    <a href="/reservarViaje/{{$v->id}}" class="price__cta free">Unirme</a>
                @else
                    <a href="" class="price__cta full">Completo</a>
                @endif
            </div>
        @endforeach
    </div>
</section>
<script type="text/javascript"> 
    function submitForm(){
        document.formEliminar.submit();
    }
</script>

<script>
    document.querySelector('.serviceDeleteBtn').addEventListener('click', function(e)=>{
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            }
        });
    });
</script>
@endsection


<!--href="/cancelarViaje/{{$v->id}}"!--> 
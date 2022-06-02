<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Travel;
use App\Models\TravelUser;
use App\Models\Car;
use App\Models\User;
use App\Models\Rating;
use App\Models\Rental;
use Auth;
use Hash;

class UserController extends Controller
{
    public function menu(){
        return view('user.menuUser');
    }

    public function perfil($id){
        $user = User::find($id);
        $numViajesSubidos = sizeof(Travel::where('user_id', '=', $user->id)->get());
        $numViajesContratados = sizeof(TravelUser::where('user_id', '=', $user->id)->get());
        $cochesUser = Car::select('id')->where('user_id', '=',  $user->id)->get(); 
        $numAlquileresSubidos = sizeof(Rental::whereIn('car_id', $cochesUser)->get()); 
        $numAlquileresContratados = sizeof(Rental::where('user_id', $user->id)->get());

        return view('user.perfil', ['user' => $user, 'numViajesContratados' => $numViajesContratados, 'numViajesSubidos' => $numViajesSubidos, 
                    'numAlquileresSubidos' => $numAlquileresSubidos, 'numAlquileresContratados' => $numAlquileresContratados]);
    }

    public function formEditarPerfil(){
        $user = User::find(Auth::user()->id);

        return view('user.formEditarPerfil', ['user' => $user]);
    }

    public function editarPerfil(Request $req){
        $user = Auth::user();
        $nombre = $req->get('name');
        $apellidos = $req->get('lastname');
        $email = $req->get('email');
        $password = $req->get('password');
        $tel = $req->get('telephone');
        $fecha = $req->get('birthday');

        if(!is_null($nombre)){
            $user->name = $nombre;
        }   
        if(!is_null($apellidos)){
            $user->lastname = $apellidos;
        }
        if(!is_null($email)){
            $emailExiste = User::where('email', '=', $email)->first();
            if(!is_null($emailExiste) && Auth::user()->id != $emailExiste->id){
                return redirect('/editarPerfil')->with('error', 'Email ya en uso');
            }
            $user->email = $email;
        }
        if(!is_null($password)){
            $user->password = Hash::make($password);
        }
        if(!is_null($tel)){
            if(!preg_match("/^[0-9]{9}$/", $tel)){
                return redirect('/editarPerfil')->with('error', 'El teléfono debe estar formado por 9 números');
            }
            $user->telephone = $tel; 
        }
        if(!is_null($fecha)){
            $edad = \Carbon\Carbon::parse($fecha)->age;
            if($edad < 18){
                return redirect('/editarPerfil')->with('error', 'Debes ser mayor de edad');
            }
            $user->birthday = $fecha;
        }
        $user->save();

        return redirect()->action(
            [UserController::class, 'perfil'], ['id' => Auth::user()->id]
        )->with('success', 'Perfil editado con éxito');
    }

    public function viajes(Request $req){
        $origen = $req->get('origen');
        $destino = $req->get('destino');

        //no tiene en cuenta ni mayus ni tildes
        if(!is_null($origen) && !is_null($destino)){
            $travels = Travel::where('origin', '=', $origen)->where('destination', '=', $destino)->orderBy('date')->simplePaginate(6);
        }
        else if(!is_null($req->get('origen'))){
            $travels = Travel::where('origin', '=', $origen)->orderBy('date')->simplePaginate(6);
        }
        else if(!is_null($req->get('destino'))){
            $travels = Travel::where('destination', '=', $destino)->orderBy('date')->simplePaginate(6);
        }
        else{
            $travels = Travel::orderBy('date')->simplePaginate(6);
        }
        
        return view('user.viajes', ['viajes' => $travels]);
    }

    public function confirmarReservaViaje($id){
        $viaje = Travel::find($id);
        
        return view('user.confirmarReservaViaje', ['viaje' => $viaje]);
    }

    public function reservarViaje($id, Request $req){
        $user = Auth::user();
        $viaje = Travel::find($id);
        $precioReserva = $viaje->price;

        if($req->carpoints != 0 && !is_null($req->carpoints)){
            if($req->carpoints > $user->points){
                return redirect()->back()->with('loginError', 'Carpoints insuficientes, introduce menos');
            }
            else{
                $precioReserva = $viaje->price - ($req->carpoints * 0.5);
                if($precioReserva < 2){
                    return redirect()->back()->with('loginError', 'La reserva debe tener un importe mínimo de 2€, usa menos carpoints');
                }
            }
        }

        if($precioReserva > $user->balance){
            return redirect()->back()->with('loginError', 'Saldo insuficiente, carga más saldo');
        }

        $user->balance -= $precioReserva;
        $user->points -= $req->carpoints - 1; //recibe un carpoint por reserva
        $user->save();

        $viaje->places -= 1;
        $viaje->save();

        $travel_user = new TravelUser;
        $travel_user->user_id = $user->id;
        $travel_user->travel_id = $viaje->id;
        $travel_user->save();
        return redirect('/viajes')->with('success', 'Tu reserva se ha realizado correctamente, vuelve al menú para seguir uniéndote a más viajes!');
    }

    public function confirmarCancelacionViaje($id){
        $viaje = Travel::find($id);

        return view('user.confirmarCancelacionViaje', ['viaje' => $viaje]); 
    }

    public function cancelarViaje($id){
        $user = Auth::user();
        $viaje = Travel::find($id);
        $travelUser = TravelUser::where('user_id', '=', $user->id)->where('travel_id','=', $viaje->id)->first();
        $travelUser->delete();

        $user->balance += $viaje->price;
        $user->points -= 1; //Le quitamos el carpoint que recibe por reservar
        $user->save();

        $viaje->places += 1;
        $viaje->save();

        return redirect('/viajes')->with('success', 'Cancelación realizada con éxito');
    }

    public function confirmarEliminacionViaje($id){
        $viaje = Travel::find($id);

        return view('user.confirmarEliminacionViaje', ['viaje' => $viaje]); 
    }

    public function eliminarViaje($id){
        $viaje = Travel::find($id);
        $passengers = TravelUser::where('travel_id','=', $viaje->id)->get();

        foreach($passengers as $passenger){
            $user = User::find($passenger->user_id);

            $user->balance += $viaje->price;
            $user->save();
            $passenger->delete();
        }

        $viaje->delete();

        return redirect('/misviajes')->with('success', 'Eliminación realizada con éxito');
    }

    public function misViajes(){
        $viajesSubidos = Travel::where('user_id','=',Auth::user()->id)->get();
        $viajes = TravelUser::where('user_id','=',Auth::user()->id)->get();
        $viajesContratados = [];

        foreach ($viajes as $v){
            $viaje = Travel::find($v->travel_id);
            array_push($viajesContratados, $viaje);
        }

        return view('user.misViajes', ['viajesSubidos' => $viajesSubidos, 'viajesContratados' => $viajesContratados]);
    }

    public function formNuevoViaje(){
        return view('user.formNuevoViaje');
    }

    public function nuevoViaje(Request $req){
        $fechaActual = date('Y-m-d');

        if($req->fecha < $fechaActual){
            return redirect()->back()->with('error', 'La fecha del viaje debe ser posterior a la actual');
        }
        if($req->origen == $req->destination){
            return redirect()->back()->with('error', 'El origen y el destino deben ser distintos');
        }

        $travel = new Travel;
        $travel->origin = $req->origen;
        $travel->destination = $req->destination;
        $travel->date = $req->fecha;
        $travel->hour = $req->hora;
        $travel->places = $req->numAsientos;
        $travel->price = $req->precio;
        $travel->user_id = Auth::user()->id;
        $travel->save();
        return redirect('/misviajes')->with('success', 'Viaje compartido correctamente!');
    }
    
    public function formAddSaldo(){
        return view('user.addSaldo');
    }

    public function addSaldo(Request $req){
        Auth::user()->balance += $req->saldo;
        Auth::user()->save();

        return redirect('/viajes')->with('success', 'Saldo añadido correctamente, sigue disfrutando de nuestros servicios!');
    }

    public function formValorar($id){
        $user = User::find($id);
        return view('user.valorar', ['user' => $user]);
    }

    public function guardarValoracion(Request $req, $id){
        //user_2: es el valorado 
        $valoracion = new Rating;
        $valoracion->opinion = $req->opinion;
        $valoracion->mark = $req->rate;
        $valoracion->user1_id = Auth::user()->id;
        $valoracion->user2_id = $id;
        $valoracion->save();

        return redirect()->action(
            [UserController::class, 'perfil'], ['id' => $id]
        )->with('success', 'Tu valoración ha sido registrada');;
    }

    public function listarValoraciones($id){
        $valoracionesDadas = Rating::where('user1_id','=', $id)->get();
        $valoracionesRecibidas = Rating::where('user2_id','=', $id)->get();

        return view ('user.valoraciones', ['id' => $id, 'valoracionesDadas' => $valoracionesDadas, 'valoracionesRecibidas' => $valoracionesRecibidas]);
    }

    public function confirmarEliminacionValoracion($id){
        $valoracion = Rating::find($id);

        return view('user.confirmarEliminacionValoracion', ['valoracion' => $valoracion]); 
    }

    public function eliminarValoracion($id){
        $rating = Rating::find($id);
        $rating->delete();

        return redirect()->action(
            [UserController::class, 'perfil'], ['id' => Auth::user()->id]
        )->with('delete', 'Tu valoración ha sido eliminada');
    }

    public function alquileres(Request $req){
        $alquileres = Rental::orderBy('pickUpDate')->simplePaginate(6);
        $brand = $req->get('brand');
        $model = $req->get('model');
        $typeCar = $req->get('typeCar');
        $fuel = $req->get('fuel');
        $transmision = $req->get('transmision');

        //no tiene en cuenta ni mayus ni tildes
        if(!is_null($brand) && !is_null($model)){
            $coches = Car::select('id')->where('brand', '=', $brand)->where('model', '=', $model)->where('carType', '=', $typeCar)->where('fuelType', '=', $fuel)->where('transmission', '=', $transmision)->get(); 
            $alquileres = Rental::whereIn('car_id', $coches)->orderBy('pickUpDate')->simplePaginate(6);
        }
        else if(!is_null($brand)){
            $coches = Car::select('id')->where('brand', '=', $brand)->where('carType', '=', $typeCar)->where('fuelType', '=', $fuel)->where('transmission', '=', $transmision)->get(); 
            $alquileres = Rental::whereIn('car_id', $coches)->orderBy('pickUpDate')->simplePaginate(6);
        }
        else if(!is_null($model)){
            $coches = Car::select('id')->where('model', '=', $model)->where('carType', '=', $typeCar)->where('fuelType', '=', $fuel)->where('transmission', '=', $transmision)->get(); 
            $alquileres = Rental::whereIn('car_id', $coches)->orderBy('pickUpDate')->simplePaginate(6);
        }
        else if(!is_null($typeCar)){
            $coches = Car::select('id')->where('carType', '=', $typeCar)->where('fuelType', '=', $fuel)->where('transmission', '=', $transmision)->get(); 
            $alquileres = Rental::whereIn('car_id', $coches)->orderBy('pickUpDate')->simplePaginate(6);
        }

        return view('user.alquileres', ['alquileres' => $alquileres]);
    }

    public function misAlquileres(){
        $cochesUser = Car::select('id')->where('user_id', '=', Auth::user()->id)->get(); 
        $alquileresSubidos = Rental::whereIn('car_id', $cochesUser)->get(); 
        $alquileresContratados = Rental::where('user_id', Auth::user()->id)->get();

        return view('user.misAlquileres', ['alquileresSubidos' => $alquileresSubidos, 'alquileresContratados' => $alquileresContratados]);
    }

    public function detallesAlquiler($id){
        $alquiler = Rental::find($id);
        $coche = Car::find($alquiler->car_id);
        $anfitrion = User::find($coche->user_id);

        $returnDate = date_create($alquiler->returnDate);
        $pickUpDate = date_create($alquiler->pickUpDate);
        $diasAlquiler = date_diff($pickUpDate, $returnDate)->format('%R%a');

        $precioAlquiler = $diasAlquiler * $alquiler->price;

        return view('user.detallesAlquiler', ['alquiler' => $alquiler, 'coche' => $coche, 'anfitrion' => $anfitrion, 'precio' => $precioAlquiler]);
    }

    public function formNuevoAlquiler(){
        return view('user.formNuevoAlquiler');
    }

    public function nuevoAlquiler(Request $req){
        $fechaActual = date('Y-m-d');

        if($req->fechaR < $fechaActual){
            return redirect()->back()->with('error', 'La fecha de recogida debe ser posterior a la actual');
        }
        if($req->fechaR > $req->fechaD){
            return redirect()->back()->with('error', 'La fecha de recogida debe ser anterior a la de devolución');
        }
        if(!preg_match("/^[0-9]{4}[A-Z]{3}$/", $req->mat)){
            return redirect()->back()->with('error', 'La matrícula debe seguir el siguiente formato: 1111AAA');
        }

        $lastCar = Car::latest('id')->first();
        $lastId = $lastCar->id;

        $car = new Car;
        $imagen = $req->file("image");
        $nombreImagen = Str::slug("car" . ($lastId + 1)). "." .$imagen->guessExtension();
        $ruta = public_path("images/cars/" . $nombreImagen);
        $imagen->move($ruta, $nombreImagen);
        $car->image = $nombreImagen;
        $car->brand = $req->brand;
        $car->model = $req->model;
        $car->licensePlate = $req->mat;
        $car->carType = $req->typeCar;
        $car->fuelType = $req->fuel;
        $car->transmission = $req->transmision;
        $car->places = $req->numPlazas;
        $car->user_id = Auth::user()->id;
        $car->save();
        $lastCar = Car::latest('id')->first();

        
        $rental = new Rental;
        $rental->city = $req->city;
        $rental->pickUpDate = $req->fechaR;
        $rental->returnDate = $req->fechaD;
        $rental->price = $req->precio;
        $rental->car_id = $lastCar->id;
        $rental->save();
        //el usuario lo rellenaremos cuando un usuario alquile el coche anunciado
        return redirect('/misAlquileres')->with('success', 'Viaje compartido correctamente!');
    }

    public function confirmarReservaAlquiler($id){
        $alquiler = Rental::find($id);
        $coche = Car::find($alquiler->car_id);
        $anfitrion = User::find($coche->user_id);

        $returnDate = date_create($alquiler->returnDate);
        $pickUpDate = date_create($alquiler->pickUpDate);
        $diasAlquiler = date_diff($pickUpDate, $returnDate)->format('%R%a');

        $precioAlquiler = $diasAlquiler * $alquiler->price;
        return view('user.confirmarReservaAlquiler', ['alquiler' => $alquiler, 'coche' => $coche, 'anfitrion' => $anfitrion, 'precioAlquiler' => $precioAlquiler]); 
    }

    public function reservaAlquiler($id, Request $req){
        $user = Auth::user();
        $alquiler = Rental::find($id);
        $returnDate = date_create($alquiler->returnDate);
        $pickUpDate = date_create($alquiler->pickUpDate);
        $diasAlquiler = date_diff($pickUpDate, $returnDate)->format('%R%a');

        $precioAlquiler = $diasAlquiler * $alquiler->price;

        if($req->carpoints != 0 && !is_null($req->carpoints)){
            if($req->carpoints > $user->points){
                return redirect()->back()->with('error', 'Carpoints insuficientes, introduce menos');
            }
            else{
                $precioAlquiler -= ($req->carpoints * 0.5);
                if($precioAlquiler < 2){
                    return redirect()->back()->with('error', 'La reserva debe tener un importe mínimo de 2€, usa menos carpoints');
                }
            }
        }

        if($precioAlquiler > $user->balance){
            return redirect()->back()->with('error', 'Saldo insuficiente, carga más saldo');
        }

        $user->balance -= $precioAlquiler;
        $user->points -= $req->carpoints - 1; //recibe un carpoint por reserva
        $user->save();

        $alquiler->user_id = $user->id;
        $alquiler->save();
        return redirect('/alquileres')->with('success', '¡Tu reserva se ha realizado correctamente!');
    }

    public function confirmarCancelacionAlquiler($id){
        $alquiler = Rental::find($id);
        $coche = Car::find($alquiler->car_id);

        return view('user.confirmarCancelacionAlquiler', ['alquiler' => $alquiler, 'coche' => $coche]); 
    }

    public function cancelarAlquiler($id){
        $user = Auth::user();
        $alquiler = Rental::find($id);
        $returnDate = date_create($alquiler->returnDate);
        $pickUpDate = date_create($alquiler->pickUpDate);
        $diasAlquiler = date_diff($pickUpDate, $returnDate)->format('%R%a');
        $precioAlquiler = $diasAlquiler * $alquiler->price;

        $alquiler->user_id = null;
        $alquiler->save();

        $user->balance += $precioAlquiler;
        $user->save();

        return redirect('/alquileres')->with('success', '¡Tu reserva se ha sido cancelada!');
    }

    public function confirmarEliminacionAlquiler($id){
        $alquiler = Rental::find($id);
        $coche = Car::find($alquiler->car_id);

        return view('user.confirmarEliminacionAlquiler', ['alquiler' => $alquiler, 'coche' => $coche]); 
    }

    public function eliminarAlquiler($id){
        $alquiler = Rental::find($id);
        $user = User::find($alquiler->user_id);
        $returnDate = date_create($alquiler->returnDate);
        $pickUpDate = date_create($alquiler->pickUpDate);
        $diasAlquiler = date_diff($pickUpDate, $returnDate)->format('%R%a');
        $precioAlquiler = $diasAlquiler * $alquiler->price;

        $user->balance += $precioAlquiler;
        $user->save();

        $alquiler->delete();
    }
}

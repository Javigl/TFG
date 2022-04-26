<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\TravelUser;
use App\Models\Car;
use App\Models\User;
use App\Models\Rating;
use Auth;

class UserController extends Controller
{
    public function menu(){
        return view('user.menuUser');
    }

    public function perfil($id){
        $user = User::find($id);
        $numViajesSubidos = sizeof(Travel::where('user_id', '=', $user->id)->get());
        $numViajesContratados = sizeof(TravelUser::where('user_id', '=', $user->id)->get());

        return view('user.perfil', ['user' => $user, 'numViajesContratados' => $numViajesContratados, 'numViajesSubidos' => $numViajesSubidos]);
    }

    public function viajes(){
        $travels = Travel::all();
        
        return view('user.viajes', ['viajes' => $travels]);
    }

    public function confirmarReservaViaje($id){
        $viaje = Travel::find($id);
        
        return view('user.confirmarReservaViaje', ['viaje' => $viaje]);
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

    public function reservarViaje($id,Request $req){
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
        return redirect('/viajes')->with('success', 'Tu reserva se ha realizado correctamente, vuelve al menú para uniéndote a más viajes!');
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
        $car = Car::where('user_id', '=', Auth::user()->id);

        if(is_null($car)){
            //mostrar otro formulario para añadir un coche
        }
        return view('user.formNuevoViaje');
    }

    public function nuevoViaje(Request $req){
        $fechaActual = date('Y-m-d');
        ///validar que el origen no es igual que el destino
        //validar la fecha

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
        $valoracionesDadas = Rating::where('user1_id','=',Auth::user()->id)->get();
        $valoracionesRecibidas = Rating::where('user2_id','=',Auth::user()->id)->get();

        return view ('user.valoraciones', ['valoracionesDadas' => $valoracionesDadas, 'valoracionesRecibidas' => $valoracionesRecibidas]);
    }
}

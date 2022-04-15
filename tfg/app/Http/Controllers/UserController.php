<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\TravelUser;
use Auth;

class UserController extends Controller
{
    public function menu(){
        return view('user.menuUser');
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
    
    public function formAddSaldo(){
        return view('user.addSaldo');
    }

    public function addSaldo(Request $req){
        Auth::user()->balance += $req->saldo;
        Auth::user()->save();

        return redirect('/viajes')->with('success', 'Saldo añadido correctamente, sigue disfrutando de nuestros servicios!');
    }
}

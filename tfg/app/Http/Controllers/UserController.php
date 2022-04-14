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

    public function cancelarViaje($id){
        
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
        $user->points -= $req->carpoints;
        $user->save();

        $viaje->places -= 1;
        $viaje->save();

        $travel_user = new TravelUser;
        $travel_user->user_id = $user->id;
        $travel_user->travel_id = $viaje->id;
        $travel_user->save();
        return redirect()->back()->with('successReserva', 'Tu reserva se ha realizado correctamente, vuelve al menú para uniéndote a más viajes!');
    }
}

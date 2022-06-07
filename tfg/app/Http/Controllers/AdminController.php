<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\TravelUser;
use App\Models\Car;
use App\Models\User;
use App\Models\Rating;
use App\Models\Rental;
use Auth;

class AdminController extends Controller
{
    public function menu(Request $req){
        $param = $req->get('param');
        $users = User::all();
        $numUsers = sizeof($users);
        $numViajes = sizeof(Travel::all());
        $numAlquileres = sizeof(Rental::all());
        $numOpiniones = sizeof(Rating::all());


        if(!is_null($param)){
            $users = User::where('id', '=', $param)->get();
            if(sizeof($users) == 0){
                $users = User::where('name', 'LIKE', '%' . $param . '%')->orderBy('id', 'asc')->get();
                if(sizeof($users) == 0){
                    $users = User::where('lastname', 'LIKE', '%' . $param . '%')->orderBy('id', 'asc')->get();
                    if(sizeof($users) == 0){
                        $users = User::where('email', 'LIKE', '%' . $param . '%')->orderBy('id', 'asc')->get();
                    }
                }
            }
        }

        return view('admin.usuarios', ['users' => $users, 'numUsers' => $numUsers, 'numViajes' => $numViajes, 
        'numAlquileres' => $numAlquileres, 'numOpiniones' => $numOpiniones]);
    }

    public function bloquearUsuario($id){
        $user = User::find($id);

        $user->blocked = true;
        $user->save();
        return redirect('/admin');
    }

    public function habilitarUsuario($id){
        $user = User::find($id);

        $user->blocked = false;
        $user->save();
        return redirect('/admin');
    }

    public function viajes(Request $req){
        $param = $req->get('param');
        $travels = Travel::all();
        $numUsers = sizeof(User::all());
        $numViajes = sizeof($travels);
        $numAlquileres = sizeof(Rental::all());
        $numOpiniones = sizeof(Rating::all());

        if(!is_null($param)){
            $travels = Travel::where('id', '=', $param)->get();
            if(sizeof($travels) == 0){
                $travels = Travel::where('origin', 'LIKE', '%' . $param . '%')->orWhere('destination', 'LIKE', '%' . $param . '%')->orderBy('id', 'asc')->get();
                if(sizeof($travels) == 0){
                    $travels = Travel::whereDate('date', $param)->orderBy('id', 'asc')->get();
                }
            }
        }

        return view('admin.viajes', ['viajes' => $travels, 'numUsers' => $numUsers, 'numViajes' => $numViajes, 
        'numAlquileres' => $numAlquileres, 'numOpiniones' => $numOpiniones]);
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

        return redirect('/administrarViajes')->with('success', 'Eliminación realizada con éxito');
    }

    public function valoraciones(Request $req){
        $param = $req->get('param');
        $opiniones = Rating::all();
        $numUsers = sizeof(User::all());
        $numViajes = sizeof(Travel::all());
        $numAlquileres = sizeof(Rental::all());
        $numOpiniones = sizeof($opiniones);

        if(!is_null($param)){
            $opiniones = Rating::where('user1_id', '=', $param)->orWhere('user2_id', '=', $param)->orderBy('id', 'asc')->get();
        }

        return view('admin.valoraciones', ['opiniones' => $opiniones, 'numUsers' => $numUsers, 'numViajes' => $numViajes, 
        'numAlquileres' => $numAlquileres, 'numOpiniones' => $numOpiniones]);
    }

    public function eliminarValoracion($id){
        $rating = Rating::find($id);
        $rating->delete();

        return redirect('/administrarValoraciones')->with('success', 'Eliminación realizada con éxito');
    }

    public function alquileres(Request $req){
        $param = $req->get('param');
        $alquileres = Rental::all();
        $numUsers = sizeof(User::all());
        $numViajes = sizeof(Travel::all());
        $numAlquileres = sizeof($alquileres);
        $numOpiniones = sizeof(Rating::all());

        if(!is_null($param)){
            $alquileres = Rental::where('city', 'LIKE', '%' . $param . '%')->orderBy('id', 'asc')->get();
            if(sizeof($alquileres) == 0){
                $alquileres = Rental::where('user_id', '=', $param)->orderBy('id', 'asc')->get();
                if(sizeof($alquileres) == 0){
                    $alquileres = Rental::where('car_id', '=', $param)->orderBy('id', 'asc')->get();
                }
            }
        }

        return view('admin.alquileres', ['alquileres' => $alquileres, 'numUsers' => $numUsers, 'numViajes' => $numViajes, 
        'numAlquileres' => $numAlquileres, 'numOpiniones' => $numOpiniones]);
    }

    public function eliminarAlquiler($id){
        $alquiler = Rental::find($id);
        $user = User::find($alquiler->user_id);
        
        $returnDate = date_create($alquiler->returnDate);
        $pickUpDate = date_create($alquiler->pickUpDate);
        $diasAlquiler = date_diff($pickUpDate, $returnDate)->format('%R%a');
        $precioAlquiler = $diasAlquiler * $alquiler->price;

        if(!is_null($user)){
            $user->balance += $precioAlquiler;
            $user->save();
        }

        $alquiler->delete();
        return redirect('/administrarAlquileres')->with('success', 'Eliminación realizada con éxito');
    }
}

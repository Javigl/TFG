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

    public function viajes(){
        $travels = Travel::all();
        $numUsers = sizeof(User::all());
        $numViajes = sizeof($travels);
        $numAlquileres = sizeof(Rental::all());
        $numOpiniones = sizeof(Rating::all());

        return view('admin.viajes', ['viajes' => $travels, 'numUsers' => $numUsers, 'numViajes' => $numViajes, 
        'numAlquileres' => $numAlquileres, 'numOpiniones' => $numOpiniones]);
    }
}

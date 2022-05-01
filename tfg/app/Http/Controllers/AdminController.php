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
    public function menu(){
        $users = User::all();
        $numUsers = sizeof($users);
        $numViajes = sizeof(Travel::all());
        $numAlquileres = sizeof(Rental::all());
        $numOpiniones = sizeof(Rating::all());

        return view('admin.menuAdmin', ['users' => $users, 'numUsers' => $numUsers, 'numViajes' => $numViajes, 
        'numAlquileres' => $numAlquileres, 'numOpiniones' => $numOpiniones]);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\TravelUser;

class PasajeroViaje
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $idViaje = explode("/", $request->path())[1];
        $pasajero = TravelUser::where('user_id', '=', Auth::user()->id)->where('travel_id', '=', $id)->first();
        
        if(is_null($pasajero)){
            return abort(403, 'No puedes cancelar viajes a los que no te has unido');
        }
        else{
            return $next($request);
        }
    }
}
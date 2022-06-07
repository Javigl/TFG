<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;

class AnfitrionViaje
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
        $viaje = Travel::find($idViaje);
        
        if(is_null($viaje)){
            return abort(403, 'No existe ningún viaje con ese ID');
        }
        else if(Auth::user()->id == $viaje->user_id ){
            return abort(403, 'Debes reservar viajes que no hayas compartido tú');
        }
        else{
            if($viaje->places == 0){
                return abort(403, 'No puedes reservar viajes en los que no hay huecos libres disponibles');
            }
            return $next($request);
        }
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;

class AnfitrionViajeEliminar
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
        
        if(Auth::user()->id != $viaje->user_id){
            return abort(403, 'Solo puedes eliminar aquellos viajes que hayas compartido tú');
        }
        else{
            return $next($request);
        }
    }
}
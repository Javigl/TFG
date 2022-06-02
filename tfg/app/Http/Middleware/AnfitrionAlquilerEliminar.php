<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;
use App\Models\Car;

class AnfitrionAlquilerEliminar
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
        $idAlquiler = explode("/", $request->path())[1];
        $alquiler = Rental::find($idAlquiler);
        $coche = Car::find($alquiler->car_id);
        
        if(Auth::user()->id != $coche->user_id){
            return abort(403, 'Solo puedes eliminar aquellos alquileres que hayas compartido tú');
        }
        else{
            return $next($request);
        }
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class SolicitanteAlquiler
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
        
        if(Auth::user()->id != $alquiler->user_id){
            return abort(403, 'No puedes cancelar alquileres que no has solicitado');
        }
        else{
            return $next($request);
        }
    }
}
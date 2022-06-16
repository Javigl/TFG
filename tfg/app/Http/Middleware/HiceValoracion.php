<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class HiceValoracion
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
        $id = explode("/", $request->path())[1];
        $rating = Rating::find($id);

        if(is_null($rating)){
            return abort(403, 'No puedes eliminar valoraciones que no has realizado tú');
        }
        else if(Auth::user()->id == $rating->user1_id){
            return $next($request);
        }
        else{
            return abort(403, 'No puedes eliminar valoraciones que no has realizado tú');
        }
    }
}
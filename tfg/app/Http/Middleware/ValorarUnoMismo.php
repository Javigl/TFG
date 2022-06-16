<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ValorarUnoMismo
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
        
        if(Auth::user()->id == $id){
            return abort(403, 'No puedes valorarte a ti mismo');
        }
        else{
            return $next($request);
        }
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response //manejador o 
    {
        //dos formas de obtener el usuario
        // $user = Auth::user();
        $user = $request->user();

        if($user == null){
            return redirect()->route('index');//fuera
        }
        if($user->id != '1'){
            return redirect()->route('home');//sino es SuperAdmin al home
        }
        return $next($request);
    }
}

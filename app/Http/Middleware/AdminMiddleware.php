<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dos formas de obtener el usuario
        $user = Auth::user();
        $user = $request->user();

        if($user == null){
            return redirect()->route('index');//fuera
        }
        if($user->role != 'admin'){
            return redirect()->route('home');//sino es admin al home
        }
        
        return $next($request);
    }
}

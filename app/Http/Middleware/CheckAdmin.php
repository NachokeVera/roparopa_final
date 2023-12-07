<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Verifica si el usuario tiene el atributo "rol" igual a 1 (administrador)
            if (Auth::user()->perfil_id == 1) {
                return $next($request); // Permítelo pasar al siguiente middleware o controlador
            }
        }

        // Si no es un administrador, redirige a alguna página o muestra un error
        return redirect('/acceso-denegado'); //->with('error', 'No tienes permiso para acceder a esta página.')
    }
}

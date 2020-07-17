<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Flash;

class Connexion
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
        if (auth()->guest()) {
            Flash::message('error_connexion','Session expirée! Veuillez vous reconnecter.');
            return redirect()->route('connexion_path');
        }
        return $next($request);
    }
}

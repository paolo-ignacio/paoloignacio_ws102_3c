<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
     public function handle($request, Closure $next)
    {
        if (!session()->has('loggedUser')) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}

?>

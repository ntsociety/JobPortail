<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
            if (auth()->user()->is_admin)
            {
                return $next($request);
            }
            elseif(Auth::user()->role == 'recruteur')
            {
                return redirect()->route('company-profile');
            }
            else
            {
                return redirect('/');
            }

        }
        else
        {
            return redirect('login');
        }
    }
}
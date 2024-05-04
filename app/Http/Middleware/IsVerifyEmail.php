<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {
        if (!Auth::user()) {

            return redirect()->route('login');

        }
        if (!Auth::user()->email_verified_at) {
            auth()->logout();
            return redirect()->route('login')
                    ->with('error', 'You need to verify your email address. please check your email.');
          } 
        return $next($request);
    }
}

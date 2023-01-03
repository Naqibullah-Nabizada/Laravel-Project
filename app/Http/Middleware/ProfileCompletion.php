<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(Auth::user()->email) && empty(Auth::user()->email_verified_at)) {

            return redirect()->route('login-register-form')->withErrors('id', 'لطفا ایمیل خود را تائید کنید');
        }

        if (empty(Auth::user()->first_name) || empty(Auth::user()->last_name) || empty(Auth::user()->mobile)) {
            return redirect()->route('customer.sales-porcess.profile-completion');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidatorAuth
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
        if($request->session()->has('VALIDATOR_LOGIN'))
        {
        }
        else
        {
           $request->session()->flash('error','Please login first');
           return redirect('validator');
        }
        return $next($request);
    }
}

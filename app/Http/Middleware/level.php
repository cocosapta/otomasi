<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->level, $levels)) {

            return $next($request);
        }
        if( Auth::user()->level == 'admin'){
            return Redirect('admin.dashboard');

        }elseif( Auth::user()->level == 'kasir'){
            return Redirect('dashboard');

        }elseif( Auth::user()->level == 'meja'){
            return Redirect('index');

        }elseif( Auth::user()->level == 'dapur'){
            return Redirect('dapur');
        }
        return Redirect('/');
    }
}
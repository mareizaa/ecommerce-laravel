<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class UserActive
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->status) {
            return $next($request);
        }
        request()->session()->invalidate();
        return back();
    }
}

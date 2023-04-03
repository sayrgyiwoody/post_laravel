<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Post
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role!='admin') {
            return back()->with(['authMessage'=>'စိတ်မကောင်းပါ။ admin သာ ပြုလုပ်နိုင်ပါသည်။']);
        }
        return $next($request);
    }
}

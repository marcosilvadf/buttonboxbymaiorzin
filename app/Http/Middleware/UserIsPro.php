<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserIsPro
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || !$request->user()->is_pro) {
            return redirect()->route('plans')->withErrors(['erro' => 'Assine o pro para desbloquear essa funcionalidade, veja os benefícios abaixo!']);
        }
        
        return $next($request);
    }
}

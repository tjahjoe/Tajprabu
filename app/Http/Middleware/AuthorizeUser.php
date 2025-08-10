<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $kode = ""): Response
    {

        $user = $request->user();
        if ($user->has_role($kode)) {
           return $next($request);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}

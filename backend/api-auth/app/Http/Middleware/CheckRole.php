<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class CheckRole
{

public function handle(Request $request, Closure $next, ...$roles)
{
if (! $request->user() || ! $request->user()->hasRole($roles)) {
return response()->json(['message' => 'No autorizado.'], 403);

}
return $next($request);
}
}

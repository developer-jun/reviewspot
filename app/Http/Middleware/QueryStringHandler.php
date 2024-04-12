<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueryStringHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $keywords = $request->input('keywords');
        if (!is_null($keywords)) {
            $request->attributes->add(['keywords' => $keywords]);
        }

        $category = $request->input('category');
        if (!is_null($category)) {
            $request->attributes->add(['category' => $category]);
        }

        $state = $request->input('state');
        if (!is_null($state)) {
            $request->attributes->add(['state' => $state]);
        }

        return $next($request);
    }
}

<?php

namespace MohammadMghi\RouteTracker\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TrackRoute
{
    public function handle($request, Closure $next)
    { 
        $response = $next($request);
 
        if (in_array($request->method(), config('route-tracker.log_methods'))) {
            DB::table(config('route-tracker.log_table'))->insert([
                'user_id' => Auth::id(),
                'method' => $request->method(),
                'route' => $request->path(),
                'ip_address' => $request->ip(),
                'created_at' => now(),
            ]);
        }

        return $response;
    }
}

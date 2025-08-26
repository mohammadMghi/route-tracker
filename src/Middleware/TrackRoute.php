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

        $userId = Auth::check() ? Auth::id() : null;
 
        $sessionId = $request->session()->getId();

        $lastVisit = DB::table(config('route-tracker.log_table'))
            ->where('user_id', $userId)
            ->orWhere('session_id', $sessionId)
            ->orderBy('created_at', 'desc')
            ->first();

        $response = $next($request);
 

        $timeoutMinutes = config('route-tracker.session_timeout_minutes', 1440);
        $isNewFlow = true;

        if ($lastVisit) {
            $minutesSinceLast = now()->diffInMinutes($lastVisit->created_at);
            if ($minutesSinceLast <= $timeoutMinutes) {
                $isNewFlow = false;
            }
        }


        if (in_array($request->method(), config('route-tracker.log_methods'))) {
            DB::table(config('route-tracker.log_table'))->insert([
                'user_id' => $userId,
                'method' => $request->method(),
                'route' => $request->path(),
                'previous_route'=> $isNewFlow ? null : ($lastVisit->route ?? null),
                'duration'      => $isNewFlow ? null : now()->diffInSeconds($lastVisit->created_at),
                'ip_address' => $request->ip(),
                'parameters'    => json_encode($request->all()),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        return $response;
    }
}

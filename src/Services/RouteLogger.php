<?php

namespace YourName\RouteTracker\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RouteLogger
{
    public function log($request)
    {
        DB::table(config('route-tracker.log_table'))->insert([
            'user_id' => Auth::id(),
            'method' => $request->method(),
            'route' => $request->path(),
            'ip_address' => $request->ip(),
            'created_at' => now(),
        ]);
    }
}

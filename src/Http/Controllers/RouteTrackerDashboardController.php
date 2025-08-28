<?php
namespace MohammadMghi\RouteTracker\Http\Controllers;

use Illuminate\Http\Request;
use MohammadMghi\RouteTracker\Models\RouteLog;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class RouteTrackerDashboardController extends Controller
{
    public function index(Request $request)
    {  
        $query = RouteLog::query();
        
        if ($search = $request->input('search')) {
            $query->where('user_id', 'like', "%{$search}%")
                ->orWhere('route', 'like', "%{$search}%")
                ->orWhere('ip_address', 'like', "%{$search}%")
                ->orWhere('previous_route', 'like', "%{$search}%");
        }

        $logs = $query->orderBy('visited_at', 'desc')->get();

        return view('route-tracker::dashboard', compact('logs'));
    }
}
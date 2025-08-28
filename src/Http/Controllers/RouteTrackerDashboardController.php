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
        $from = $request->get('from', Carbon::now()->subDays(7));
        $to = $request->get('to', Carbon::now());

        $logs = RouteLog::whereBetween('visited_at', [$from, $to])
            ->orderBy('visited_at', 'asc')
            ->get()
            ->groupBy('user_id');

        return view('route-tracker::dashboard', compact('logs', 'from', 'to'));
    }
}
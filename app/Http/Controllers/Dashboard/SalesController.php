<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function sales()
    {
        $currentMonthleySales = Subscription::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('price');

        $totalSales = Subscription::sum('price');

        $currentMonthUserCount = User::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Get visits grouped by month
        $visitsByMonth = DB::table('visits')
            ->select(DB::raw('MONTH(visit_date) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(visit_date)'))
            ->orderBy(DB::raw('MONTH(visit_date)'))
            ->get();

        // Map month numbers to month names
        $months = collect($visitsByMonth)->map(function ($item) {
            return Carbon::create()->month($item->month)->format('M');
        })->toArray();

        // Separate the results into two arrays
        $visitCounts = $visitsByMonth->pluck('count')->toArray();

        return view('dashboard.sales', get_defined_vars());
    }
}

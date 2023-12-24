<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function sales()
    {
        $gym = Gym::where('id', '=', auth('gyms')->user()->id)->first();
        $gymPackagesIds = $gym->packages()->pluck('id')->toArray();

        $currentMonthleySales = User::join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
        ->whereIn('subscriptions.id', $gymPackagesIds)
        ->whereMonth('subscriptions.created_at', Carbon::now()->month)
        ->whereYear('subscriptions.created_at', Carbon::now()->year)
        ->sum('subscriptions.price');
        $totalSales = User::join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
            ->whereIn('subscriptions.id', $gymPackagesIds)
            ->sum('subscriptions.price');
        $currentMonthlySales = User::join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
            ->whereIn('subscriptions.id', $gymPackagesIds)
            ->whereMonth('subscriptions.created_at', Carbon::now()->month)
            ->whereYear('subscriptions.created_at', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(subscriptions.created_at)'))
            ->orderBy(DB::raw('MONTH(subscriptions.created_at)'))
            ->select(
                DB::raw('MONTH(subscriptions.created_at) as month'),
                DB::raw('SUM(subscriptions.price) as totalSales')
            )
            ->get();

        $months = collect($currentMonthlySales)->map(function ($item) {
            return Carbon::create()->month($item->month)->format('M');
        })->toArray();

        // Separate the results into two arrays
        $totalSalesChart = $currentMonthlySales->pluck('totalSales')->toArray();

        return view('gyms.sales', get_defined_vars());
    }
}

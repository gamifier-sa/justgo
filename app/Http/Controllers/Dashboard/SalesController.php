<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        return view('dashboard.sales', get_defined_vars());
    }
}

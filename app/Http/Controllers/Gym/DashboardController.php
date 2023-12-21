<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Award;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\Gym;
use App\Models\Region;
use App\Models\Role;
use App\Models\Service;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $gym = Gym::first();
        $gymPackagesIds = $gym->packages()->pluck('id')->toArray();
        $users = User::whereHas('subscriptions', function ($query) use ($gymPackagesIds) {
            return $query->whereIn('id', $gymPackagesIds);
        })->limit(5)->get();

        $currentMonthleySales = User::join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
        ->whereIn('subscriptions.id', $gymPackagesIds)
        ->whereMonth('subscriptions.created_at', Carbon::now()->month)
        ->whereYear('subscriptions.created_at', Carbon::now()->year)
        ->sum('subscriptions.price');
        $currentDailySales =  User::join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
        ->whereIn('subscriptions.id', $gymPackagesIds)
        ->whereDay('subscriptions.created_at', Carbon::now()->day)
        ->whereYear('subscriptions.created_at', Carbon::now()->year)
        ->sum('subscriptions.price');
        $totalSales = User::join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
        ->whereIn('subscriptions.id', $gymPackagesIds)
        ->sum('subscriptions.price');
        return view('gyms.index', get_defined_vars());
    }

    public function dashboard()
    {
        return view('gyms.dashboard');
    }
}

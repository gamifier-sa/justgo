<?php

namespace App\Http\Controllers\Dashboard;

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
        $users = User::limit(5)->get();
        $gyms = Gym::limit(5)->get();
        $currentMonthleySales = Subscription::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('price');
        $totalSales = Subscription::sum('price');
        return view('dashboard.index', get_defined_vars());
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Award;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\Region;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::count();
        $roles = Role::count();
        $categories = Category::get();
        $admins = Admin::count();
        return view('dashboard.index')->with([
            'companies'=> $companies,
            'roles'=> $roles,
            'categories'=> $categories,
            'admins'=> $admins,

        ]);
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
}

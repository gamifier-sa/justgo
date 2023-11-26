<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index(){
        $gyms = Gym::limit(5)->get();
        return view('dashboard.gyms', get_defined_vars());
    }

    public function create(){
        return view('dashboard.add_new_gym');
    }
}

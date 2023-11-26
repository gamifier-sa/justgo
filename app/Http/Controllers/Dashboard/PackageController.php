<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Gym;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();
        return view('dashboard.packages', get_defined_vars());
    }

    public function create(){
        $gyms = Gym::all();
        return view('dashboard.add_new_package', get_defined_vars());
    }

    public function store(Request $request){
        $rules = [
            'icon' => ['required','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'daily_price' => ['required', 'min:0', 'numeric'],
            'monthly_price' => ['required', 'min:0', 'numeric'],
            'quarterly_price' => ['required', 'min:0', 'numeric'],
            'annual_price' => ['required', 'min:0', 'numeric'],
            'visits_no' => ['required', 'min:0', 'numeric'],
            'gyms' => ['required'],
        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.name'] = 'required|min:2|max:255';
            $rules[$one_lang . '.description'] = 'required|min:2|max:255';
        }
        $data = $request->validate($rules);
        $gyms = $data['gyms'];
        unset($data['gyms']);

        $data['icon'] = storeImage('Packages', $request->icon);
        $data['midterm_price'] = 0;
        $package = Package::create($data);
        $package->gym()->sync($gyms);
        return redirect()->route('dashboard.packages.index');
    }
}

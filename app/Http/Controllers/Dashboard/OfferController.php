<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Package;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create()
    {
        $this->authorize('create_offers');

        $packages = Package::get();
        return view('dashboard.add_offer', get_defined_vars());
    }

    public function store(Request $request)
    {
        $this->authorize('create_offers');

        $data = $request->validate([
            'image' => ['required', 'mimes:jpeg,png,jpg,gifsvg', 'max:4096'],
            'type' => 'required|in:cache_back',
            'percentage' => 'required|numeric|min:0',
            'package_id' => 'required|integer|exists:packages,id',
            'for_who' => 'required|in:new_users,special_users,all_users'
        ]);
        $offer = Offer::create($data);
        return redirect()->route('dashboard.packages.index');
    }
}

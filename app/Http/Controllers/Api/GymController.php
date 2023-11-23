<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GymDetailsResource;
use App\Http\Resources\GymResource;
use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::with('packages')->orderBy('id', 'DESC')->paginate();
        return response()->success([
            'gyms' =>  GymResource::collection($gyms),

        ]);
    }

    public function show(Request $request)
    {

        $gym = Gym::with('packages', 'times', 'images')->findOrFail($request->id);

        return response()->success([
            'gym' => new GymDetailsResource($gym),

        ]);
    }
    public function gymbypackage(Request $request)
    {
        $packageId= $request->package_id;
        $gyms = Gym::with('packages')
            ->whereHas('packages', function ($query) use ($packageId) {
                $query->where('package_id', $packageId);
            })
            ->orderBy('id', 'DESC')
            ->paginate();
        return response()->success([
            'gyms' =>  GymResource::collection($gyms),

        ]);
    }
}

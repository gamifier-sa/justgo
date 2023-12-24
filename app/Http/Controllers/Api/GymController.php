<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GymDetailsResource;
use App\Http\Resources\GymResource;
use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GymController extends Controller
{
    public function index(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $cityId = $request->input('city_id');
        $gender = $request->input('gender');

        $query = Gym::where('admin_active', '=', 'active')->with('packages');

        if ($latitude && $longitude) {
            $query->whereRaw("6371 * acos(cos(radians($latitude)) * cos(radians(gyms.lat)) * cos(radians(gyms.lng) - radians($longitude)) + sin(radians($latitude)) * sin(radians(gyms.lat))) < 5");
        }

        if ($cityId) {
            $query->where('city_id', '=', $cityId);
        }
        if ($gender) {

            $query->whereIn('gender', [$gender, 'both']);
        }


        $gyms = $query->orderBy('id', 'DESC')->paginate();

        return response()->success([
            'gyms' => GymResource::collection($gyms),
        ]);
    }


    public function show(Request $request)
    {

        $gym = Gym::where('admin_active', '=', 'active')->with('packagesGym', 'times', 'images')->findOrFail($request->id);
        return response()->success([
            'gym' => new GymDetailsResource($gym),

        ]);
    }
    public function gymbypackage(Request $request)
    {
        $packageId = $request->package_id;
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $cityId = $request->input('city_id');
        $gender = $request->input('gender');
        $query = Gym::where('admin_active', '=', 'active')->with('packages');


        if ($latitude && $longitude) {

            $query->whereRaw("6371 * acos(cos(radians($latitude)) * cos(radians(gyms.lat)) * cos(radians(gyms.lng) - radians($longitude)) + sin(radians($latitude)) * sin(radians(gyms.lat))) < 5")
                ->get();
        }

        if ($cityId) {
            $query->where('city_id', '=', $cityId);
        }
        if ($gender) {
            $query->whereIn('gender', [$gender, 'both']);
        }


        $gyms = $query->whereHas('packages', function ($query) use ($packageId) {
            $query->where('package_id', $packageId);
        })
            ->orderBy('id', 'DESC')
            ->paginate();
        return response()->success([
            'gyms' =>  GymResource::collection($gyms),

        ]);
    }
}

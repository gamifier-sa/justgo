<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('id', 'DESC')
            ->whereHas('gym', function ($query) {
                $query->where('admin_active', 'active');
            })
            ->paginate();

        return response()->success([
            'packages' =>  PackageResource::collection($packages),

        ]);
    }

    public function show($id)
    {
        $package = Package::with(['gym' => function ($query) {
            $query->where('admin_active', 'active');
        }])
            ->findOrFail($id);
        return response()->success([
            'package' =>  new PackageResource($package),
        ]);
    }
}

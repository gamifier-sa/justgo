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
        $packages =Package::orderBy('id', 'DESC')->paginate();

        return response()->success([
            'packages' =>  PackageResource::collection($packages),

        ]);
    }
}

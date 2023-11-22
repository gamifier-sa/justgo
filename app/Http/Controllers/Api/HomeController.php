<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\FooterResource;
use App\Http\Resources\GiftUserResource;
use App\Http\Resources\GymResource;
use App\Http\Resources\PackageResource;
use App\Http\Resources\PackagesResource;
use App\Http\Resources\SignUpResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\TestimonialResource;
use App\Http\Resources\UserResource;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Event;
use App\Models\Footer;
use App\Models\GiftUser;
use App\Models\Gym;
use App\Models\Package;
use App\Models\SignUp;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gifts =GiftUser::orderBy('id', 'DESC')->limit(3)->get();
        $packages =Package::orderBy('id', 'DESC')->limit(3)->get();
        $gyms = Gym::with('packages')->orderBy('id', 'DESC')->limit(5)->get();

        return response()->success([
            'gifts' =>  GiftUserResource::collection($gifts),
            'packages' =>  PackageResource::collection($packages),
            'gyms' =>  GymResource::collection($gyms),

        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\FooterResource;
use App\Http\Resources\PackagesResource;
use App\Http\Resources\SignUpResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\TestimonialResource;
use App\Http\Resources\UserResource;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Event;
use App\Models\Footer;
use App\Models\Package;
use App\Models\SignUp;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::where('company_id', '=', auth()->guard('employee')->user()->company_id)->with('employee')->orderBy('id', 'DESC')->limit(5)->get();
        $categories = Category::where('company_id', '=', auth()->guard('employee')->user()->company_id)->orderBy('id', 'DESC')->limit(4)->get();
        return response()->success([
            'events' =>  EventResource::collection($events),
            'categories' =>  CategoryResource::collection($categories),
        ]);
    }
}

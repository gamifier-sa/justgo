<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('company_id', '=', auth()->guard('employee')->user()->company_id)->orderBy('id', 'DESC')->get();
        return response()->success([
            'categories' =>  CategoryResource::collection($categories),
        ]);
    }
}

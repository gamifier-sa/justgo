<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth('api')->user()->id;
        $Review = Review::where([
            ['user_id', '=', auth('api')->user()->id],
            ['gym_id', '=', $request->gym_id],
        ])->first();
        if (!$Review) {
             Review::create($data);
        }

        return response()->success([
            'review' => new ReviewResource($Review)
        ]);
    }
}

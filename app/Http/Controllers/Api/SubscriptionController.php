<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function  store(Request $request)
    {
        $request->validate([
            'package_id'=>'required|exists:packages,id',
        ]);
        $subscription = Subscription::create([
                'user_id'=>auth('api')->user()->id,
                'package_id'=>$request->package_id
        ]);
        return response()->success([
            'message'=>__('admin.Subscriptions')
        ]);
    }
}

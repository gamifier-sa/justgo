<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\subscriptionResource;
use App\Models\Package;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function  store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'type_price' => 'required|in:daily_price,monthly_price,quarterly_price,
            midterm_price,annual_price',
            'type_subscription' => 'required|in:day,month,annual',
        ]);

        $package = Package::select($data['type_price'])->find($request->package_id);
        $data['StartDate'] = Carbon::now()->format('Y-m-d');

        if ($request->type_subscription == 'day') {
            $data['EndDate'] = Carbon::now()->addDay()->format('Y-m-d');
        } elseif ($request->type_subscription == 'month') {
            $data['EndDate'] = Carbon::now()->addMonth()->format('Y-m-d');
        } else {
            $data['EndDate'] = Carbon::now()->addYear()->format('Y-m-d');
        }
        $subscription = Subscription::create([
            'user_id' => auth('api')->user()->id,
            'package_id' => $request->package_id,
            'price' => $package->{$data['type_price']},
            'StartDate' => $data['StartDate'],
            'EndDate' => $data['EndDate'],
        ]);
        return response()->success([
            'subscription' => new subscriptionResource($subscription)
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriptionResource;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function  store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'type_subscription' => 'required|in:day,month,quarter,annual',
        ]);
        $type_price = [
            'day' => 'daily_price',
            'month' => 'monthly_price',
            'quarter' => 'quarterly_price',
            'annual' => 'annual_price',
        ];
        $package = Package::select($data['type_price'])->find($request->package_id);
        $data['StartDate'] = Carbon::now()->format('Y-m-d');

        if ($request->type_subscription == 'day') {
            $data['EndDate'] = Carbon::now()->addDay()->format('Y-m-d');
        } elseif ($request->type_subscription == 'month') {
            $data['EndDate'] = Carbon::Znow()->addMonth()->format('Y-m-d');
        } elseif ($request->type_subscription == 'quarter') {
            $data['EndDate'] = Carbon::now()->addMonths(3)->format('Y-m-d');
        } else {
            $data['EndDate'] = Carbon::now()->addYear()->format('Y-m-d');
        }
        
        $subscription = Subscription::create([
            'user_id' => auth('api')->user()->id,
            'package_id' => $request->package_id,
            'price' => $package->{$type_price[$request->type_subscription]},
            'StartDate' => $data['StartDate'],
            'EndDate' => $data['EndDate'],
            'type_subscription' => $data['type_subscription']
        ]);
        
        $transaction  = Transaction::create([
            'transaction_id' => $request->id,
            'package_id' => $request->package_id,
            'status' => $request->status,
            'amount' => $request->amount/100,
            'message' => $request->message,
            'type_price' => $request->type_price,
            'type_subscription' => $request->type_subscription,
            'user_id' => $request->user_id,
        ]);

        return response()->success([
            'subscription' => new SubscriptionResource($subscription)
        ]);
    }
}

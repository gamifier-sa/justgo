<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function webhook(Request $request){
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

        return response()->json($transaction, 200);
    }
}

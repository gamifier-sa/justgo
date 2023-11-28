<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function endSubscription()
     {
        $users = User::whereHas('subscriptions', function ($query) {
            $query->where('EndDate', '<=', Carbon::now()->addDays(7));
        })->get();
        $title = 'اشعار جديد';
        $body = [
            'messsage'=>'سيتم إنهاء الاشتراك بعد اسبوع من اليوم'
        ];

        foreach ($users as $user) {
           sendNotification($title, $body, $user->device_token, null);
        }

        Notification::create([
            'title' => $title,
            'data'=>'سيتم إنهاء الاشتراك بعد اسبوع من اليوم',
            'gym_id' => null,
        ]);

        return response()->json(['status'=>true]);
    }

    public function pushToAllusers(Request $request)
    {
        $request->validate([
            'title'=>'required|string|min:2|max:50',
            'messsage'=>'required|string|min:2|max:100',
        ]);
       $users = User::get();
       $title = $request->title;
       $body = [
           'messsage'=>$request->messsage
       ];

       foreach ($users as $user) {
          sendNotification($title, $body, $user->device_token, null);
       }

       Notification::create([
           'title' => $title,
           'data'=>$request->messsage,
           'gym_id' => null,
       ]);

       return response()->json(['status'=>true]);
   }
}

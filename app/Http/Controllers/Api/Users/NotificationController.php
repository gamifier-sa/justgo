<?php

namespace App\Http\Controllers\Api\Employees;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()  {
        $user = auth()->guard('api')->user();

        $notifications = $user->notifications;
        return response()->success([
            'Notification'=>NotificationResource::collection($notifications),
        ]);

    }
}

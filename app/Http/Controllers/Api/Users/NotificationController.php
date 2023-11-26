<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()  {
        $notifications = Notification::get();
        return response()->success([
            'Notification'=>NotificationResource::collection($notifications),
        ]);

    }
}

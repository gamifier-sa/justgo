<?php

namespace App\Http\Controllers\Api\Employees;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()  {
        $employee = auth()->guard('employee')->user();

        $notifications = $employee->notifications;
        return response()->success([
            'Notification'=>NotificationResource::collection($notifications),
        ]);

    }
}

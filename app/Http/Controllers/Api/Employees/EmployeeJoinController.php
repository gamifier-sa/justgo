<?php

namespace App\Http\Controllers\Api\Employees;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\EmployeeJoin;
use App\Models\Event;
use Illuminate\Http\Request;

class EmployeeJoinController extends Controller
{
    public function employeejoin(Request $request)
    {
        $employee = auth()->guard('employee')->user();
        $eventId = $request->event_id;

        if ($employee->joins()->where('event_id', $eventId)->exists()) {
            return response()->fail(['message' => __('admin.employee_already_joined')]);
        }

        $event = Event::find($eventId);
        if ($event->employees->count() >= $event->number_employees) {
            return response()->error(['message' => __('admin.event_max_employees_reached')]);
        }

        $data['company_id'] = $employee->company_id;
        $data['employee_id'] = $employee->id;
        $data['event_id'] = $eventId;

        EmployeeJoin::create($data);
        $event->decrement('number_employees');

        return response()->success(['message' => __('admin.employee_joined')]);
    }




    public function joinedevents()
    {
        $employee = auth()->guard('employee')->user();

        return response()->success([
            "joined_events" => EventResource::collection($employee->joinedEvents)
        ]);


    }
    public function createdevents()
    {
        $events = Event::where('employee_id','=',auth()->guard('employee')->user()->id)->get();
        return response()->success([
            "created_events" => EventResource::collection($events)
        ]);


    }



}

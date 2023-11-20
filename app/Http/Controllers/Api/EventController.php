<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventDetailsResource;
use App\Http\Resources\EventResource;
use App\Models\Employee;
use App\Models\EmployeeJoin;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eventdetails(Request $request)
    {
        $event = Event::where([
            ['company_id', '=', auth()->guard('employee')->user()->company_id],
            ['id', '=', $request->id]
        ])->with('employee')->first();
        $event->load('employees');
        return response()->success([
            'event' => new EventDetailsResource($event),
        ]);
    }

    public function store(EventRequest $request)
    {

        $data = $request->validated();
        $data['company_id'] = auth()->guard('employee')->user()->company_id;
        $data['employee_id'] = auth()->guard('employee')->user()->id;
        if (isset($data['cover_image'])) {
            $data['cover_image']  = storeImage('Events', $data['cover_image']);
        }


        $event =  Event::create($data);
        $title = $event->employee->company->name;
        $body = [
            'employee_name' => $event->employee->name,
            'profile_image' => $event->employee->profile_image,
            'type' => 1,
            'action'=>$event->employee->name . 'Create New Event' . $event->name
        ];
        $employees = Employee::where('company_id', '=', auth()->guard('employee')->user()->company_id)->get();
        foreach ($employees as $employee) {
            sendNotification($title, $body, $employee->device_token, $event->id);
        }

        Notification::create([
            'event_id' => $event->id,
            'company_id' => $event->employee->company_id,
            'employee_id' => $event->employee->id,
            'type' => 1,
            'action'=>$event->employee->name . 'Create New Event' . $event->name

        ]);
        return response()->success([
            'event' => new EventResource($event),
        ]);
    }


    public  function eventbycategory(Request $request)
    {

        $events = Event::where('category_id', $request->category_id)->orderBy('id', 'DESC')->paginate();
        return response()->success([
            'events' =>  EventResource::collection($events),
        ]);
    }


    public function deleteevent(Request $request)
    {
        $event = Event::where([
            ['employee_id', '=', auth()->guard('employee')->user()->id],
            ['id', '=', $request->event_id]
        ])->with('employee')->first();
        if (isset($event)) {
            $event->delete();
            $title = $event->employee->company->name;
            $body = [
                'employee_name' => $event->employee->name,
                'profile_image' => $event->employee->profile_image,
                'type' => 0,
                'action'=>$event->employee->name . ' Delete Event ' . $event->name
            ];

            $employeeIds = $event->employees->pluck('id');

            $employees = Employee::whereIn('id', $employeeIds)
                ->where('company_id', '=', auth()->guard('employee')->user()->company_id)
                ->get();

            foreach ($employees as $employee) {
                sendNotification($title, $body, $employee->device_token, $event->id);
            }

            Notification::create([
                'event_id' => $event->id,
                'company_id' => $event->employee->company_id,
                'employee_id' => $event->employee->id,
                'type' => 0,
                'action'=>$event->employee->name . ' Delete Event ' . $event->name
            ]);
            return response()->success([
                'message' => __('admin.deleteevent')
            ]);
        } else {
            return response()->fail([
                'message' => __('admin.youcantdelete')
            ]);
        }
    }


    public function leaveevent(Request $request)
    {
        $event = EmployeeJoin::findOrFail($request->id);
        if(isset($event)){
            $event->delete();
            $title = $event->employee->company->name;
            $body = [
                'employee_name' => $event->employee->name,
                'profile_image' => $event->employee->profile_image,
                'type' => 1,
                'action'=>$event->employee->name . ' Leave Event ' . $event->name
            ];

            $employeeIds = $event->employees->pluck('id');

            $employees = Employee::whereIn('id', $employeeIds)
                ->where('company_id', '=', auth()->guard('employee')->user()->company_id)
                ->get();

            foreach ($employees as $employee) {
                sendNotification($title, $body, $employee->device_token, $event->id);
            }


            $event->increment('number_employees');

            Notification::create([
                'event_id' => $event->id,
                'company_id' => $event->employee->company_id,
                'employee_id' => $event->employee->id,
                'type' => 1
            ]);
            return response()->success([
                'message' => __('admin.cancelledjoinevent')
            ]);
        }else{
            return response()->fail([
                'message' => __('admin.youcantdelete')
            ]);
        }


    }
}

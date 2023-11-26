<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VisitHistoryResource;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitController extends Controller
{

    public function index()
    {
        $uservisits = Visit::where('user_id', '=', auth('api')->user()->id)->get();
        return response()->success([
            'VisitHistory' => VisitHistoryResource::collection($uservisits)
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'gym_id' => 'required|exists:gyms,id'
        ]);
        $data['user_id'] = auth('api')->user()->id;
        $data['visit_date'] = Carbon::now()->format('Y-m-d');
        $today = now()->format('Y-m-d');
        
        $existingVisit = auth('api')->user()->visits->where('visit_date', $today)->first();
        if ($existingVisit) {
            $existingVisit->update($data);
            $visitHistory = new VisitHistoryResource($existingVisit);
        } else {
            $visit = Visit::create($data);
            $visitHistory = new VisitHistoryResource($visit);

        }
        return response()->success([
            'VisitHistory' => $visitHistory
        ]);
    }
}

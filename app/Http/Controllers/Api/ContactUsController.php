<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactus(Request $request)
    {
        $data = $request->validate([
            'subject'=>'required|min:2|max:50',
            'message'=>'required|min:5|max:255'
        ]);
        $data['user_id'] =auth('api')->user()->id;
        ContactUs::create($data);
        return response()->success();
    }
}

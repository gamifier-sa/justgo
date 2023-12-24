<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactus()
    {
        $contacts = ContactUs::where('gym_id', '=', auth('gyms')->user()->id)->paginate(10);
        return view('gyms.contactus', get_defined_vars());
    }
}

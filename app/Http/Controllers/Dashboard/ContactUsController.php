<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactus(){
        $contacts = ContactUs::get();
        return view('dashboard.contactus', get_defined_vars());
    }
}

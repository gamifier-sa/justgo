<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactus(){
        $this->authorize('view_contactus');

        $contacts = ContactUs::paginate(10);
        return view('dashboard.contactus', get_defined_vars());
    }
    public function search(Request $request)
    {
        $searchValue = $request->input('search');
        $contacts = ContactUs::whereHas('user', function ($q) use ($searchValue) {
            $q->where('name', 'like', "%$searchValue%")
              ->orWhere('email', 'like', "%$searchValue%");
        })->get();


        return view('dashboard.contactus-search-results', compact('contacts'));
    }
}

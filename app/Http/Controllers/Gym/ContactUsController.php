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
    public function search(Request $request)
    {
        $searchValue = $request->input('search');
        $contacts = ContactUs::whereHas('user', function ($q) use ($searchValue) {
            $q->where('name', 'like', "%$searchValue%")
              ->orWhere('email', 'like', "%$searchValue%");
        })->paginate(10);

        $paginationHtml = $contacts->links()->toHtml();

        return view('gyms.search-results', compact('contacts','paginationHtml'));
    }
}

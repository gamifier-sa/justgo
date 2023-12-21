<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $gym = Gym::first();
        $gymPackagesIds = $gym->packages()->pluck('id')->toArray();
        $users = User::whereHas('subscriptions', function ($query) use ($gymPackagesIds) {
            return $query->whereIn('id', $gymPackagesIds);
        })->orderBy('id','DESC')->get();

        return view(checkView('gyms.users'), get_defined_vars());
    }
    public function create()
    {
        // $this->authorize('create_users');
        return view(checkView('gyms.new-user'));
    }
    /**
     * @param UserRequest $request
     */
    public function store(Request $request)
    {
        // $this->authorize('create_users');

        return redirect()->route('gyms.users.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        // $this->authorize('show_users');



        return view('gyms.users.show', compact('user'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        // $this->authorize('update_users');


        return view(checkView('gyms.edit-user'), compact('user'));
    }

    /**
     * @param UserRequest $request
     * @param              $id
     */
    public function update(Request $request, $id)
    {
        // $this->authorize('update_users');

        return redirect()->route('gyms.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $this->authorize('delete_users');

        return redirect()->route('gyms.users.index');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymRequest;
use App\Mail\GymActivationMail;
use App\Models\City;
use App\Models\Gym;
use App\Models\GymImage;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class GymController extends Controller
{
    public function index()
    {
        $this->authorize('view_gyms');

        $gyms = Gym::limit(5)->get();
        return view('dashboard.gyms', get_defined_vars());
    }

    public function create()
    {
        $this->authorize('create_gyms');

        $cities = City::get();

        return view('dashboard.add_new_gym', compact('cities'));
    }

    public function store(GymRequest $request)
    {
        $this->authorize('create_gyms');

        $data = $request->validated();

        if (isset($data['logo'])) {
            $data['logo']  = storeImage('Gyms', $data['logo']);
        }
        if (isset($data['cover_image'])) {
            $data['cover_image']  = storeImage('Gyms', $data['cover_image']);
        }
        $data['password'] = Hash::make($data['password']);
        unset($data['images']);

        $gym = Gym::create($data);

        $title = 'اشعار جديد';
        $body = [
            'messsage' => 'تم انشاء صالة رياضية جديدة'
        ];
        $users = User::get();
        foreach ($users as $user) {
            sendNotification($title, $body, $user->device_token, $gym->id);
        }
        Notification::create([
            'title' => $title,
            'data' => 'تم انشاء صالة جديدة',
            'gym_id' => $gym->id,

        ]);

        $images = $request->images;
        foreach ($images as $image) {
            $newImageName = storeImage('Gyms', $image);
            $gym->images()->create(['image' => $newImageName]);
        }
        return redirect()->route('dashboard.gyms.index');
    }
    public function edit($id)
    {
        $this->authorize('update_gyms');

        $gym = Gym::with('images')->findOrfail($id);
        $cities = City::get();
        return view('dashboard.edit_gym', compact('gym', 'cities'));
    }
    public function update(GymRequest $request, $id)
    {
        $this->authorize('update_gyms');

        $data = $request->validated();
        $gym = Gym::findOrfail($id);
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = storeImage('Gyms', $request->file('cover_image')) ?? $gym->cover_image;
            deleteImage('Gyms', $gym->cover_image);
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = storeImage('Gyms', $request->file('logo')) ?? $gym->logo;
            deleteImage('Gyms', $gym->logo);
        }
        unset($data['images']);
        $data['password'] = Hash::make($data['password']);

        $gym->update($data);
        $images = $request->images;
        if (isset($images)) {
            foreach ($images as $image) {
                $newImageName = storeImage('Gyms', $image);
                $gym->images()->create(['image' => $newImageName]);
            }
        }

        return redirect()->route('dashboard.gyms.index');
    }


    public function destroy($id)
    {
        $this->authorize('delete_gyms');

        $gym = Gym::with('images')->findOrfail($id);
        deleteImage('Gyms', $gym['cover_image']);
        deleteImage('Gyms', $gym['logo']);
        if (isset($gym->images)) {
            foreach ($gym->images as   $image) {
                deleteImage('Gyms', $image->image);
            }
        }
        $gym->delete();
        return redirect()->route('dashboard.gyms.index');
    }


    public function deleteimage($id)
    {
        $this->authorize('delete_gyms');

        $gymImage = GymImage::findOrfail($id);
        deleteImage('Gyms', $gymImage->image);
        $gymImage->delete();
        return response()->json(['status' => true]);
    }

    public function updateAdminActive(Gym $gym)
    {
        $newStatus = request()->status;

        $gym = Gym::findOrFail($gym->id);

        $gym->update(['admin_active' => $newStatus]);

        if ($newStatus == 'active') {
            $title = 'اشعار جديد';
            $body = [
                'message' => 'تم انشاء صالة رياضية جديدة'
            ];
            $users = User::get();
            foreach ($users as $user) {
                sendNotification($title, $body, $user->device_token, $gym->id);
            }

            Notification::create([
                'title' => $title,
                'data' => 'تم انشاء صالة جديدة',
                'gym_id' => $gym->id,
            ]);

            $gymOwnerName = $gym->name;
            Mail::to($gym->email)->send(new GymActivationMail($gymOwnerName, $gym->name));
        }

        return response()->json(['message' => "Gym admin status updated to $newStatus successfully"]);
    }

}

<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymRequest;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Gym;
use App\Models\GymImage;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function settings()
    {
        $gym = Gym::where('id', '=', auth('gyms')->user()->id)->first();
        $cities = City::get();
        return view('gyms.settings', compact('gym','cities'));
    }
    public function update(GymRequest $request, $id)
    {
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

        return redirect()->back();
    }
    public function deleteimage($id)
    {
        $gymImage = GymImage::findOrfail($id);
        deleteImage('Gyms', $gymImage->image);
        $gymImage->delete();
        return response()->json(['status' => true]);
    }

}

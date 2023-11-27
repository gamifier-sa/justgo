<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymRequest;
use App\Models\City;
use App\Models\Gym;
use App\Models\GymImage;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::limit(5)->get();
        return view('dashboard.gyms', get_defined_vars());
    }

    public function create()
    {
        $cities = City::get();

        return view('dashboard.add_new_gym', compact('cities'));
    }

    public function store(GymRequest $request)
    {
        $data = $request->validated();

        if (isset($data['logo'])) {
            $data['logo']  = storeImage('Gyms', $data['logo']);
        }
        if (isset($data['cover_image'])) {
            $data['cover_image']  = storeImage('Gyms', $data['cover_image']);
        }
        unset($data['images']);

        $gym = Gym::create($data);
        $images = $request->images;
        foreach ($images as $image) {
            $newImageName = storeImage('Gyms', $image);
            $gym->images()->create(['image' => $newImageName]);
        }
        return redirect()->route('dashboard.gyms.index');
    }
    public function edit($id)
    {
        $gym = Gym::with('images')->findOrfail($id);
        $cities = City::get();
        return view('dashboard.edit_gym', compact('gym', 'cities'));
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
        $gymImage = GymImage::findOrfail($id);
        deleteImage('Gyms', $gymImage->image);
        $gymImage->delete();
        return response()->json(['status'=>true]);
    }
}

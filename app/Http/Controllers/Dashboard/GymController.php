<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymRequest;
use App\Models\City;
use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index(){
        $gyms = Gym::limit(5)->get();
        return view('dashboard.gyms', get_defined_vars());
    }

    public function create(){
        $cities = City::get();

        return view('dashboard.add_new_gym',compact('cities'));

    }

    public function store(GymRequest $request)
    {
        $data =$request->validated();

        if (isset($data['logo'])) {
            $data['logo']  = storeImage('Gyms', $data['logo']);
        }
        if (isset($data['cover_image'])) {
            $data['cover_image']  = storeImage('Gyms', $data['cover_image']);
        }
        unset($data['images']);

        $gym= Gym::create($data);
        $images = $request->images;
        foreach ($images as $image) {
            $newImageName = storeImage('Gyms', $image);
            $gym->images()->create(['image' => $newImageName]);
        }
        return redirect()->route('dashboard.gyms.index');
    }
    public function edit($id) {
        $gym =Gym::findOrfail($id);
        $cities = City::get();

        return view('dashboard.edit_gym',compact('gym','cities'));

    }
    public function update(GymRequest $request,$id)
    {
        $data =$request->validate();
        $gym = Gym::findOrfail($id);
        if (isset($request['cover_image'])) {
            $request['cover_image'] = storeImage('Gyms', $request['cover_image']) ?? $gym->cover_image;
            deleteImage('Gyms', $gym['cover_image']);
        }
        if (isset($request['logo'])) {
            $request['logo'] = storeImage('Gyms', $request['logo']) ?? $gym->logo;
            deleteImage('Gyms', $gym['logo']);
        }
        $gym->update($data);
        return redirect()->route('dashboard.gyms.index');
    }

}

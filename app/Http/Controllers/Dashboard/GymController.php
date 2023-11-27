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
        $data =$request->validate();


        if (isset($data['cover_image'])) {
            $data['cover_image']  = storeImage('Gyms', $data['cover_image']);
        }
        if (isset($data['cover_image'])) {
            $data['cover_image']  = storeImage('Gyms', $data['cover_image']);
        }
        $images = $data['images'];
        unset($data['images']);

        $gym= Gym::create($data);
        foreach ($images as $image) {
            $data['image']  = storeImage('Gyms', $image);
            $gym->images()->create(['image' => $data['image']]);
        }

        return redirect()->route('dashboard.gyms.index');
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

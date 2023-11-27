<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftRequest;
use App\Models\GiftUser;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = GiftUser::limit(5)->get();
        return view('dashboard.gifts', get_defined_vars());
    }

    public function create()
    {

        return view('dashboard.add-new-gift');
    }

    public function store(GiftRequest $request)
    {
        $data = $request->validated();

        if (isset($data['gift_card_image'])) {
            $data['gift_card_image']  = storeImage('Gifts', $data['gift_card_image']);
        }

        GiftUser::create($data);
        return redirect()->route('dashboard.gifts.index');
    }
    public function edit($id)
    {
        $gift = GiftUser::findOrfail($id);

        return view('dashboard.edit-gift', compact('gift'));
    }
    public function update(GiftRequest $request, $id)
    {
        $data = $request->validated();
        $gift = GiftUser::findOrfail($id);
        if ($request->hasFile('gift_card_image')) {
            $data['gift_card_image'] = storeImage('Gifts', $request->file('gift_card_image')) ?? $gift->gift_card_image;
            deleteImage('Gifts', $gift->gift_card_image);
        }



        $gift->update($data);


        return redirect()->route('dashboard.gifts.index');
    }


    public function destroy($id)
    {
        $gift = GiftUser::findOrfail($id);
        deleteImage('Gifts', $gift['gift_card_image']);

        $gift->delete();
        return redirect()->route('dashboard.gifts.index');
    }
}

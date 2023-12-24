<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Setting;
use App\Services\Classes\SettingService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{



    public function index(Request $request)
    {
        $this->authorize('view_settings');

        $setting = Setting::findOrfail($request->id);
        return view(checkView('dashboard.settings'), get_defined_vars());
    }

    /**
     * @param Request $request
     * @param              $id
     */
    public function update(Request $request,$id)
    {
        $this->authorize('update_settings');

        $setting = Setting::findOrfail($id);


        $rules = [
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('users')->ignore($setting->id)],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('users')->ignore($setting->id)],
            'whatsapp_number'    => ['sometimes', 'nullable', 'numeric', Rule::unique('users')->ignore($setting->id)],
        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.contact_us'] = 'required|min:2|max:700';
            $rules[$one_lang . '.terms_conditions'] = 'required|min:2|max:700';
        }
        $data = $request->validate($rules);

        $setting->update($data);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
}

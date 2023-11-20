<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => ['required', 'string', 'max:50', 'min:5'],
            'logo' => ['nullable', 'mimes:jpeg,png,jpg,gif' . 'svg|max:4096'],
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", 'unique:companies'],
            'phone'    => ['required', 'unique:companies'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ];
    }
}

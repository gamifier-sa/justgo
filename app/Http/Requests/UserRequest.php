<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return \string[][]
     * Set rules validation on creating
     */
    protected function store(): array
    {
        return [
            'name'     => ['required', 'string', 'max:50', 'min:3'],
            'profile_image' => ['sometimes','nullable', 'mimes:jpeg,png,jpg,gif' . 'svg|max:4096'],
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", 'unique:users'],
            'phone'    => ['required', 'numeric','unique:users'],
            'whatsapp_number'    => ['sometimes','nullable','numeric', 'unique:users'],
            'gender'=>['required','in:male,female'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'device_token'=>'sometimes|nullable',
            'status'   => ['nullable', 'in:active,pending'],


        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name'     => ['required', 'string', 'max:50', 'min:3'],
            'profile_image' => ['sometimes','nullable', 'mimes:jpeg,png,jpg,gif' . 'svg|max:4096'],
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('users')->ignore($this->id)],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('users')->ignore($this->id)],
            'whatsapp_number'    => ['sometimes','nullable','numeric', Rule::unique('users')->ignore($this->id)],
            'gender'=>['required','in:male,female'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'device_token'=>'sometimes|nullable',
            'status'   => ['nullable', 'in:active,pending'],



        ];
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {

        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->update() : $this->store();
    }
}

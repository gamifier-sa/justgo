<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'name'     => ['required', 'string', 'max:50', 'min:5'],
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", 'unique:employees'],
            'phone'    => ['required', 'unique:employees'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'status'   => ['nullable', 'in:active,notactive'],
            'profile_image' => ['nullable', 'mimes:jpeg,png,jpg,gif' . 'svg|max:4096'],
            'department' => ['required', 'string', 'max:50', 'min:5'],
            'position' => ['required', 'string', 'max:50', 'min:5'],

        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('employees')->ignore($this->id)],
            'phone' => ['required', Rule::unique('employees')->ignore($this->id)],
            'password' => ['nullable', 'string', 'min:8', 'max:255', 'confirmed'],
            'status' => ['nullable', 'in:active,notactive'],
            'profile_image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'department' => ['required', 'string', 'max:50', 'min:5'],
            'position' => ['required', 'string', 'max:50', 'min:5'],

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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       $id = Auth::guard('api')->user()->id;
        return [
            'name' => ['required', 'string', 'max:50', 'min:3'],
            'profile_image' => ['sometimes', 'nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric|unique:users,phone,' .  $id,
            'whatsapp_number' => ['sometimes', 'nullable', 'numeric', 'unique:users,whatsapp_number,'.  $id],
            'gender' => ['required', 'in:male,female'],
        ];
    }
}

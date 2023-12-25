<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymRegisterRequest extends FormRequest
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
        $rules =  [
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", 'unique:gyms'],
            'subscription_rate' => ['required', 'numeric'],
            'expected_number_customers' => ['required', 'numeric'],
            'city_id' => ['sometimes', 'nullable', 'exists:cities,id'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],

        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.name'] = 'required|min:2|max:100';
        }
        return $rules;
    }
}

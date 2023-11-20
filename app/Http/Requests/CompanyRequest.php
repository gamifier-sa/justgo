<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'min:2', 'max:255'],
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", 'unique:companies,email,' . $this->id],
            'phone'    => ['required', 'unique:companies,phone,' . $this->id],
            'logo' => ['sometimes', 'nullable', 'mimes:jpeg,png,jpg,gifsvg', 'max:4096'],
            'background_image' => ['sometimes', 'nullable', 'mimes:jpeg,png,jpg,gifsvg', 'max:4096'],
            'splash_image' => ['sometimes', 'nullable', 'mimes:jpeg,png,jpg,gifsvg', 'max:4096'],
            'primary_color' => ['required', 'min:2', 'max:255'],
            'title_color' => ['required', 'min:2', 'max:255'],
            'subtitle_color' => ['required', 'min:2', 'max:255'],
            'hint_color' => ['required', 'min:2', 'max:255'],
            'loading_background_color' => ['required', 'min:2', 'max:255'],
            'loading_animation_color' => ['required', 'min:2', 'max:255'],
            'white_title_color' => ['required', 'min:2', 'max:255'],

        ];

        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang .'.about_us'] = 'required|min:5|max:1000';
            $rules[$one_lang .'.privacy_policy'] = 'required|min:5|max:1000';

        }
        return $rules;
    }
}

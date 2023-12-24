<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GymRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Set ruels validation on stonring
     * @return array
     */
    protected function store(): array
    {
        $rules = [
            'cover_image' => ['required','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'logo' => ['required','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", 'unique:gyms'],
            'address' => ['required','min:2','max:255'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
            'subscription_rate' => ['required', 'numeric'],
            'expected_number_customers' => ['required', 'numeric'],
            'city_id' => ['sometimes','nullable','exists:cities,id'],
            'images'    => ['sometimes','nullable', 'array'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],

        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.name'] = 'required|min:2|max:100';
            $rules[$one_lang . '.description'] = 'required|min:2|max:500';
        }

        return $rules;

    }

    /**
     * Set ruels validation on updating
     * @return array
     */
    protected function update(): array
    {
        $rules = [
            'cover_image' => ['sometimes','nullable','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'logo' => ['sometimes','nullable','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('gyms')->ignore($this->id)],
            'address' => ['required','min:2','max:255'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
            'subscription_rate' => ['required', 'numeric'],
            'expected_number_customers' => ['required', 'numeric'],
            'city_id' => ['sometimes','nullable','exists:cities,id'],
            'images'    => ['sometimes','nullable', 'array'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],


        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.name'] = 'required|min:2|max:100';
            $rules[$one_lang . '.description'] = 'required|min:2|max:500';
        }

        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return request()->isMethod('put') || request()->isMethod('patch') ? $this->update() : $this->store();
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
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
            'gift_card_image' => ['required','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'number_days' => ['required', 'numeric'],

        ];


        return $rules;

    }

    /**
     * Set ruels validation on updating
     * @return array
     */
    protected function update(): array
    {
        $rules = [
            'gift_card_image' => ['sometimes','nullable','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'number_days' => ['required', 'numeric'],

        ];

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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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


        $rules = [
            'cover_image' => ['required', 'mimes:jpeg,png,jpg,gifsvg', 'max:4096'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'start_time' => ['required' ],
            'end_time' => ['required','after:start_time'],
            'number_employees'=>['required','numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'event_url'=>['sometimes','nullable','url']




        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.title'] = 'required|min:2|max:100';
            $rules[$one_lang . '.description'] = 'required|min:2|max:500';
        }

        return $rules;
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        $rules = [
            'cover_image' => ['sometimes','nullable', 'mimes:jpeg,png,jpg,gifsvg', 'max:4096'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'number_employees'=>['required','numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'event_url'=>['sometimes','nullable','url']


        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.title'] = 'required|min:2|max:100';
            $rules[$one_lang . '.description'] = 'required|min:2|max:500';
        }

        return $rules;
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

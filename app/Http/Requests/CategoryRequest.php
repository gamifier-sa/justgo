<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return \string[][]
     * Set rules validation on creating
     */
    protected function store(): array
    {
        $rules = [
            'icon' => ['required','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'type' => ['required','in:users,awards'],

        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '.name'] = 'required|min:2|max:100';
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
            'icon' => ['sometimes','nullable','mimes:jpeg,png,jpg,gifsvg','max:4096'],
            'type' => ['required','in:users,awards'],

        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang .'.name'] = 'required|min:2|max:100';
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

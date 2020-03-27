<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'id_r' => ['integer'],
            'name' => ['required', 'min:4', 'max:155']
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'id_r.integer' => 'Id mora biti integer.',
            'name.required' => 'Naziv je obavezan.',
            'name.min' => 'Naziv mora imati najmanje 4 karaktera.',
            'name.max' => 'Naziv može imati najviše 155 karaktera.'
        ];
    }
}

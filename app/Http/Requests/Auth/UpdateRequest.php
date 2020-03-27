<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email'],
            'role_id' => ['numeric']
        ];

        if (!$this->has('id'))
        {
            $rules += ['id'=> 'exists:users', 'integer'];
        }

        return $rules;
    }


    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Ime je obavezno.',
            'name.min' => 'Ime mora imati najmanje 3 karaktera.',
            'name.max' => 'Ime mora imati najviše 20 karaktera.',
            'email.required' => 'Email je obavezan.',
            'email.email' => 'Email nije u dobrom formatu.',
            'role_id.numeric' => 'Morate uneti broj za ulogu.',
            'id.exists' => 'Id mora da postoji.',
            'id.integer' => 'Id mora biti integer.'
        ];
    }
}

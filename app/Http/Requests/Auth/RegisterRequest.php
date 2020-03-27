<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email', 'unique:Users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ];
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
            'email.unique' => 'Email već zauzet.',
            'password.required'=> 'Šifra je obavezna.',
            'password.min'=> 'Šifra mora da se sastoji najmanje iz 6 karaktera.',
            'password.confirmed'=> 'Šifra mora biti ponovljena.',
        ];
    }
}

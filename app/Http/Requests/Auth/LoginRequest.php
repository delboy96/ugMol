<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:6']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
          'email.required' => 'Email je obavezan.',
          'email.email' => 'Email nije u dobrom formatu.',
          'email.exists' => 'Email ne postoji.',
          'password.required'=> 'Šifra je obavezna.',
          'password.min'=> 'Šifra mora da se sastoji najmanje iz 6 karaktera.'
        ];
    }
}

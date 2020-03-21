<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'alpha', 'max:20'],
            'surname' => ['required', 'min:4', 'alpha', 'max:25'],
            'emails' => ['required', 'email'],
            'message' => ['required', 'max:255']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Ime je obavezno.',
            'name.alpha' => 'Za ime možete uneti samo slova.',
            'name.min' => 'Ime mora imati najmanje 3 karaktera.',
            'name.max' => 'Ime mora imati najviše 20 karaktera.',
            'surname.required' => 'Prezime je obavezno.',
            'surname.alpha' => 'Za prezime možete uneti samo slova.',
            'surname.min' => 'Prezime mora imati najmanje 4 karaktera.',
            'surname.max' => 'Prezime mora imati najviše 25 karaktera.',
            'email.required' => 'Email je obavezan.',
            'email.email' => 'Email nije u dobrom formatu.',
            'message.required'=> 'Polje za poruku je obavezno.',
            'message.max'=> 'Poruka ne može biti duža od 255 karaktera.',
        ];
    }
}


